<?php
    $url = explode('/',$_GET['url']);
    if (!isset($url[2])) 
        {    
?>
<section class="header-noticias">
    <div class="center">
        <h2 ><i class="far fa-bell"></i></h2>
        <h2>Acompanhe as últimas <b>notícias do portal</b></h2>
    </div><!--center-->
</section>

<section class="container-portal">
    <div class="center">
        <div class="sidebar">
            <div class="box-content-sidebar">
                <h3><i class="fa fa-search"></i> Realizar uma busca:</h3>
                <form>
                    <input type="text" name="busca" placeholder="O que deseja procurar?" required>
                    <input type="submit" name="acao" value="Pesquisar!">
                </form>
            </div><!--box-content-sidebar-->

            <div class="box-content-sidebar">
                <h3><i class="fa fa-list"></i> Selecione a categoria:</h3>
                <form>
                   <select name="categoria" id="">
                       <option value="esportes">Esportes</option>
                       <option value="esportes">Geral</option>
                   </select>                    
                </form>
            </div><!--box-content-sidebar-->

            <div class="box-content-sidebar">
                <h3><i class="fa fa-user"></i> Sobre o autor:</h3>
                    <div class="autor-box-portal">
                        <div class="box-img-autor"></div>
                        <div class="texto-autor-portal text-center">
                            <h3>Danilo Augusto</h3>
                            <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, .</p>
                        </div><!--texto-autor-portal-->
                    </div><!--autor-box-portal-->
            </div><!--box-content-sidebar-->
        </div><!--sidebar-->

        <div class="conteudo-portal">
            <div class="header-conteudo-portal">
               <!-- <h2>Visualizando todos os Posts</h2> -->
                <h2>Visualizando Posts em <span>Esportes</span></h2>
            </div><!--header-conteudo-portal-->
            <?php
                for ($i=0; $i < 5; $i++) { 
                                   
            ?>
            <div class="box-single-conteudo">
                <h2>19/09/2009 - Conheça os eleitos para ga...</h2>
                <p>É um fato estabelecido há muito tempo que um leitor se distrai com o conteúdo legível de uma página ao examinar seu layout. O objetivo de usar Lorem Ipsum é que ele tem uma distribuição de letras mais ou menos normal, em vez de usar 'Conteúdo aqui, conteúdo aqui', fazendo com que pareça um inglês legível. Muitos pacotes de editoração eletrônica e editores de páginas da web agora usam Lorem Ipsum como texto padrão do modelo, e uma pesquisa por 'lorem ipsum' descobrirá muitos sites ainda na infância. Várias versões evoluíram ao longo dos anos, às vezes por acidente, às vezes de propósito (humor injetado e similares).</p>
                <a href="<?php echo INCLUDE_PATH; ?>noticias/esportes/nome-do-post">Leia mais</a>
            </div><!--box-single-conteudo-->
            <?php } ?>

            <div class="paginator">
                <a class="active-page" href="">1</a>
                <a href="">2</a>
                <a href="">3</a>
                <a href="">4</a>
            </div><!--paginator-->
        </div><!--conteudo-portal-->

        <div class="clear"></div>
    </div><!--center-->
    
</section><!--container-portal-->

<?php }else{ 
    include('noticia_single.php');
    
}
    ?>

