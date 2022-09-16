
<?php
session_start();
error_reporting(0);

include_once('lib/conexao.php');
include_once('lib/sql.php');

include "menu.php";

if(isset($_GET['pagina']) & $_GET['pagina']=='p_lista'){
    include ("produtos/listagem.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_cadastro'){
    include ("produtos/cadastro.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_delete'){
    include ("produtos/deletar.php");
}
if(isset($_GET['pagina']) & $_GET['pagina']=='p_atualizar'){
    include ("produtos/atualizar.php");
}
?>