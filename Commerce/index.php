<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<?php

session_start();

include_once('lib/conexao.php');
include_once('lib/sql.php');
//include_once('lib/autenticar.php');
include_once "menu.php";


if(isset($_GET['pagina']) & $_GET['pagina']=='home'){
    include ("home.php");
}