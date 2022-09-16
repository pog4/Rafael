<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
<h1 id="tit">Cadastro de Produtos</h1>
<?php
    if (isset($_POST['gravar'])) {
        $sql = "INSERT into produtos(NomeProduto,IDFornecedor,IDCategoria,QuantidadePorUnidade, PrecoUnitario, UnidadesEmEstoque)
        values (:nome,:fornecedor,:categoria,:qpu,:preco,:unidades)";    
        $consulta = $conn->prepare($sql);
        $consulta->execute(
        array("nome" => $_POST['nome'],
        "fornecedor" => $_POST['fornecedor'],
        "categoria" => $_POST['categoria'],
        "qpu" => $_POST['qpu'],
        "preco" => $_POST['preco'],
        "unidades" => $_POST['unidades'])
    );
}
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
        <input type="text" class="form-control" name="qpu">
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
    <button type="submit" name="gravar"class="btn btn-success">Enviar</button>

</div>
</form>