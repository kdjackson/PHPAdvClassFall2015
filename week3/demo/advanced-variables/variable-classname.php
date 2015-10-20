<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        
        class MyClass {
            
            public $hello = 'hello world';
            
            public function test() {
                echo 'this is a test';
            }
            
        }

        $classname = 'MyClass';
        $funcname = 'test';
        
        $varName = 'hello';
        
        //new MyClass();
        $obj = new $classname();
        
        //$obj->test();
        $obj->$funcname();
        
        //$obj->hello;
        echo $obj->$varName;
        
        
        

        ?>
    </body>
</html>
