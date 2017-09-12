<?php
namespace Entity\SimpleEntities;

use Sef\WpEntities\Base\EntityBag;
use Sef\WpEntities\Base\SimpleEntity;
use Sef\WpEntities\Annotation\SimpleEntityOptions as Options;


class Collaborator extends SimpleEntity {

  /**
    * @Options(
    *  wpname="full_name"
    * )
    */
  protected $fullName;

  /**
    * @Options(
    *  wpname="job"
    * )
    */
  protected $job;

  /**
    * @Options(
    *  entity="\Entity\Attachment",
    *  repository="\Repository\AttachmentRepository",
    *  setterConverter="Sef\WpEntities\Components\Converter\PropertyConverter\Id2EntityPropertyConverter",
    *  wpname="pic"
    * )
    */
  protected $pic;

  public function getFullName( EntityBag $entityBag, $fullName )
  {
    return $fullName;
  }
  
  public function setFullName( $fullName, EntityBag $entityBag )
  {
    $this->fullName = $fullName;
    return $entityBag;
  }
  
  public function getJob( EntityBag $entityBag, $job )
  {
    return $job;
  }
  
  public function setJob( $job, EntityBag $entityBag )
  {
    $this->job = $job;
    return $entityBag;
  }
  
  public function getPic( EntityBag $entityBag, $pic )
  {
    return $pic;
  }
  
  public function setPic( $pic, EntityBag $entityBag )
  {
    $this->pic = $pic;
    return $entityBag;
  }

}