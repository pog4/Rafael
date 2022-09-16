<?php

include "lib/conexao.php";

        $sql ="INSERT into carros(carro,modelo,placa,motorista,local_origem,destino,kilometragem,gasolina_gasta,gasolina_custo) 
                    values (:carro,:modelo,:placa,:motorista,:origem,:destino,:kilometragem,:gasto,:preco)";

$valores = array("carro"  => $_POST['carro'],
                     "modelo"   => $_POST['modelo'],
                     "placa"   => $_POST['placa'],
                     "motorista" => $_POST['motorista'],
                     "origem" => $_POST['origem'],
                     "destino" => $_POST['destino'],
                     "kilometragem" => $_POST['kilometragem'],
                     "gasto" => $_POST['gasto'],
                     "preco" => $_POST['preco']);
       

                        $consulta = $conn->prepare($sql);

                        $consulta->execute($valores);
