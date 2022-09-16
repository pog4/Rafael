<link rel="stylesheet" href="css.css">
<h1 id="tit">Listagem de Fornecedores</h1>
<br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<?php

    $sql = "SELECT p.IDFornecedor, p.NomeCompanhia, p.NomeContato, p.TituloContato, p.Endereco, p.Cidade, p.Pais, p.Telefone
    FROM fornecedores p
    order by IDFornecedor";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();
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
        <th class="table-dark" scope='col'>Atualizar / Deletar</th>

        </tr>
    </thead>
    <tbody>
        <?php
            while ($linha = $consulta->fetch()) {
        ?>
        <tr>
        <td><?php echo $linha['IDFornecedor']; ?></td>
        <td><?php echo $linha['NomeCompanhia']; ?></td>
        <td><?php echo $linha['NomeContato']; ?></td>
        <td><?php echo $linha['TituloContato']; ?></td>
        <td><?php echo $linha['Endereco']; ?></td>
        <td><?php echo $linha['Cidade']; ?></td>
        <td><?php echo $linha['Pais']; ?></td>
        <td><?php echo $linha['Telefone']; ?></td>
        <td>
        <?php
        echo "<a class='btn btn-primary' href=\"?pagina=p_atualizarf&IDFornecedor={$linha['IDFornecedor']}\">Atualizar</a>";
        ?>
        <?php
        echo "<a class='btn btn-danger' href=\"?pagina=p_deletarf&IDFornecedor={$linha['IDFornecedor']}\">Deletar</a>";
        echo "</td>";
        ?> </tr> <?php } ?> 
        </tbody>
    </table>