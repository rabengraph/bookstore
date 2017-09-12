<?php
namespace Repository;

use Sef\WpEntities\Base\PostRepository as PostRepositoryBase;
use Sef\WpEntities\Annotation as Anote;

 /**
   * @Anote\Entities({
   *   "bks-faqs" = "\Entity\Faq"
   * })
   */
class FaqRepository extends PostRepositoryBase {

  public static function configOptions()
  {
    return [
      'queryDefaults'       => [
        'post_type' => 'bks-faqs',
        'post_status' => 'publish',
      ],
    ];
  }
}
