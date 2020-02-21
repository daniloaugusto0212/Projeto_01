<?php

    class Painel  
    {
        public static $cargos = [
            '0' => 'Normal',
            '1' => 'Sub Administrador',
            '2' => 'Administrador'];
            
        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }
 
        public static function logout(){
            setcookie('lembrar','true',time()-1,'/');
            session_destroy();
            header('Location: '.INCLUDE_PATH_PAINEL);
        }
 
        public static function carregarPagina(){
            if(isset($_GET['url'])){
                $url = explode('/',$_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                }else{
                    //Página não existe!
                    header('Location: '.INCLUDE_PATH_PAINEL);
                }
            }else{
                include('pages/home.php');
            }
        }
 
        public static function listarUsuariosOnline(){
            self::limparUsuariosOnline();
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
            $sql->execute();
            return $sql->fetchAll();
        }
 
        public static function limparUsuariosOnline(){
            $date = date('Y-m-d H:i:s');
            $sql = MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
        }

        public static function alert($tipo,$mensagem){
            if ($tipo == 'sucesso') {
                echo '<div class="box-alert sucesso"><i class="fa fa-check"></i>'.$mensagem.'</div>';
            }else if($tipo == 'erro'){
            echo '<div class="box-alert erro"><i class="fa fa-times"></i>'.$mensagem.'</div>';
            }
        }
        
        public static function imagemValida($imagem){
            if ($imagem['type'] == 'image/jpeg' ||
                $imagem['type'] == 'image/jpg' ||
                $imagem['type'] == 'image/png') {

                $tamanho = intval($imagem['size']/1024);
                if ($tamanho < 300) {
                    return true;
                }else{
                    return false;
                }                
            }else{
                return false;
            }
        }

        public static function uploadFile($file){
            $formatoArquivo = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome)){
                return $imagemNome;
            }else{
                return false;
            }
        }

        public static function deleteFile($file){
            @unlink('uploads/'.$file);
        }

        public static function insert(){
            $certo = true;
            $nome_tabela = $arr['nome_tabela'];
            $query = "INSERT INTO `$nome_tabela` VALUES (null";
            foreach ($arr as $key => $value) {
                $nome_coluna = $key;
                $valor = $value;
                if ($nome == 'acao' || $nome == $nome_tabela) {
                    continue;
                }
                if ($value == '') {
                    $certo = false;
                    break;
                }
                $query.=",?";
                $parametros[] = $value;
            }

            $query.=")";
            if($certo == true){
                $sql = MySql::conectar()->prepare($query);
                $sql->execute($parametros);
            }
            return $certo;
        }
        

    }
    
?>