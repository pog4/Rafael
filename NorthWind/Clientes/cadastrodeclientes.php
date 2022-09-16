<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
<h1 id="tit">Cadastro de Fornecedor</h1>
<?php
    if (isset($_POST['gravar'])) {
        $sql = "INSERT into clientes (IDCliente,NomeCompanhia,NomeContato,TituloContato,Endereco, Cidade, CEP, Pais, telefone)
        values (:id,:companhia,:contato,:titulo,:endereco,:cidade,:CEP,:pais, :telefone)";
        $consulta = $conn->prepare($sql);
        $consulta->execute(
        array("id" => $_POST['id'],
        "companhia" => $_POST['companhia'],
        "contato" => $_POST['contato'],
        "titulo" => $_POST['titulo'],
        "endereco" => $_POST['endereco'],
        "cidade" => $_POST['cidade'],
        "pais" => $_POST['pais'],
        "CEP" => $_POST['CEP'],
        "telefone" => $_POST['telefone'])
    );
}
?>
<form method="post">
    <div id="aaa">
    <div class="mb-3">
        <label  class="form-label">IDCliente</label>
        <input type="text" maxlength="5" class="form-control" name="id">
  </div>

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
    <button type="submit" name="gravar"class="btn btn-success">Enviar</button>

</div>
</form>