<?php
namespace Converter\PropertyConverter;

use Sef\WpEntities\Components\Converter\PropertyConverter\Importdata2EntityPropertyConverter;


class ThemosisInfiniteField2EntityPropertyConverter extends Importdata2EntityPropertyConverter 
{

  // themosis infinite fields return an array, where the first item starts with index 1 instead of 0
  // as a consequnce the Importdata2EntityPropertyConverter (which is inherited here) doesnt recognize this as collection
  // to solve this we force the converter to converting the array as a collection
  protected function isCollection( $data )
  {
    return true;
  }

}
