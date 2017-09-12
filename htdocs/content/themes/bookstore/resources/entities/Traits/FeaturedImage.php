<?php
namespace Entity\Traits;

use Sef\WpEntities\Base\EntityBag;
use Sef\WpEntities\Annotation\PostOptions as Options;


trait FeaturedImage {

/**
  * @Options(
  *  type="featuredimage",
  *  entity="\Entity\Attachment",
  *  repository="\Repository\AttachmentRepository",
  *  setterConverter="\Sef\WpEntities\Components\Converter\PropertyConverter\Id2EntityPropertyConverter"
  * )
  */
  protected $featuredImage;

  public function getFeaturedImage( EntityBag $entityBag, $featuredImage )
  {
    return $featuredImage;
  }

  public function setFeaturedImage( $featuredImage, EntityBag $entityBag )
  {
    $this->featuredImage = $featuredImage;
    return $entityBag;
  }
}
