<?php
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 2;

    $depoimentos = Painel::selectAll('tb_site.depoimentos',($paginaAtual - 1) * $porPagina,$porPagina);
    
?>

<div class="box-content">
    <h2><i class="far fa-list-alt"></i> Depoimentos Cadastrados</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td>Nome</td>
                <td>Data</td>
                <td>#</td>
                <td>#</td>
            </tr>

            <?php
                foreach ($depoimentos as $key => $value) {                   
            ?>
            <tr>
                <td><?php echo $value['nome']; ?></td>            
                <td><?php echo $value['data']; ?></td>
                <td><a class="btn edit" href=""><i class="fa fa-pen" ></i> Editar</a></td>
                <td><a class="btn delete" href=""><i class="fa fa-times"></i> Excluir</a></td>
            </tr>

                <?php } ?>
        </table>
    </div><!--wraper-table-->

    <div class="paginacao">
        <?php
            $totalPagina = ceil(count(Painel::selectAll('tb_site.depoimentos')) / $porPagina);

            for ($i=1; $i <= $totalPagina; $i++) { 
                if($i == $paginaAtual){
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                }
            }
        ?>
    </div><!--paginacao-->

</div><!--box-content-->