<?php
   define("salariominimo",1212);
   $erro = false;
   $msg = "";

   function receba($valor) {
    if ($valor == "") {
        return true;
      } else {
        return false;
      }
   }
   
   if (receba($_POST["nome"])) {
      $msg = "<p>Erro: Nome não informado</p>";
      $erro = true;
   }
   
   if (receba($_POST["endereco"])) {
      $msg = $msg."<p>Erro: Endereço não informado</p>";
      $erro = true;
   }

   if (!$erro) {
      printf("<strong>%s</strong> Recebe o equivalente a <strong>%1.2f salários mínimos</strong>. <br>Mora no endereço:<br> <strong><pre>%s</pre></strong><br>",$_POST["nome"],($_POST["salario"] / salariominimo),$_POST["endereco"]);
   } else {
      echo $msg;
   }
?>