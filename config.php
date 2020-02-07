<?php

   $autoload = function($class){
        include('classes'.$class.'.php');
   };

   spl_autoload_register($autoload);

    //Localhost 
    define('INCLUDE_PATH','http://localhost/Projeto_01/');


    //Servidor 000webostapp
    //define('INCLUDE_PATH','http://daniloaugustocv.000webhostapp.com/Projeto_01/');

?>