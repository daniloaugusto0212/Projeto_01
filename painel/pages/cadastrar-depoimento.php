
<div class="box-content">
    <h2><i class="fas fa-pen"></i> Cadastrar Depoimentos</h2>

    <form  method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para funcionar o upload de imagens-->

        <?php
            if (isset($_POST['acao'])) {
                if(Painel::insert($_POST)){
                    Painel::alert('sucesso', ' O cadastro do depoimento foi realizado com sucesso!');    
                }else{
                    Painel::alert('erro', ' Campos vazios não são permitidos!');
                }          
                
            }
        ?>

        <div class="form-group">
            <label>Nome da pessoa: </label>
            <input type="text" name="nome">
        </div><!--form-group-->

        <div class="form-group">
            <label>Depoimento: </label>
            <textarea name="depoimento"></textarea>
        </div><!--form-group-->

       
        <div class="form-group"> 
            <input type="hidden" name="nome_tabela" value="tb_site.depoimentos">           
            <input type="submit" name="acao" value="Cadastrar!">
        </div><!--form-group-->
    </form>
</div><!--box-conten-->