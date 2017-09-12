<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;

class Pages extends BaseController
{
    /**
     * Handle the home page.
     *
     * @param \WP_Post $post The home page WP_Post instance.
     *
     * @return string
     */
    public function home( $post)
    {
        $page = \Entity\PageHome::make($post);
        $promotedBook = $page->getPromotedBook();

        $bookRepository = \Repository\BookRepository::make();        
        $books = $bookRepository->find([
            'posts_per_page'	=> 3,
            'post__not_in'		=> [$promotedBook->getId()],
            'orderby'			=> 'rand'
          ]);
        $postRepository = \Repository\PostRepository::make();        
        $latestArticles = $postRepository->find([
            'posts_per_page' => 2
        ]);

        return view('twig.pages.home', [
            'promo' => $promotedBook,
            'books' => $books,
            'news_url' => ('page' === get_option('show_on_front')) ? get_permalink(get_option('page_for_posts')) : get_home_url(),
            'latest_articles' => $latestArticles
        ]);
    }

    /**
     * Handle about page request.
     *
     * @param \WP_Post $post The about page WP_Post instance.
     *
     * @return string
     */
    public function about($post)
    {
        $postRepository = \Repository\PostRepository::make();        
        $latestArticles = $postRepository->find([
            'posts_per_page' => 2
        ]);
        $page = \Entity\PageAbout::make($post);
        
        return view('twig.pages.about', [
            'page' => $page,
            'members' => $page->getCollaborators(),
            'latest_articles' => $latestArticles
        ]);
    }

    /**
     * Handle the help page request.
     *
     * @param \WP_Post $post The help page WP_Post.
     *
     * @return string
     */
    public function help( $post)
    {
        $faqRepository = \Repository\FaqRepository::make();        
        $faqs = $faqRepository->findAll();
        $page = \Entity\Page::make($post);

        return view('twig.pages.help', [
            'page' => $page,
            'faqs' => $faqs
        ]);
    }
}
