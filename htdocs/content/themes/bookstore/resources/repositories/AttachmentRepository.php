<?php
namespace Repository;

use Sef\WpEntities\Base\PostRepository as PostRepositoryBase;
use Sef\WpEntities\Annotation as Anote;


 /**
   * @Anote\Entities(
   *   attachment = "\Entity\Attachment"
   * )
   */
class AttachmentRepository extends PostRepositoryBase {



  public static function configOptions()
  {
    return [
      'queryDefaults'       => [
        'post_type' => 'attachment',
        'post_status' => 'inherit'
      ],
    ];
  }
}
