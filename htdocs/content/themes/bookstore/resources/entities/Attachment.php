<?php
namespace Entity;
use Sef\WpEntities\Base\EntityBag;
use Sef\WpEntities\Entities\Attachment as BaseAttachment;
use Sef\WpEntities\Annotation\PostOptions as Options;

/**
  * @Options(
  *  post_type="attachment"
  * )
  */
class Attachment extends BaseAttachment {

  protected $id;

  protected $content;

  protected $title;

  protected $excerpt;

  protected $name;

  protected $link;

  protected $attachmentUrl;

  protected $sizes;

  public static function configOptions()
  {
    // reset configuration of Parentclass
    return [
      'propertyOptions' => [
        'sizes'  => [
          'entity' => null,
          'type' => null
        ]
      ]
    ];
  }

  public function getSizes( EntityBag $entityBag, $sizes )
  {
    if( null === $sizes )
    {
      $sizes = SimpleEntities\Imagesizes::make();
      $sizes->setAttachmentId( $entityBag->getId() );
      $this->sizes = $sizes;
    }
    return $sizes;
  }
}
