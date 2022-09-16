<link rel="stylesheet" href="css.css">
<h1 id="tit">Listagem de Produtos</h1>
<br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<?php

    $sql = "SELECT IDCliente, NomeCompanhia, NomeContato, TituloContato, Endereco, Cidade, CEP, Pais, Telefone
    FROM clientes
    order by IDCliente";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();
    ?>
    <table class='table'>
        <thead>
        <tr>
        <th class="table-dark" scope='col'>IDCliente</th>
        <th class="table-dark" scope='col'>Nome Companhia</th>
        <th class="table-dark" scope='col'>Contato</th>
        <th class="table-dark" scope='col'>Título do Contato</th>
        <th class="table-dark" scope='col'>Endereço</th>
        <th class="table-dark" scope='col'>Cidade</th>
        <th class="table-dark" scope='col'>CEP</th>
        <th class="table-dark" scope='col'>Pais</th>
        <th class="table-dark" scope='col'>Telefone</th>

        </tr>
    </thead>
    <tbody>
        <?php
            while ($linha = $consulta->fetch()) {
        ?>
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

        <td>
        <?php
        echo "<a class='btn btn-primary' href=\"?pagina=p_atualizarc&IDCliente={$linha['IDCliente']}\">Atualizar</a>";
        ?>
        /
        <?php
        echo "<a class='btn btn-danger' href=\"?pagina=p_deletarc&IDCliente={$linha['IDCliente']}\">Deletar</a>";
        ?> </tr> <?php } ?> </td>

        </tbody>
    </table>