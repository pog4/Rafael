<link rel="stylesheet" href="css.css">
<h1 id="tit">Listagem de Produtos</h1>
<br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<?php

    $sql = "SELECT IDFuncionario, Sobrenome, Nome, Titulo, Endereco, 
    Cidade, Cep, Pais, TelefoneResidencial, Extensao, Notas
    FROM funcionarios
    order by IDFuncionario";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();
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
        <?php
            while ($linha = $consulta->fetch()) {
        ?>
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

        <td>
        <?php
        echo "<a class='btn btn-primary' href=\"?pagina=p_atualizarfu&IDFuncionario={$linha['IDFuncionario']}\">Atualizar</a>";
        ?>
        /
        <?php
        echo "<a class='btn btn-danger' href=\"?pagina=p_deletarfu&IDFuncionario={$linha['IDFuncionario']}\">Deletar</a>";
        ?> </tr> <?php } ?> </td>

        </tbody>
    </table>