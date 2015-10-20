<?php
/**
 * Description of Triagle
 *
 * @author GFORTI
 */
class Triangle implements IShapes{
    
    
    public function width() {
        return 1000;
    }
    
    public function height() {
        return 1000;
    }
    
    public function area() {
        return $this->width() * $this->height();
    }
}
