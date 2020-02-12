<?php
    if(isset($_GET['logout'])){
        Painel::logout();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Painel de controle</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo INCLUDE_PATH; ?>estilo/css/all.css" rel="stylesheet"> <!--load all styles -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css">
</head>
<body>
<div class="menu">
    <div class="menu-wraper">
    <div class="box-usuario">
        <?php
            if($_SESSION['img'] == ''){              
        ?>
            <div class="avatar-usuario">
                <i class="fa fa-user"></i>
            </div><!--avatar-usuario-->
        <?php }else{ ?>
            <div class="imagem-usuario">
            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img'];?>">
        <?php } ?>
        </div><!--imagem-usuario-->
            <div class="nome-usuario">
                <p><?php echo $_SESSION['nome']; ?></p>
                <p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
            </div><!--nome-usuario-->        
    </div><!--box-usuario-->
    </div><!--menu-wraper-->
</div><!--menu-->
<header>
    <div class="center">
        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div><!--menu-btn-->
        <div class="logout">
            <a href="<?php echo INCLUDE_PATH_PAINEL ?>?logout"><span>Sair </span>  <i class="fas fa-sign-out-alt"></i></a>
        </div><!--logout-->
        <div class="clear"></div><!--clear-->
    </div><!--center-->
</header>
    <div class="content">
        <div class="box-content left w100">

        </div><!--box-content-->
        <!--<div class="box-content left w100">

        </div>
        <div class="box-content left w50">

        </div>
        <div class="box-content right w50">

        </div>
        -->
        <div class="clear"></div>
    </div><!--content-->
<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>   
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>


