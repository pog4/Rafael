<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
<h1 id="tit">Cadastro de Fornecedor</h1>
<?php
    if (isset($_POST['gravar'])) {
        $sql = "INSERT into funcionarios (Sobrenome,Nome,Titulo,Endereco, Cidade, Cep, Pais, TelefoneResidencial, Extensao, Notas)
        values (:Sobrenome,:Nome,:Titulo,:Endereco,:Cidade,:Cep,:Pais,:TelefoneResidencial,:Extensao,:Notas)";
        $consulta = $conn->prepare($sql);
        $consulta->execute(
        array("Sobrenome" => $_POST['Sobrenome'],
        "Nome" => $_POST['Nome'],
        "Titulo" => $_POST['Titulo'],
        "Endereco" => $_POST['Endereco'],
        "Cidade" => $_POST['Cidade'],
        "Cep" => $_POST['Cep'],
        "Pais" => $_POST['Pais'],
        "TelefoneResidencial" => $_POST['TelefoneResidencial'],
        "Extensao" => $_POST['Extensao'],
        "Notas" => $_POST['Notas'])
    );
}
?>
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
        <label  class="form-label">TelefoneResidencial</label>
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
    <button type="submit" name="gravar"class="btn btn-success">Enviar</button>

</div>
</form>