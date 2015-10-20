<?php

/**
 * Description of Scope
 *
 * @author GForti
 * 
 * http://php.net/manual/en/language.oop5.magic.php
 * 
 * http://php.net/manual/en/language.oop5.cloning.php
 */
namespace week3\gforti;
use Exception;

class Scope {
   private $data = array();

   public function __construct(){
    $this->data = array();
    }

   public function __get($varName){

      if (!array_key_exists($varName,$this->data)){
          //this attribute is not defined!
          throw new Exception('Scope variable '. $varName .' not found or set.');
      } else { 
          return $this->data[$varName];
      }

   }

   public function __set($varName,$value){
      $this->data[$varName] = $value;
   }
}
