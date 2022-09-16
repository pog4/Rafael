<?php
    $sql = "SELECT * from produtos
    where id = :id";

    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();

    