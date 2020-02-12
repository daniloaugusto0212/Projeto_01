<?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
   $autoload = function($class){
        if($class == 'Email'){
          include_once('classes/phpmailer/PHPMailerAutoload.php');  
        }
        include('classes/'.$class.'.php');
        
   };

   spl_autoload_register($autoload);

    //Localhost 
    define('INCLUDE_PATH','http://localhost/Projeto_01/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    //Conectar com o banco de dados
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','projeto_01');

    


    //Servidor 000webostapp
   /* define('INCLUDE_PATH','http://daniloaugustocv.000webhostapp.com/Projeto_01/');

    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    //Conectar com o banco de dados
    define('HOST','localhost');
    define('USER','id11864505_admin');
    define('PASSWORD','681015');
    define('DATABASE','id11864505_adminusuarios');*/

    //Contantes para painel de controle
    define ('NOME_EMPRESA','Dansol');


    //Funcções

    function pegaCargo($cargo){
      $arr = [
        '0' => 'Normal',
        '1' => 'Sub Administrador',
        '2' => 'Administrador'];

        return $arr[$cargo];

    }
?>