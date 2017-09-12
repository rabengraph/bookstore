<?php
namespace Entity;
use Sef\WpEntities\Base\EntityBag;
use Sef\WpEntities\Base\PostEntity;
use Sef\WpEntities\Annotation\PostOptions as Options;


/**
  * @Options(
  *  post_type="page"
  * )
  */
class Page extends PostEntity {

  protected $id;

  protected $content;

  protected $title;

  protected $excerpt;

  protected $name;

  protected $link;

  protected $type;
  
}
