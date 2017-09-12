<?php
namespace Converter\PropertyConverter;

use Sef\WpEntities\Components\Converter\PropertyConverter\Importdata2EntityPropertyConverter;


class ThemosisInfiniteField2EntityPropertyConverter extends Importdata2EntityPropertyConverter 
{

  // themosis infinite fields return an array, where the first item starts with index 1 instea of 0
  // the Importdata2EntityPropertyConverter doesnt recognize this as collection
  // this forces converting as a collection
  protected function isCollection( $data )
  {
    return true;
  }

}
