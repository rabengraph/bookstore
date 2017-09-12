<?php
namespace Entity;
use Sef\WpEntities\Base\EntityBag;
use Sef\WpEntities\Base\PostEntity;
use Sef\WpEntities\Annotation\PostOptions as Options;


/**
  * @Options(
  *  post_type="bks-books"
  * )
  */
class Book extends PostEntity {

  use Traits\FeaturedImage;

  protected $id;

  protected $content;

  protected $title;

  protected $excerpt;

  protected $name;

  protected $link;

/**
  * @Options(
  *  type="meta",
  *  wpname="author"
  * )
  */
  protected $bookAuthor;

 /**
   * @Options(
   *  type="meta",
   *  wpname="color"
   * )
   */
  protected $color;

/**
  * @Options(
  *  type="entity",
  *  entity="\Entity\Attachment",
  *  repository="\Repository\AttachmentRepository",
  *  setterConverter="\Sef\WpEntities\Components\Converter\PropertyConverter\Id2EntityPropertyConverter",
  *  wpname="promo-image"
  * )
  */
  protected $promoImage;

  public function getBookAuthor( EntityBag $entityBag, $bookAuthor )
  {
    return $bookAuthor;
  }

  public function setBookAuthor( $bookAuthor, EntityBag $entityBag )
  {
    $this->bookAuthor = $bookAuthor;
    return $entityBag;
  }

  public function getColor( EntityBag $entityBag, $color )
  {
    return $color;
  }

  public function setColor( $color, EntityBag $entityBag )
  {
    $this->color = $color;
    return $entityBag;
  }

  public function getPromoImage( EntityBag $entityBag, $promoImage )
  {
    return $promoImage;
  }

  public function setPromoImage( $promoImage, EntityBag $entityBag )
  {
    $this->promoImage = $promoImage;
    return $entityBag;
  }

}
