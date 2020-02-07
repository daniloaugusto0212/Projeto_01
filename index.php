<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Projeto 01</title>
    <link href="<?php echo INCLUDE_PATH; ?>estilo/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="palavras-chave,do,meu,site">
    <meta name="description" content="Descrição do meu site">
    <meta charset="UTF-8">   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
</head>
<body> 
    <header>
        <div class="center">
            <div class="logo left"><a href="/">Logomarca</a></div><!--logo-->
            <nav class="desktop right">
                <ul>
                <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>        
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile"><i class="fas fa-arrow-alt-circle-down"></i></div>
                <ul>
                <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>        
            </nav>
        <div class='clear'></div>
        </div><!--center-->

    </header>

   <?php
   
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        if (file_exists('pages/'.$url.'.php')) {
            include('pages/'.$url.'.php');
        }else{
            //Podemos fazer o que quiser, pois a página não existe
            $pagina404 = true;
            include('pages/404.php');
        }
   ?>

    <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"';?>>
        <div class="center">
            <p>Todo os direitos reservados</p>
        </div><!--center-->
    </footer >
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
</body>
</html>

