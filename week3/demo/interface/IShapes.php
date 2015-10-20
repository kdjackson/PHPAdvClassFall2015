<?php
/**
 *
 * @author GFORTI
 * 
 * http://php.net/manual/en/language.oop5.interfaces.php
 * 
 * Object interfaces allow you to create code which specifies which methods a class must implement, 
 * without having to define how these methods are handled.
 * 
 * All methods declared in an interface must be public; this is the nature of an interface.
 * 
 * Classes may implement more than one interface if desired by separating each interface with a comma.
 */
interface IShapes {
    //put your code here
    
   public function width();
   public function height();
    
}
