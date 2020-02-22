<?php
    $depoimentos = Painel::selectAll('tb_site.depoimentos');
?>

<div class="box-content">
    <h2><i class="far fa-list-alt"></i> Depoimentos Cadastrados</h2>

    <table>
        <tr>
            <td>Nome</td>
            <td>Data</td>
            <td>#</td>
            <td>#</td>
        </tr>

        <?php
            foreach ($depoimentos as $key => $value) {
                # code...
            
        ?>
        <tr>
            <td><?php echo $value['nome']; ?></td>            
            <td><?php echo $value['data']; ?></td>
            <td><a class="btn edit" href=""><i class="fa fa-pen" ></i> Editar</a></td>
            <td><a class="btn delete" href=""><i class="fa fa-times"></i> Excluir</a></td>
        </tr>

            <?php } ?>
    </table>

</div><!--box-content-->