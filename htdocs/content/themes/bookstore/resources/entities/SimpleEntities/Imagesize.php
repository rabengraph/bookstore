<?php
namespace Entity\SimpleEntities;

use Sef\WpEntities\Base\EntityBag;
use Sef\WpEntities\Base\SimpleEntity;
use Sef\WpEntities\Annotation\SimpleEntityOptions as Options;
use Doctrine\Common\Collections\ArrayCollection;
use Sef\WpEntities\Annotation\Groups;


class Imagesize extends SimpleEntity {

  protected $size;

/**
  * @Groups({"default"})
  */
  protected $url;

/**
  * @Groups({"default"})
  */
  protected $width;

/**
  * @Groups({"default"})
  */
  protected $height;

  protected $maxWidth;

  protected $maxHeight;

  protected $cropped;

  protected $crop;

  protected $exactSize;

  protected $isIntermediate;

  protected $attachmentId;

  public function getSize( EntityBag $entityBag, $size )
  {
    return $size;
  }

  public function getUrl( EntityBag $entityBag, $url )
  {
    return $url;
  }

  public function getWidth( EntityBag $entityBag, $width )
  {
    return $width;
  }

  public function getHeight( EntityBag $entityBag, $height )
  {
    return $height;
  }

  public function getMaxWidth( EntityBag $entityBag, $maxWidth )
  {
    return $maxWidth;
  }

  public function getMaxHeight( EntityBag $entityBag, $maxHeight )
  {
    return $maxHeight;
  }

  public function getCropped( EntityBag $entityBag, $cropped )
  {
    return $cropped;
  }

  public function getCrop( EntityBag $entityBag, $crop )
  {
    return $crop;
  }

  public function getExactSize( EntityBag $entityBag, $exactSize )
  {
    return $exactSize;
  }

  public function getIsIntermediate( EntityBag $entityBag, $isIntermediate )
  {
    return $isIntermediate;
  }

  public function setAttachmentId( $attachmentId )
  {
    $this->attachmentId = $attachmentId;
  }
  public function setSize( $size )
  {
    $this->size = $size;
  }

  public function setUp( $attachmentId = null, $size = 'full'  )
  {
    if( is_numeric( $attachmentId ))
    {
      $this->setAttachmentId( $attachmentId );
      $this->setSize( $size );
      $meta = $this->_getMeta( $this->attachmentId, $this->size );
      if( $meta )
      {
        foreach ( $meta as $k =>$v )
        {
          $this->$k = $v;
        }
      }
    }
  }

  protected function _getMeta( $attachmentId, $size )
  {
    $data = [];
	global $_wp_additional_image_sizes;

    $availableSizes = get_intermediate_image_sizes();
    $availableSizes[] = 'full';

    if( ! in_array($size, $availableSizes))
    {
      return false;
    }

    if( in_array($size, array( 'thumbnail', 'medium', 'large' ) ))
    {
      $data['maxWidth'] = (int) get_option( $size . '_size_w' );
      $data['maxHeight'] = (int) get_option( $size . '_size_h' );
      $data['crop'] = (bool) get_option( $size . '_crop' );
    } elseif ($size == 'full') {
      $data['maxWidth'] = false;
      $data['maxHeight'] = false;
      $data['crop'] = false;
    } else {
      $data['maxWidth'] = $_wp_additional_image_sizes[ $size ]['width'];
      $data['maxHeight'] = $_wp_additional_image_sizes[ $size ]['height'];
      $data['crop'] = $_wp_additional_image_sizes[ $size ]['crop'];
    }

    $meta = wp_get_attachment_image_src( $attachmentId, $size );
    $url = $meta[0];
    $width =$meta[1];
    $height = $meta[2];
    $isIntermediate = $meta[3];

    // was the image properly resized for cropped
/*
    $cropped = false;
    if( $data['crop'] &&
    ( $width < $data['width'] || $height < $data['height'])) {
      $cropped = true;
    }
*/
    $data['exactSize'] = ( $width == $data['maxWidth'] && $height == $data['maxHeight']);

    $data['url'] = $url;
    $data['isIntermediate'] = $isIntermediate;
    $data['width'] = $width;
    $data['height'] = $height;

    return $data;
  }
}