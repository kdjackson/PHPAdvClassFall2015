<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        include './IShapes.php';
        include './Square.php';
        include './Triangle.php';
        
        $square = new Square();
        $triangle = new Triangle();
        
        //var_dump($square);
        
        /*
         * $square is a instacne of the class Square but not of Triangle
         * 
         * it's better to check if a class is an instance of an interface rather than
         * the class it was created from.
         */
        var_dump($square instanceof IShapes);
        var_dump($triangle instanceof IShapes);
        
        
        
        ?>
    </body>
</html>
