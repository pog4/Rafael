<link rel="stylesheet" href="css.css">
<h1 id="tit">Listagem de Produtos</h1>
<br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<?php

    $sql = "SELECT p.codigo, p.nome, p.valor, pg.descricao 
    FROM produtos p
    inner join produtos_grupos pg on (p.grupo_id = pg.id)";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();
    ?>
    <table class='table'>
        <thead>
        <tr>
        <th class="table-dark" scope='col'>código</th>
        <th class="table-dark" scope='col'>nome</th>
        <th class="table-dark" scope='col'>valor</th>
        <th class="table-dark" scope='col'>grupo</th>
        <th class="table-dark" scope='col'>atualizar / deletar</th>

        </tr>
    </thead>
    <tbody>
        <?php
            while ($linha = $consulta->fetch()) {
        ?>
        <tr>
        <td ><?php echo $linha['codigo']; ?></td>
        <td><?php echo $linha['nome']; ?></td>
        <td><?php echo $linha['valor']; ?></td>
        <td><?php echo $linha['descricao']; ?></td>

        <td>
        <?php
        echo "<a class='btn btn-primary' href=\"?pagina=p_atualizar&codigo={$linha['codigo']}\">Atualizar</a>";
        ?>
        /
        <?php
        echo "<a class='btn btn-danger' href=\"?pagina=p_delete&codigo={$linha['codigo']}\">Deletar</a>";
        ?> </tr> <?php } ?> </td>

        </tbody>
    </table>