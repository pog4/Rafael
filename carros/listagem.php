<?php

include("lib/conexao.php");

$sql = "SELECT * FROM carros";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();

    $texto = "";

    foreach ($consulta as $linha) {
        $texto = $texto."<br> <div class='container'> ID: " . $linha['id'] . "<br>".
        "Carro: " . $linha['carro'] . "<br>".
        "Modelo: " . $linha['modelo'] . "<br>".
        "Placa: " . $linha['placa'] . "<br>".
        "Motorista: " . $linha['motorista'] . "<br>".
        "Local_origem: " . $linha['local_origem'] . "<br>".
        "Destino: " . $linha['destino'] . "<br>".
        "Kilometragem: " . $linha['kilometragem'] . "<br>".
        "Litros de Combustível gastos: " . $linha['gasolina_gasta'] . "<br>".
        "Valor do Compustível atual: " . $linha['gasolina_custo'] . "<br>".
        "Valor gasto por kilometro percorrido: ".$linha['kilometragem']/$linha['gasolina_gasta'].
        " reais <br>
        Valor total da viagem: ".$linha['gasolina_gasta']*$linha['gasolina_custo']." reais </div> <br> <br>";;
        
    }

    echo $texto;
?>
