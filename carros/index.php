
<?php

session_start();

include_once('lib/conexao.php');
include_once('lib/sql.php');


?>
<script language="JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<form class="container" method="post">
    <div class="mb-3">
        Carro
      <input type="text" id="carro" class="form-control" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        Modelo
      <input type="text" id="modelo" class="form-control" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        Placa
      <input type="text" id="placa" class="form-control" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        Motorista
      <input type="text" id="motorista" class="form-control"  aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        Local de origem
      <input type="text" id="origem" class="form-control" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        Destino
      <input type="text" id="destino" class="form-control" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        Kilometragem
      <input type="text" id="kilometragem" class="form-control" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        Litros de gasolina gastos
      <input type="text" id="gasto" class="form-control" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        Preço da gasolina
      <input type="text" id="preco" class="form-control" aria-describedby="emailHelp" >
    </div>

    <input id="cadastra" value="cadastrar" type="button" class="btn btn-primary">
  </form>

      <br>
      <br>
      <br>

      <div class="container">
    <input id="lista" value="lista" type="button" class="btn btn-success" >
    </div>
    
    
    <span name="caixa" id="caixa"></span>


<script language="JavaScript">
  $(document).ready(function(){
  $("#cadastra").click(function(){
    $.post("salvar.php",
    {
      carro: $("#carro").val(),
      modelo: $("#modelo").val(),
      placa: $("#placa").val(),
      motorista: $("#motorista").val(),
      origem: $("#origem").val(),
      destino: $("#destino").val(),
      kilometragem: $("#kilometragem").val(),
      gasto: $("#gasto").val(),
      preco: $("#preco").val()
      
    },
    function(){
      alert("FOI?");
      
    });
  })

  $("#lista").click(function(){
    $.get("listagem.php",
    
    function(texto){
      $("#caixa").html(texto);
    }
    )})
});
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
