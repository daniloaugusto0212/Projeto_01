<?php
    $site = Painel::select('tb_site.config',false);
?>
<div class="box-content">
    <h2><i class="fa fa-pencil"></i> Editar Configurações do Site</h2>
 
    <form method="post" enctype="multipart/form-data">
 
        <?php
            if(isset($_POST['acao'])){
                if(Painel::update($_POST,true)){
                    Painel::alert('sucesso','O serviço foi editado com sucesso!');
                    $servico = Painel::select('tb_site.config',false);
                }else{
                    Painel::alert('erro','Campos vázios não são permitidos.');
                }
            }
        ?>
        
 
        <div class="form-group">
            <label>Título do site:</label>
            <input type="text" name="titulo" value="<?php echo $site['titulo'] ?>">
        </div><!--form-group-->
        
 
        <div class="form-group">            
            <input type="hidden" name="nome_tabela" value="tb_site.config" />
            <input type="submit" name="acao" value="Atualizar!">
        </div><!--form-group-->
 
    </form>
 
 
 
</div><!--box-content-->

