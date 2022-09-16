<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
<h1 id="tit">Atualizar Produtos</h1>
<?php
    if (isset($_POST['atualizar'])) {
        $sql = "UPDATE clientes    
        set NomeCompanhia = :companhia
        , NomeContato = :contato
        , TituloContato = :titulo
        , Endereco = :endereco
        , Cidade = :cidade
        , CEP = :CEP
        , Pais = :pais
        , Telefone = :telefone
        where IDCliente = :IDCliente";
        

    $atualizar = $conn->prepare($sql);
    $atualizar->execute(array(
    "companhia" => $_POST['companhia'],
    "contato" => $_POST['contato'],
    "titulo" => $_POST['titulo'],
    "endereco" => $_POST['endereco'],
    "cidade" => $_POST['cidade'],
    "CEP" => $_POST['CEP'],
    "pais" => $_POST['pais'],
    "telefone" => $_POST['telefone'],
    "IDCliente" => $_GET['IDCliente'])
    );
    echo "Atualizado com sucesso!";
}

$sql = "SELECT IDCliente, NomeCompanhia, NomeContato, TituloContato, Endereco, Cidade, CEP, Pais, Telefone
FROM clientes
where IDCliente = :IDCliente";
    $cliente = $conn->prepare($sql);
    $cliente ->execute(array("IDCliente" => $_GET['IDCliente']));

    $linha = $cliente ->fetch();
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

<form method="post">
    <div id="aaa">
    <div class="mb-3">
        <label  class="form-label">Nome da Companhia</label>
        <input type="text" class="form-control" name="companhia">
    </div>
    <div class="mb-3">
        <label  class="form-label">Contato</label>
        <input type="text" class="form-control" name="contato">
  </div>
  <div class="mb-3">
        <label  class="form-label">Título Contato</label>
        <input type="text" class="form-control" name="titulo">
  </div>
    <div class="mb-3">
        <label  class="form-label">Endereço</label>
        <input type="text" class="form-control" name="endereco">
  </div>


  <div class="mb-3">
        <label  class="form-label">Cidade</label>
        <input type="text" class="form-control" name="cidade">
  </div>
  <div class="mb-3">
        <label  class="form-label">País</label>
        <input type="text" class="form-control" name="pais">
  </div>
  <div class="mb-3">
        <label  class="form-label">CEP</label>
        <input type="text" class="form-control" name="CEP">
  </div>
  <div class="mb-3">
        <label  class="form-label">Telefone</label>
        <input type="text" class="form-control" name="telefone">
  </div>

            <br>
    <button type="submit" name="atualizar"class="btn btn-success">Atualizar</button>

</div>
</form>