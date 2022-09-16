<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 <link rel="stylesheet" href="css.css">
 <div id="top"></div>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Contato</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <?php
      include_once('lib/conexao.php');

    $sql = "SELECT * from categorias";

        $consulta = $conn->prepare($sql);
        $resultado = $consulta->execute();

        ?>

    <div class="row">
      <div class="meio esq">

      <ul id="cat">Categorias</ul> <br>

            <?php
                while ($linha = $consulta->fetch()) {
                  ?>
                  <?php echo "<a href=\"?pagina=categoria&id={$linha['id']}\">"?><?php echo $linha['descricao']; ?> </a> 
            <?php
                }
            ?>       

      </div>
      <?php

    include_once('lib/conexao.php');
    $sql = "SELECT a.id, a.descricaop, a.caracteristicas, b.descricao, a.valor, a.estoque, a.imagem, a.resumo 
    from produtos a
    inner join categorias b on (a.categoria_id = b.id)
    where a.id = :id";

    $consulta = $conn->prepare($sql);
    $consulta->execute(array("id" => $_GET['id']));

    $linha = $consulta->fetch();

?>
<table class='table meio prod container'>

        <thead>
        <tr>
        <th class="table-dark" scope='col'></th>
        <th class="table-dark" scope='col'>Informações</th>
        </tr>
        
        <tr>
        <td colspan="2"><img class="img" src="<?php echo $linha['imagem']; ?>"></td>
        </tr>

        <tr>
        <td>ID</td>
        <td ><?php echo $linha['id']; ?> </td>
        </tr>

        <tr>
        <td>Descrição</td>
        <td ><?php echo $linha['descricaop']; ?> </td>
        </tr>

        <tr>
        <td>Características</td>
        <td><?php echo $linha['caracteristicas']; ?></td>
        </tr>

        <tr>
        <td>Categoria</td>
        <td><?php echo $linha['descricao']; ?></td>
        </tr>

        <tr>
        <td>Valor</td>
        <td><?php echo $linha['valor']; ?></td>
        </tr>

        <tr>
        <td>Estoque</td>
        <td><?php echo $linha['estoque']; ?></td>
        </tr>

        <tr>
        <td>Resumo</td>
        <td><?php echo $linha['resumo']; ?></td>
        </tr>

        <tr>
        <td colspan="2"><input type="button" name="adicionar" class="btn btn-primary" value="adicionar carrinho"></td>
        </tr>
        

    </thead>
    <tbody>

    