<link rel="stylesheet" href="css.css">
<?php
    if (isset($_POST['deletar'])){
        $sql = "DELETE from funcionarios where IDFuncionario = :IDFuncionario";
        $parse = $conn->prepare($sql);
        $parse->execute(array("IDFuncionario" => $_GET['IDFuncionario']));
        header("Location: ?pagina=p_funcionarios");
    }
?>

<h1 id="tit">Deletar Fornecedor</h1>
<br>

<?php
   $sql = "SELECT IDFuncionario, Sobrenome, Nome, Titulo, Endereco, 
   Cidade, Cep, Pais, TelefoneResidencial, Extensao, Notas
   FROM funcionarios
    where IDFuncionario = :IDFuncionario";

    $consulta = $conn->prepare($sql);
    $consulta->execute(array("IDFuncionario" => $_GET['IDFuncionario']));

    $linha = $consulta->fetch();
    
?>
    <table class='table'>
        <thead>
        <tr>
        <th class="table-dark" scope='col'>ID</th>
        <th class="table-dark" scope='col'>Sobrenome</th>
        <th class="table-dark" scope='col'>Nome</th>
        <th class="table-dark" scope='col'>Título</th>
        <th class="table-dark" scope='col'>Endereco</th>
        <th class="table-dark" scope='col'>Cidade</th>
        <th class="table-dark" scope='col'>Cep</th>
        <th class="table-dark" scope='col'>Pais</th>
        <th class="table-dark" scope='col'>Telefone Residencial</th>
        <th class="table-dark" scope='col'>Extensao</th>
        <th class="table-dark" scope='col'>Notas</th>

        </tr>
    </thead>
    <tbody>
        <tr>
        <td><?php echo $linha['IDFuncionario']; ?></td>
        <td><?php echo $linha['Sobrenome']; ?></td>
        <td><?php echo $linha['Nome']; ?></td>
        <td><?php echo $linha['Titulo']; ?></td>
        <td><?php echo $linha['Endereco']; ?></td>
        <td><?php echo $linha['Cidade']; ?></td>
        <td><?php echo $linha['Cep']; ?></td>
        <td><?php echo $linha['Pais']; ?></td>
        <td><?php echo $linha['TelefoneResidencial']; ?></td>
        <td><?php echo $linha['Extensao']; ?></td>
        <td><?php echo $linha['Notas']; ?></td>
        </tr>
        </tbody>
    </table>

<form method="post"  >
    <input type="hidden" name="IDFuncionarios">
    <input class="btn btn-danger" type="submit" name="deletar" value="Deletar">
</form>


