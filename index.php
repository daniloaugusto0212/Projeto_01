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
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon"/>    
    <meta charset="UTF-8">   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
</head>
<body> 
        <?php
            if(isset($_POST['acao'])){
                //Enviei o formulário.
                if($_POST['email'] != ''){
                    $email = $_POST['email'];
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        //Tudo certo, é um email, só enviar
                        $mail = new Email('imap.ig.com.br','dansol@ig.com.br','*****','Danilo');
                        $mail->addAdress('magrao_dan@gmail.com','DanSol');
                        $info = ['assunto'=>'Um novo e-mail cadastrado no site!','corpo'=>$email];
                        $mail->formatarEmail($info);
                        if ($mail->enviarEmail()) {
                            echo '<script>alert("Enviado com sucesso!")</script>';
                        }else{
                            echo '<script>alert("Algo deu errado!")</script>';
                        }
                    }else{
                        echo '<script>alert("Não é um e-mail válido!")</script>';
                    }
                }else{
                    echo '<script>alert("Campos vazios não são permitidos!")</script>';
                }
            }
        ?>
<base base="<?php echo INCLUDE_PATH; ?>" />
    <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        switch ($url) {
            case 'depoimentos':
                echo '<target target="depoimentos"  />';
                break;

            case 'servicos':
                echo '<target target="servicos"  />';
                break;            
        }

    ?>

    
    <header>
        <div class="center">
            <div class="logo left"><a href="/">Logomarca</a></div><!--logo-->
            <nav class="desktop right">
                <ul>
                <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>                
                </ul>        
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile"><i class="fas fa-arrow-alt-circle-down"></i></div>
                <ul>
                <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>                
                </ul>        
            </nav>
        <div class='clear'></div>
        </div><!--center-->

    </header>

    <div class="container-principal">
    <?php
        if (file_exists('pages/'.$url.'.php')) {
            include('pages/'.$url.'.php');
        }else{
            if ($url != 'depoimentos' && $url != 'servicos') {
                //Podemos fazer o que quiser, pois a página não existe
                $pagina404 = true;
                include('pages/404.php');
            }else{
                include('pages/home.php');
            }    
        }
            
   ?>
   </div><!--container-principal-->          

    <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"';?>>
        <div class="center">
            <p>Todo os direitos reservados</p>
        </div><!--center-->
    </footer >
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzasyDHPNqxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
    <?php
        if ($url == 'home' || $url == '') {
            
    ?>
    <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
        <?php } ?>
    <?php
        if($url == 'contato'){
    ?>
    <?php }?>
    <script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>
    
</body>
</html>



