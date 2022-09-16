<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
</head>
<body>
    
 <form>

    Nome:     <input type="text" id="nome" name="nome"> <br>
    Salário:  <input type="text" id="salario" name="salario"> <br>
    Endereço: <br><textarea type="text" id="endereco" name="endereco" cols="30" rows="10"></textarea> <br> <br>

    <input type="button" name="enviar" id="enviar" value="Enviar">

 </form>

<div id="msg"></div>
<br> <br>
<div id="caixa"></div>

<script language="JavaScript" src="js.js"></script>
 </body>
</html>