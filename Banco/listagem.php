<?php

    $dados = $conn->query('SELECT * FROM filmes');

?>

<table class="table table-striped">
    <tr>
        <td>Código</td>
        <td>Nome</td>
        <td>Ano</td>
        <td>Resumo</td>
        <td>Inf. Adicionais</td>
        <td>Capa</td>
    </tr>
    <?php
    foreach($dados as $linha){
    
    ?>
    <tr>
        <td><?php echo $linha['codigo']?></td>
        <td><?php echo $linha['nome']?></td>
        <td><?php echo $linha['ano']?></td>
        <td><?php echo $linha['resumo']?></td>
        <td><?php echo $linha['produtores']?></td>
        <td> <img src="<?php echo $linha['imagem']?>" class="img-thumbnail"/></td>
    </tr>
    <?php
    }
    ?>
</table>