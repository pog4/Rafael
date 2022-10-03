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
          <a class="nav-link" href="#">Contato</a>
        </li>
        <li>
        <a class="btn btn-success" href="?pagina=sacola">
    Sacola

    <?php if (isset($_SESSION['sacola'])) {
        echo '(' . count($_SESSION['sacola']) . ')';
    } ?> </a>
        </li>
        <li>
            <?php if (isset($_SESSION['autenticado'])) { ?>
            <a class="btn btn-info" href="?pagina=meus_pedidos">Meus pedidos</a>
            <?php }
            ?>
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

                                                    <!--Categoria-->
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
              
              if($linha['categoria_pai'] != ''){
              echo "<a href=\"?pagina=categoria&id={$linha['id']}\">"?><?php echo $linha['descricao']; ?> </a> 
        <?php
            }else{
              echo "<a id='cat' href=\"?pagina=categoria&categoria_pai={$linha['id']}&id={$linha['id']}\">"?>•⠀<?php echo $linha['descricao']; ?> </a>
              <?php
            }
          }
        ?>       

  </div>



  <div class="meio esp"></div>



  <?php

    if (!isset($_GET['id'])) {
      if (!isset($_GET['pagina'])) {
      $sql = "SELECT * from produtos";

      $consulta = $conn->prepare($sql);
      $resultado = $consulta->execute();

      }elseif (isset($_GET['pagina'])) {
        include "sacola.php";
      }
  ?>
  
<br>                                            <!--categoria pai -->
<?php if ($_GET['categoria_pai']) {
  $pai = $_GET["categoria_pai"];
 ?>
            <table class="meio daw">
            <?php
                    while ($linha = $consulta->fetch()) {
                      
                      if ($linha['categoria_pai'] = $pai or $linha['categoria_pai'] = "") {
                ?> <tr>
                <td>
              <div class="card" style="width: 18rem;">
              <img src="<?php echo $linha['imagem']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $linha['descricaop']; ?></h5>
                <p class="card-text"><?php echo $linha['resumo']; ?></p>
                <?php echo "<a href=\"produto.php?pagina=produto&id={$linha['id']}\" class='btn btn-primary'>VER</a>"  ?>  
              </div>
              </div></td> <td>⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀</td>
              <?php 
                  }if ($linha = $consulta->fetch()) { 
                    if ($linha['categoria_pai'] = $pai or $linha['categoria_pai'] = "") {?>
              <td><div class="card" style="width: 18rem;">
              <img src="<?php echo $linha['imagem']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $linha['descricaop']; ?></h5>
                <p class="card-text"><?php echo $linha['resumo']; ?></p>
                <?php echo "<a href=\"produto.php?pagina=produto&id={$linha['id']}\" class='btn btn-primary'>VER</a>"  ?>
              </div>
              </div></td>
              <br><br>      
              <?php
          }}else{
            echo "<td></td>";
          }
        ?>
      </tr>   

      <?php
          }}else {   
        ?>

        <table class="meio daw">
    <?php
            while ($linha = $consulta->fetch()) {
        ?> <tr>
        <td>
      <div class="card" style="width: 18rem;">
      <img src="<?php echo $linha['imagem']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $linha['descricaop']; ?></h5>
        <p class="card-text"><?php echo $linha['resumo']; ?></p>
        <?php echo "<a href=\"produto.php?pagina=produto&id={$linha['id']}\" class='btn btn-primary'>VER</a>"  ?>  
      </div>
      </div></td> <td>⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀</td>
      <?php 
          if ($linha = $consulta->fetch()) { ?>
      <td><div class="card" style="width: 18rem;">
      <img src="<?php echo $linha['imagem']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $linha['descricaop']; ?></h5>
        <p class="card-text"><?php echo $linha['resumo']; ?></p>
        <?php echo "<a href=\"produto.php?pagina=produto&id={$linha['id']}\" class='btn btn-primary'>VER</a>"  ?>
      </div>
      </div></td>
      <br><br>      
      <?php
          }else{
            echo "<td></td>";
          }
        ?>
      <?php }} ?>

</table>
</div>

  <?php
    }else {
      
      $sql = "SELECT * from produtos where categoria_id = :categoria_id";

    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute(['categoria_id' => $_GET['id']]);
    ?>
    <br>
    <table class="meio daw">
    <?php
            while ($linha = $consulta->fetch()) {
        ?> <tr>
        <td>
      <div class="card" style="width: 18rem;">
      <img src="<?php echo $linha['imagem']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $linha['descricaop']; ?></h5>
        <p class="card-text"><?php echo $linha['resumo']; ?></p>
        <?php echo "<a href=\"produto.php?pagina=produto&id={$linha['id']}\" class='btn btn-primary'>VER</a>"  ?>  
      </div>
      </div></td> <td>⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀</td>
      <?php 
          if ($linha = $consulta->fetch()) { ?>
      <td><div class="card" style="width: 18rem;">
      <img src="<?php echo $linha['imagem']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $linha['descricaop']; ?></h5>
        <p class="card-text"><?php echo $linha['resumo']; ?></p>
        <?php echo "<a href=\"produto.php?pagina=produto&id={$linha['id']}\" class='btn btn-primary'>VER</a>"  ?>
      </div>
      </div></td>
      <br><br>      
      <?php
          }else{
            echo "<td></td>";
          }
        ?>
      </tr>
      <?php } ?>

</table>
</div>

    <?php
    }
    ?>


<div class="rodape"></div>