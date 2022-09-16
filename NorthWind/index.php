<!--<div id="div" class="text-bg-primary"><h1>NorthWind</h1></div>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php

session_start();

if (isset($_GET['pagina'])) {
    if ($_GET['pagina']=='logout') {
        session_destroy();
        session_start();
    }
}

include_once('lib/conexao.php');
include_once('lib/sql.php');
include_once('lib/autenticar.php');

//error_reporting(0);

if (isset($_SESSION['autenticado'])){
    if (isset($_GET['pagina'])) {
        $sql = "SELECT *
                from paginas
                where id = :id";
        $consulta = $conn->prepare($sql);
        $resultado = $consulta->execute(array('id' => $_GET['pagina']));
        $linha = $consulta->fetch();
        if ($consulta->rowCount() > 0){
            
            include "menu.php";
            include $linha['src'];
    
        } else{
    
            include "404.php";
    
            }
        } else{
    
            include "home.php";
    
    }
} else {
    include "login.php";
}


/*if(isset($_GET['pagina']) & $_GET['pagina']=='p_fornecedor'){
    include ("Fornecedor/fornecedor.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_cadastro'){
    include ("produtos/cadastro.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_produtos'){
    include ("produtos/produtos.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_delete'){
    include ("produtos/deletar.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_atualizar'){
    include ("produtos/atualizar.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_cadastrodeprodutos'){
    include ("produtos/cadastro_produtos.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_cadastrodefornecedor'){
    include ("Fornecedor/cadastrodefornecedor.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_deletarf'){
    include ("Fornecedor/deletarf.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_atualizarf'){
    include ("Fornecedor/atualizarf.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_atualizarc'){
    include ("Clientes/atualizarc.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_deletarc'){
    include ("Clientes/deletarc.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_cadastrodeclientes'){
    include ("Clientes/cadastrodeclientes.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_clientes'){
    include ("Clientes/clientes.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_atualizarfu'){
    include ("Funcionarios/atualizarfu.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_deletarfu'){
    include ("Funcionarios/deletarfu.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_cadastrodefuncionarios'){
    include ("Funcionarios/cadastrodefuncionarios.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_funcionarios'){
    include ("Funcionarios/funcionarios.php");
}*/
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
</head>
<body>
    
</body>
</html>


