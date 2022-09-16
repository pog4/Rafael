<link rel="stylesheet" href="css.css">
<h1 id="tit">Listagem de Produtos</h1>
<br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<?php

    $sql = "SELECT p.IDProduto, p.NomeProduto, f.NomeCompanhia, pg.NomeCategoria, p.QuantidadePorUnidade, p.PrecoUnitario, p.UnidadesEmEstoque
    FROM produtos p
    inner join categorias pg on (p.IDCategoria = pg.IDCategoria)
    inner join fornecedores f on (p.IDFornecedor = f.IDFornecedor)
    order by IDProduto";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();
    ?>
    <table class='table'>
        <thead>
        <tr>
        <th class="table-dark" scope='col'>ID</th>
        <th class="table-dark" scope='col'>nome</th>
        <th class="table-dark" scope='col'>Fornecedor</th>
        <th class="table-dark" scope='col'>categoria</th>
        <th class="table-dark" scope='col'>Quantidade_por_unidade</th>
        <th class="table-dark" scope='col'>Preço_unitário</th>
        <th class="table-dark" scope='col'>Em_estoque</th>
        <th class="table-dark" scope='col'>atualizar / deletar</th>

        </tr>
    </thead>
    <tbody>
        <?php
            while ($linha = $consulta->fetch()) {
        ?>
        <tr>
        <td><?php echo $linha['IDProduto']; ?></td>
        <td><?php echo $linha['NomeProduto']; ?></td>
        <td><?php echo $linha['NomeCompanhia']; ?></td>
        <td><?php echo $linha['NomeCategoria']; ?></td>
        <td><?php echo $linha['QuantidadePorUnidade']; ?></td>
        <td><?php echo $linha['PrecoUnitario']; ?></td>
        <td><?php echo $linha['UnidadesEmEstoque']; ?></td>

        <td>
        <?php
        echo "<a class='btn btn-primary' href=\"?pagina=p_atualizar&IDProduto={$linha['IDProduto']}\">Atualizar</a>";
        ?>
        /
        <?php
        echo "<a class='btn btn-danger' href=\"?pagina=p_delete&IDProduto={$linha['IDProduto']}\">Deletar</a>";
        ?> </tr> <?php } ?> </td>

        </tbody>
    </table>