<?php
    include('../config.php');
    $data = [];
    $assunto = 'Nova mensagem do site.';
    $corpo = '';
    foreach ($_POST as $key => $value) {
        $corpo.=ucfirst($key).": ".$value;
        $corpo.="<hr>";
    }
    $info = array('assunto'=>$assunto,'corpo'=>$corpo);
    $mail = new Email('smtp.live.com','daniloaugusto0212@hotmail.com','*','Danilo');
    $mail->addAdress('daniloaugusto0212@hotmail.com','DanSol');                
    $mail->formatarEmail($info);
    if ($mail->enviarEmail()) { 
        $data['sucesso'] = true;
    }else{
        $data['erro'] = true;
    } 

    //$data['retorno'] = 'Sucesso!';
    
    die(json_encode($data));

?>