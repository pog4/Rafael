<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
<h1 id="tit">Atualizar funcionarios</h1>
<?php
    if (isset($_POST['atualizar'])) {
        $sql = "UPDATE funcionarios
        set Sobrenome = :Sobrenome
        , Nome = :Nome
        , Titulo = :Titulo
        , Endereco = :Endereco
        , Cidade = :Cidade
        , Cep = :Cep
        , Pais = :Pais
        , TelefoneResidencial = :TelefoneResidencial
        , Extensao = :Extensao
        , Notas = :Notas
        where IDFuncionario = :IDFuncionario";

    $atualizar = $conn->prepare($sql);
    $atualizar->execute(array(
        "Sobrenome" => $_POST['Sobrenome'],
        "Nome" => $_POST['Nome'],
        "Titulo" => $_POST['Titulo'],
        "Endereco" => $_POST['Endereco'],
        "Cidade" => $_POST['Cidade'],
        "Cep" => $_POST['Cep'],
        "Pais" => $_POST['Pais'],
        "TelefoneResidencial" => $_POST['TelefoneResidencial'],
        "Extensao" => $_POST['Extensao'],
        "Notas" => $_POST['Notas'],
        "IDFuncionario" => $_GET['IDFuncionario']
    ));
    echo "Atualizado com sucesso!";
}

      $sql = "SELECT IDFuncionario, Sobrenome, Nome, Titulo, Endereco, 
      Cidade, Cep, Pais, TelefoneResidencial, Extensao, Notas
      FROM funcionarios
    where IDFuncionario = :IDFuncionario";
    $func = $conn->prepare($sql);
    $func ->execute(array("IDFuncionario" => $_GET['IDFuncionario']));

    $linha = $func ->fetch();
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
<form method="post">
    <div id="aaa">
    <div class="mb-3">
        <label  class="form-label">Sobrenome</label>
        <input type="text" class="form-control" name="Sobrenome">
  </div>
    <div class="mb-3">
        <label  class="form-label">Nome</label>
        <input type="text" class="form-control" name="Nome">
    </div>
    <div class="mb-3">
        <label  class="form-label">Titulo</label>
        <input type="text" class="form-control" name="Titulo">
  </div>
  <div class="mb-3">
        <label  class="form-label">Endereço</label>
        <input type="text" class="form-control" name="Endereco">
  </div>
  <div class="mb-3">
        <label  class="form-label">Cidade</label>
        <input type="text" class="form-control" name="Cidade">
  </div>
  <div class="mb-3">
        <label  class="form-label">Cep</label>
        <input type="text" class="form-control" name="Cep">
  </div>
  <div class="mb-3">
        <label  class="form-label">País</label>
        <input type="text" class="form-control" name="Pais">
  </div>

  <div class="mb-3">
        <label  class="form-label">Telefone Residencial</label>
        <input type="text" class="form-control" name="TelefoneResidencial">
  </div>
  <div class="mb-3">
        <label  class="form-label">Extensao</label>
        <input type="text" class="form-control" name="Extensao">
  </div>
  <div class="mb-3">
        <label  class="form-label">Notas</label>
        <input type="text" class="form-control" name="Notas">
  </div>
            <br>
    <button type="submit" name="atualizar"class="btn btn-success">Atualizar</button>
</div>
</form>