<?php
namespace Entity;
use Sef\WpEntities\Base\EntityBag;
use Sef\WpEntities\Base\PostEntity;
use Sef\WpEntities\Annotation\PostOptions as Options;


/**
  * @Options(
  *  post_type="post"
  * )
  */
class Post extends PostEntity {

  use Traits\FeaturedImage;
  
  protected $id;

  protected $content;

  protected $title;

  protected $excerpt;

  protected $name;

  protected $link;

  /**
    * @Options(
    *  getterConverter="\Sef\WpEntities\Components\Converter\DateTimeConverter"
    * )
    */
  protected $date;

  public function getDate( EntityBag $entityBag, $date )
  {
    return $date;
  }
  
}
