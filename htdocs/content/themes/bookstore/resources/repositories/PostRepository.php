<?php
namespace Repository;

use Sef\WpEntities\Base\PostRepository as PostRepositoryBase;
use Sef\WpEntities\Annotation as Anote;

 /**
   * @Anote\Entities({
   *   "post" = "\Entity\Post"
   * })
   */
class PostRepository extends PostRepositoryBase {

  public static function configOptions()
  {
    return [
      'queryDefaults'       => [
        'post_type' => 'post',
        'post_status' => 'publish',
      ],
    ];
  }
}
