<?php
namespace Entity\SimpleEntities;

use Sef\WpEntities\Base\EntityBag;
use Sef\WpEntities\Base\SimpleEntity;


class Imagesizes extends SimpleEntity {

  protected $full;

  protected $header;

  protected $large;

  protected $mediumLarge;
  
  protected $medium;

  protected $thumbnail;

  protected $postThumbnail;

  protected $bookPromo;

  protected $bookFeaturedImage;

  protected $memberPic;

  protected $attachmentId;

  public function getFull( EntityBag $entityBag )
  {
    return $this->generateSize('full');
  }

  public function getHeader( EntityBag $entityBag )
  {
    return $this->generateSize('header');
  }

  public function getLarge( EntityBag $entityBag )
  {
    return $this->generateSize('large');
  }

  public function getMedium( EntityBag $entityBag )
  {
    return $this->generateSize('medium');
  }

  public function getMediumLarge( EntityBag $entityBag )
  {
    return $this->generateSize('medium_large');
  }

  public function getPostThumbnail( EntityBag $entityBag )
  {
    return $this->generateSize('post-thumbnail');
  }

  public function getThumbnail( EntityBag $entityBag )
  {
    return $this->generateSize('thumbnail');
  }

  public function getBookPromo( EntityBag $entityBag )
  {
    return $this->generateSize('book-promo');
  }

  public function getBookFeaturedImage( EntityBag $entityBag )
  {
    return $this->generateSize('book-features-image');
  }

  public function getMemberPic( EntityBag $entityBag )
  {
    return $this->generateSize('member-pic');
  }

  public function setAttachmentId( $attachmentId, EntityBag $entityBag )
  {
    $this->attachmentId = $attachmentId;
    return $entityBag;
  }

  protected function generateSize($size = 'full')
  {
    if( ! $this->attachmentId )
      return;

    $imagesize = Imagesize::make();
    $imagesize->setUp($this->attachmentId , $size);
    return $imagesize;
  }

}