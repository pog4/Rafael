<h1 id="tit">Cadastro de Produtos</h1>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
<?php
    if (isset($_POST['gravar'])) {
        $sql = "INSERT into produtos(nome,valor,grupo_id)
        values (:nome,:valor,:grupo_id)";    
        $consulta = $conn->prepare($sql);
        $consulta->execute(
        array("nome" => $_POST['nome_produto'],
        "valor" => $_POST['valor_produto'],
        "grupo_id" => $_POST['grupo_produto'])
    );
}
?>
<form method="post">
    <div id="aaa">
    <div class="mb-3">
        <label  class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome_produto">
  </div>
  <div class="mb-3">
    <label  class="form-label">Valor</label>
    <input type="text" class="form-control" name="valor_produto">
  </div>
  <label  class="form-label">Grupo</label>
    <select name="grupo_produto" class="form-select">
        <?php
            $sql = "SELECT * from produtos_grupos";
            $consulta = $conn->prepare($sql);
            $consulta->execute();
            while($linha = $consulta->fetch()){
                echo "<option value=\"{$linha['id']}\">{$linha['descricao']}</option>";
            }
        ?>
    </select>
            <br>
    <button type="submit" name="gravar"class="btn btn-success">Enviar</button>

</div>
</form>