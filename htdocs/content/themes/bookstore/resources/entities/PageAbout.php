<?php
namespace Entity;

use Sef\WpEntities\Base\EntityBag;
use Sef\WpEntities\Base\PostEntity;
use Sef\WpEntities\Annotation\PostOptions as Options;
use Doctrine\Common\Collections\ArrayCollection;


class PageAbout extends Page {

/**
  * @Options(
  *  type="meta",
  *  entity="\Entity\SimpleEntities\Collaborator",
  *  getterConverter="Converter\PropertyConverter\ThemosisInfiniteField2EntityPropertyConverter",
  *  wpname="collaborators"
  * )
  */
  protected $collaborators;


  protected function __construct( $post = null )
  {
    $collaborators = new ArrayCollection;
    parent::__construct($post);
  }

  public function getCollaborators( EntityBag $entityBag, $collaborators )
  {
    return $collaborators;
  }  
}
