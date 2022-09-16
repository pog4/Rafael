<link rel="stylesheet" href="css.css">
<?php
    if (isset($_POST['deletar'])){
        $sql = "DELETE from clientes where IDCliente = :IDCliente";
        $parse = $conn->prepare($sql);
        $parse->execute(array("IDCliente" => $_GET['IDCliente']));
        header("Location: ?pagina=p_clientes");
    }
?>

<h1 id="tit">Deletar Clientes</h1>
<br>

<?php
   $sql = "SELECT IDCliente, NomeCompanhia, NomeContato, TituloContato, Endereco, Cidade, CEP, Pais, Telefone
   FROM clientes
    where IDCliente = :IDCliente";
    

    $consulta = $conn->prepare($sql);
    $consulta->execute(array("IDCliente" => $_GET['IDCliente']));

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
        <th class="table-dark" scope='col'>CEP</th>
        <th class="table-dark" scope='col'>Pais</th>
        <th class="table-dark" scope='col'>Telefone</th>

        </tr>
    </thead>
    <tbody>
        <tr>
        <td><?php echo $linha['IDCliente']; ?></td>
        <td><?php echo $linha['NomeCompanhia']; ?></td>
        <td><?php echo $linha['NomeContato']; ?></td>
        <td><?php echo $linha['TituloContato']; ?></td>
        <td><?php echo $linha['Endereco']; ?></td>
        <td><?php echo $linha['Cidade']; ?></td>
        <td><?php echo $linha['CEP']; ?></td>
        <td><?php echo $linha['Pais']; ?></td>
        <td><?php echo $linha['Telefone']; ?></td>
        </tr>
        </tbody>
    </table>

<form method="post"  >
    <input type="hidden" name="IDFornecedor">
    <input class="btn btn-danger" type="submit" name="deletar" value="Deletar">
</form>


