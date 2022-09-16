<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

      
      <!--<li class="nav-item">
          <a class="nav-link" href="?pagina=p_produtos">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pagina=p_fornecedor">Fornecedores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pagina=p_clientes">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pagina=p_funcionarios">Funcionários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pagina=p_cadastrodeprodutos">Cadastro de Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pagina=p_cadastrodefornecedor">Cadastro de fornecedor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pagina=p_cadastrodeclientes">Cadastro de Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pagina=p_cadastrodefuncionarios">Cadastro de Funcionários</a>
        </li>-->
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
<?php
  $sql = "SELECT *
          from paginas";
  $consulta = $conn->prepare($sql);
  $resultado = $consulta->execute();

   while ($linha_menu = $consulta->fetch()){
    echo "<li class='nav-item'>
    <a class='nav-link' href=\"?pagina={$linha_menu['id']}\">{$linha_menu['label']}</a>
    </li>";
   }
?>
    <a class='nav-link' href="?pagina=logout">Sair</a>
      </ul>
    </div>
  </div>
</nav>