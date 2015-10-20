<?php

/**
 * Description of Square
 *
 * @author GFORTI
 */
class Square implements IShapes {
    //put your code here
    
    public function width() {
        return 100;
    }
    
    public function height() {
        return 100;
    }
    
    public function area() {
        return $this->width() * $this->height();
    }
}
