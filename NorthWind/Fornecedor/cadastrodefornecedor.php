<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
<h1 id="tit">Cadastro de Fornecedor</h1>
<?php
    if (isset($_POST['gravar'])) {
        $sql = "INSERT into fornecedores (NomeCompanhia,NomeContato,TituloContato,Endereco, Cidade, Pais, Telefone)
        values (:companhia,:contato,:titulo,:endereco,:cidade,:pais,:telefone)";    
        $consulta = $conn->prepare($sql);
        $consulta->execute(
        array("companhia" => $_POST['companhia'],
        "contato" => $_POST['contato'],
        "titulo" => $_POST['titulo'],
        "endereco" => $_POST['endereco'],
        "cidade" => $_POST['cidade'],
        "pais" => $_POST['pais'],
        "telefone" => $_POST['telefone'])
    );
}
?>
<form method="post">
    <div id="aaa">
    <div class="mb-3">
        <label  class="form-label">Companhia</label>
        <input type="text" class="form-control" name="companhia">
  </div>

    <div class="mb-3">
        <label  class="form-label">Contato</label>
        <input type="text" class="form-control" name="contato">
    </div>

    <div class="mb-3">
        <label  class="form-label">Endereço</label>
        <input type="text" class="form-control" name="endereco">
  </div>

  <div class="mb-3">
        <label  class="form-label">Titulo do Contato</label>
        <input type="text" class="form-control" name="titulo">
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
        <label  class="form-label">Telefone</label>
        <input type="text" class="form-control" name="telefone">
  </div>

            <br>
    <button type="submit" name="gravar"class="btn btn-success">Enviar</button>

</div>
</form>