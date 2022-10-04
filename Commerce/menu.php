<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 <link rel="stylesheet" href="css.css">
 <?php include_once "header.php"; ?>
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
          <a class="btn btn-success" href="?pagina=sacola">
        Sacola

        <?php if (isset($_SESSION['sacola'])) {
            echo '(' . count($_SESSION['sacola']) . ')';
        } ?> </a>
      </form>
    </div>
  </div>
</nav>

                                                    <!--Categoria-->

<div class="row">

<?php
  include_once('lib/conexao.php');

  $sql_categorias = 'SELECT * from categorias order by id';
  $sql_prepara = $conn->prepare($sql_categorias);
  $sql_prepara->execute();
  ?>
    <div class='meio esq'>
      <ul id="cat">Categorias</ul>
<?php
  while ($categoria = $sql_prepara->fetch()) {
      if (!empty($categoria['categoria_pai'])) {
          $identacao = '';
      } else {
          $identacao = '•⠀&nbsp';
      }
      echo "<a href=\"?pagina=produtos&categoria={$categoria['id']}\" class=\"btn btn-link\">{$identacao}{$categoria['descricao']}</a>";
  }
  ?>
  </div>



  <div class="meio esp"></div> <!--separação da listagem-->


  
  <?php                             //Listagem da listagem

$sql_categoria = 'SELECT * from categorias where id = :id';
$categoria = $conn->prepare($sql_categoria);
$categoria->execute(['id' => $_GET['categoria']]);
$linha_categoria = $categoria->fetch();

if (empty($linha_categoria['categoria_pai'])) {
    include 'produtos_destaque.php';
} else {
     ?>

<div class="row meio prod">
    <?php
    $sql_produtos = 'SELECT * from produtos where categoria_id = :id';
    $consulta_produtos = $conn->prepare($sql_produtos);
    $consulta_produtos->execute(['id' => $_GET['categoria']]);

    while ($produto = $consulta_produtos->fetch()) { ?>
    <div class="card" style="width: 18rem;">
        <img src="<?php echo $produto['imagem']; ?>" class="card-img-top" alt="<?php echo $produto[
    'descricaop'
]; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $produto['descricaop']; ?></h5>
            <p class="card-text"><?php echo $produto['resumo']; ?></p>
            <a href="produto.php?pagina=produto&id=<?php echo $produto['id']; ?>" class="btn btn-primary">Detalhes</a>
        </div>
    </div>
    <?php }
    ?>
</div>

<?php
} ?>
    
</div>
<div class="rodape"></div>