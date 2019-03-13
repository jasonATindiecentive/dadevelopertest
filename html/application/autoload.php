<?php

/*
 * Generic and quick auto loader
 *
 *
 */

spl_autoload_register(function ($class_name) {
    $a=explode('\\',$class_name);
    $class_name=array_pop($a);

    $filename =  dirname(__FILE__) . "/libraries/" . $class_name . '.php';

    if (file_exists($filename))
        include_once($filename);
    else {
        throw new Exception("{$filename} was not found");
    }

});
