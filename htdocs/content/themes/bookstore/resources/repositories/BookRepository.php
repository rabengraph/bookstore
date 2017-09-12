<?php
namespace Repository;

use Sef\WpEntities\Base\PostRepository as PostRepositoryBase;
use Sef\WpEntities\Annotation as Anote;

 /**
   * @Anote\Entities({
   *   "bks-books" = "\Entity\Book"
   * })
   */
class BookRepository extends PostRepositoryBase {

  public static function configOptions()
  {
    return [
      'queryDefaults'       => [
        'post_type' => 'bks-books',
        'post_status' => 'publish',
      ],
    ];
  }
}
