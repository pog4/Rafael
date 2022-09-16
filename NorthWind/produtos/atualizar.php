<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
<h1 id="tit">Atualizar Produtos</h1>
<?php
    if (isset($_POST['atualizar'])) {
        $sql = "UPDATE produtos
        set NomeProduto = :nome,
        IDFornecedor = :fornecedor,
        IDCategoria = :categoria,
        QuantidadePorUnidade = :qpu,
        PrecoUnitario = :preco,
        UnidadesEmEstoque = :unidades
        where IDProduto = :IDProduto";
    
    $atualizar = $conn->prepare($sql);
    $atualizar->execute(array(
        "nome" => $_POST['nome'],
        "fornecedor" => $_POST['fornecedor'],
        "categoria" => $_POST['categoria'],
        "qpu" => $_POST['qpu'],
        "preco" => $_POST['preco'],
        "unidades" => $_POST['unidades'],
        "IDProduto" => $_GET['IDProduto']
    ));
echo "Atualizado com sucesso!";
}

    $sql = "SELECT p.IDProduto, p.NomeProduto, f.NomeCompanhia, pg.NomeCategoria, p.QuantidadePorUnidade, p.PrecoUnitario, p.UnidadesEmEstoque
    FROM produtos p
    inner join categorias pg on (p.IDCategoria = pg.IDCategoria)
    inner join fornecedores f on (p.IDFornecedor = f.IDFornecedor)
     where IDProduto = :IDProduto";
    $produto = $conn->prepare($sql);
    $produto ->execute(array("IDProduto" => $_GET['IDProduto']));

    $linha = $produto ->fetch();
?>
<form method="post">
    <div id="aaa">
    <div class="mb-3">
        <label  class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome">
  </div>

  <label  class="form-label">fornecedor</label>
    <select name="fornecedor" class="form-select">
        <?php
            $sql = "SELECT * from fornecedores";
            $consulta = $conn->prepare($sql);
            $consulta->execute();
            while($linha = $consulta->fetch()){
                echo "<option value=\"{$linha['IDFornecedor']}\">{$linha['NomeCompanhia']}</option>";
            }
        ?>
    </select>

    <label  class="form-label">categoria</label>
    <select name="categoria" class="form-select">
        <?php
            $sql = "SELECT * from categoriaS";
            $consulta = $conn->prepare($sql);
            $consulta->execute();
            while($linha = $consulta->fetch()){
                echo "<option value=\"{$linha['IDCategoria']}\">{$linha['NomeCategoria']}</option>";
            }
        ?>
    </select>


    <div class="mb-3">
        <label  class="form-label">Quantidade Por Unidade</label>
        <input type="text" class="form-control" name="qpu" value="">
  </div>

  <div class="mb-3">
        <label  class="form-label">Preço Unitário</label>
        <input type="text" class="form-control" name="preco">
  </div>

  <div class="mb-3">
        <label  class="form-label">Unidade Em Estoque</label>
        <input type="text" class="form-control" name="unidades">
  </div>

            <br>
    <button type="submit" name="atualizar"class="btn btn-success">Atualizar</button>

</div>
</form>