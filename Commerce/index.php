<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<?php

session_start();
//error_reporting(0);

if (isset($_GET['pagina']) && $_GET['pagina'] == 'logout') {
    session_destroy();
    session_start();
    header('Location ?');
}

include_once('lib/conexao.php');
include_once('lib/sql.php');
include_once('lib/autenticar.php');

//limpar sacola
if (isset($_POST['limpar_sacola'])) {
    unset($_SESSION['sacola']);
}
//adicionar a sacola
if (isset($_POST['adicionar_sacola'])) {
    $_SESSION['sacola'][] = $_GET['id'];
}
//remover da sacola
if (isset($_POST['remover_sacola'])) {
    unset($_SESSION['sacola'][$_POST['produto']]);
}

include_once "menu.php";