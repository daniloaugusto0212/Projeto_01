
<?php
    verificaPermissaoPagina(2);
    
?>
<div class="box-content">
    <h2><i class="fas fa-user-plus"></i> Adicionar Slides</h2>

    <form  method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para funcionar o upload de imagens-->

        <?php
            if (isset($_POST['acao'])) {               
                $nome = $_POST['nome'];                
                $imagem = $_FILES['imagem'];
                
                if ($login == '') {                    
                    Painel::alert('erro',' O nome está vazio!');                
                }else if($imagem['name'] ==''){
                    Painel::alert('erro',' A imagem precisa estar selecionada!');
                }else{
                    //Podemos cadastrar!
                    if ($cargo >= $_SESSION['cargo']) {                        
                        Painel::alert('erro',' Você precisa selecionar um cargo maior que o seu!');                        
                    }else if(Painel::imagemValida($imagem) == false){
                        Painel::alert('erro',' O formato especificado não está correto!'); 
                    }else if(usuario::userExists($login)){
                        Painel::alert('erro',' O login já existe, selecione outro, por favor!'); 
                    }else{
                        //Apenas cadastrar no banco de dados!
                        $usuario = new Usuario();
                        $imagem = Painel::uploadFile($imagem);
                        $usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);

                        Painel::alert('sucesso', ' O cadastro do usuário '.$login.' foi feito com sucesso!');
                    }
                }                
                
            }
        ?>

        <div class="form-group">
            <label>Login: </label>
            <input type="text" name="login">
        </div><!--form-group-->

        <div class="form-group">
            <label>Nome: </label>
            <input type="text" name="nome">
        </div><!--form-group-->

        <div class="form-group">
            <label>Senha: </label>
            <input type="password" name="password">
        </div><!--form-group-->

        <div class="form-group">
            <label>Cargo: </label>
            <select  name="cargo">
                <?php
                    foreach (Painel::$cargos as $key => $value) {
                        if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                ?>
            </select>
        </div><!--form-group-->


        <div class="form-group">
            <label>Imagem</label>
            <input type="file" name="imagem" >            
        </div><!--form-group-->

        <div class="form-group">            
            <input type="submit" name="acao" value="Cadastrar!">
        </div><!--form-group-->
    </form>
</div><!--box-conten-->