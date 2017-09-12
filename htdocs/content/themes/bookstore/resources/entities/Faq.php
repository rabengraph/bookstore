<?php
namespace Entity;
use Sef\WpEntities\Base\EntityBag;
use Sef\WpEntities\Base\PostEntity;
use Sef\WpEntities\Annotation\PostOptions as Options;


/**
  * @Options(
  *  post_type="bks-faqs"
  * )
  */
class Faq extends PostEntity {

  protected $id;

  protected $content;

  protected $title;

  protected $excerpt;

  protected $name;

  protected $type;
  
}
