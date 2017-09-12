<?php
namespace Entity;
use Sef\WpEntities\Base\EntityBag;
use Sef\WpEntities\Base\PostEntity;
use Sef\WpEntities\Annotation\PostOptions as Options;


class PageHome extends Page {

/**
  * @Options(
  *  type="entity",
  *  entity="\Entity\Book",
  *  repository="\Repository\BookRepository",
  *  setterConverter="\Sef\WpEntities\Components\Converter\PropertyConverter\Id2EntityPropertyConverter",
  *  wpname="book-promo"
  * )
  */
  protected $promotedBook;

  public function getPromotedBook( EntityBag $entityBag, $promotedBook )
  {
    return $promotedBook;
  }
  
  public function setPromotedBook( $promotedBook, EntityBag $entityBag )
  {
    $this->promotedBook = $promotedBook;
    return $entityBag;
  }
  
}
