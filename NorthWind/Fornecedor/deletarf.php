<link rel="stylesheet" href="css.css">
<?php
    if (isset($_POST['deletar'])){
        $sql = "DELETE from fornecedores where IDFornecedor = :IDFornecedor";
        $parse = $conn->prepare($sql);
        $parse->execute(array("IDFornecedor" => $_GET['IDFornecedor']));
        header("Location: ?pagina=p_fornecedor");
    }
?>

<h1 id="tit">Deletar Fornecedor</h1>
<br>

<?php
   $sql = "SELECT p.IDFornecedor, p.NomeCompanhia, p.NomeContato, p.TituloContato, p.Endereco, p.Cidade, p.Pais, p.Telefone
   FROM fornecedores p
    where IDFornecedor = :IDFornecedor";

    $consulta = $conn->prepare($sql);
    $consulta->execute(array("IDFornecedor" => $_GET['IDFornecedor']));

    $linha = $consulta->fetch();
    
?>
    <table class='table'>
        <thead>
        <tr>
        <th class="table-dark" scope='col'>ID</th>
        <th class="table-dark" scope='col'>Nome da Companhia</th>
        <th class="table-dark" scope='col'>Nome do Contato</th>
        <th class="table-dark" scope='col'>Título do Contato</th>
        <th class="table-dark" scope='col'>Endereço</th>
        <th class="table-dark" scope='col'>Cidade</th>
        <th class="table-dark" scope='col'>Pais</th>
        <th class="table-dark" scope='col'>Telefone</th>

        </tr>
    </thead>
    <tbody>
        <tr>
        <td><?php echo $linha['IDFornecedor']; ?></td>
        <td><?php echo $linha['NomeCompanhia']; ?></td>
        <td><?php echo $linha['NomeContato']; ?></td>
        <td><?php echo $linha['TituloContato']; ?></td>
        <td><?php echo $linha['Endereco']; ?></td>
        <td><?php echo $linha['Cidade']; ?></td>
        <td><?php echo $linha['Pais']; ?></td>
        <td><?php echo $linha['Telefone']; ?></td>
        </tr>
        </tbody>
    </table>

<form method="post"  >
    <input type="hidden" name="IDFornecedor">
    <input class="btn btn-danger" type="submit" name="deletar" value="Deletar">
</form>


