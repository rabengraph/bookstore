<?php

/*
 * Define your routes and which views to display
 * depending on the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

/**
 * Custom routes.
 *
 * None defined for this project but if you want to add custom routes,
 * ALWAYS put them before the WordPress ones.
 */

/**
 * WordPress routes.
 */
/*
 * Home page.
 */
Route::match(['get', 'post'], 'front', 'Pages@home');

/*
 * Books archive page.
 *
 * @param \WP_Post $post Last WP_Post instance from archive loop.
 * @param \WP_Query $query
 *
 * @return string
 */
Route::match(['get', 'post'], 'postTypeArchive', function ($post, \WP_Query $query) {
    $bookRepository = Repository\BookRepository::make();
    $books = $bookRepository->setQuery($query);

    return view('twig.books.archive', [
        'books'	=> $books
    ]);
});

/*
 * Single book page.
 * The "Books" model is auto instanciated and ready for use. Its dependency is only the WP_Query class which
 * is also auto instanciated in order to run the model.
 *
 * @param Books $books The books model defined from the plugin.
 * @param \WP_Post $post The book WP_Post instance.
 * @param \WP_Query $query
 *
 * @return string
 */
 Route::get('singular', ['bks-books', function ( \WP_Post $post, \WP_Query $query) {
    $book = Entity\Book::make($post);
    $bookRepository = Repository\BookRepository::make();
    $books = $bookRepository->find([
      'posts_per_page'	=> 3,
      'post__not_in'		=> [$post->ID],
      'orderby'			=> 'rand'
    ]);
    $books = $bookRepository->findAll();
    return view('twig.books.single', [
        'book' => $book,
        'books' => $books
    ]);
}]);

/*
 * About page.
 * Display information about the "company" and its team.
 * The page is using a custom template which helps associate
 * custom fields to the "about" page only and not the other
 * "classic" pages.
 */
Route::match(['get', 'post'], 'template', ['about', 'uses' => 'Pages@about']);

/*
 * Help page.
 * Display a list of Faqs.
 */
Route::match(['get', 'post'], 'page', ['help', 'uses' => 'Pages@help']);

/*
 * News page.
 * A WordPress page has been define in the administration
 * in order to handle latest posts. This page is accessible
 * through the "is_home()" template conditional function.
 *
 * @param \WP_Post $post
 * @param \WP_Query $query
 *
 * @return string
 */
Route::match(['get', 'post'], 'home', function($post, \WP_Query $query)
{
    /*
     * We do not have a Twig directive to handle the "WordPress Loop" so we pass
     * them to the view through the "articles" variable.
     */

    $postRepository = Repository\PostRepository::make();
    $articles = $postRepository->setQuery($query);

    return view('twig.blog.news', [
        'articles' => $articles
    ]);
});

/*
 * Single post.
 *
 * @param Posts $posts The posts model instance.
 * @param \WP_Post $post The post instance.
 *
 * @return string
 */
Route::match(['get', 'post'], 'singular', ['post', function(\WP_Post $post)
{
    $article = \Entity\Post::make( $post );
    $postRepository = Repository\BookRepository::make();
    $latestArticle = $postRepository->find([
      'posts_per_page'	=> 2
    ]);
    return view('twig.blog.post', [
        'article' => $article,
        'latest_articles' => $latestArticle
    ]);
}]);

/*
 * Default archive pages.
 *
 * @param \WP_Post $post
 * @param \WP_Query $query
 *
 * @return string
 */
Route::match(['get', 'post'], 'archive', function ($post, \WP_Query $query) {
    return view('twig.blog.news', [
        'articles' => $query->get_posts(),
        'title' => get_the_archive_title()
    ]);
});

/*
 * Search books page.
 *
 * @param \WP_Post $post
 * @param \WP_Query $query
 *
 * @return string
 */
 Route::match(['get', 'post'], 'search', function($post, \WP_Query $query)
 {
     $bookRepository = Repository\BookRepository::make();
     $books = $bookRepository->setQuery($query);
     return view('twig.books.search', [
         'books' => $books,
         'searched_terms' => Input::get('s')
     ]);
 });
 