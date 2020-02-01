<?php



spl_autoload_register(function ($calledClassName) {

    $normalizedClassName = preg_replace('`^\\\\`', '', $calledClassName);


    if(strpos($normalizedClassName, 'ElBiniou\Deezer') === 0) {

        $relativeClassName = str_replace('ElBiniou\Deezer', '', $normalizedClassName);
        $relativePath = str_replace('\\', '/', $relativeClassName);


        $definitionClass = __DIR__.'/class/Deezer'.$relativePath.'.php';


        if(is_file($definitionClass)) {
            include($definitionClass);
        }
    }



});


