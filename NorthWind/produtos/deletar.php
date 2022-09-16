<link rel="stylesheet" href="css.css">
<?php
    if (isset($_POST['deletar'])){
        $sql = "DELETE from produtos where IDProduto = :IDProduto";
        $parse = $conn->prepare($sql);
        $parse->execute(array("IDProduto" => $_GET['IDProduto']));
        header("Location: ?pagina=p_produtos");
    }
?>

<h1 id="tit">Deletar Produto</h1>
<br>

<?php
    $sql = "SELECT p.IDProduto, p.NomeProduto, f.NomeCompanhia, pg.NomeCategoria, p.QuantidadePorUnidade, p.PrecoUnitario, p.UnidadesEmEstoque
    FROM produtos p
    inner join categorias pg on (p.IDCategoria = pg.IDCategoria)
    inner join fornecedores f on (p.IDFornecedor = f.IDFornecedor)
    where IDProduto = :IDProduto";

    $consulta = $conn->prepare($sql);
    $consulta->execute(array("IDProduto" => $_GET['IDProduto']));

    $linha = $consulta->fetch();
    
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

        </tr>
    </thead>
    <tbody>
            <tr>
        <td><?php echo $linha['IDProduto']; ?></td>
        <td><?php echo $linha['NomeProduto']; ?></td>
        <td><?php echo $linha['NomeCompanhia']; ?></td>
        <td><?php echo $linha['NomeCategoria']; ?></td>
        <td><?php echo $linha['QuantidadePorUnidade']; ?></td>
        <td><?php echo $linha['PrecoUnitario']; ?></td>
        <td><?php echo $linha['UnidadesEmEstoque']; ?></td>

            <td>
        </tbody>
    </table>

<form method="post"  >
    <input type="hidden" name="codigo">
    <input class="btn btn-danger" type="submit" name="deletar" value="Deletar">
</form>


