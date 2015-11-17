<?php

function load_lib($base) {
    $baseName = explode( '\\', $base );
    $class = end( $baseName ); 
     
    include 'models/'.$class . '.php';
      
};
spl_autoload_register('load_lib');