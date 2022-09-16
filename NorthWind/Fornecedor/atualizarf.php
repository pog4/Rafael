<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
<h1 id="tit">Atualizar Produtos</h1>
<?php
    if (isset($_POST['atualizar'])) {
        $sql = "UPDATE fornecedores
        set NomeCompanhia = :companhia
        , NomeContato = :contato
        , TituloContato = :titulo
        , Endereco = :endereco
        , Cidade = :cidade
        , Pais = :pais
        , Telefone = :telefone
        where IDFornecedor = :IDFornecedor";

    $atualizar = $conn->prepare($sql);
    $atualizar->execute(array(
        "companhia" => $_POST['companhia'],
        "contato" => $_POST['contato'],
        "titulo" => $_POST['titulo'],
        "endereco" => $_POST['endereco'],
        "cidade" => $_POST['cidade'],
        "pais" => $_POST['pais'],
        "telefone" => $_POST['telefone'],
        "IDFornecedor" => $_GET['IDFornecedor']
    ));
    echo "Atualizado com sucesso!";
}

    $sql = "SELECT p.IDFornecedor, p.NomeCompanhia, p.NomeContato, p.TituloContato, p.Endereco, p.Cidade, p.Pais, p.Telefone
    FROM fornecedores p
     where IDFornecedor = :IDFornecedor";
    $fornecedor = $conn->prepare($sql);
    $fornecedor ->execute(array("IDFornecedor" => $_GET['IDFornecedor']));

    $linha = $fornecedor ->fetch();
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
    <button type="submit" name="atualizar"class="btn btn-success">Enviar</button>

</div>
</form>