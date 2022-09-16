<?php
$username = 'root';
    $password = '';

    try
    {
        $conn = new PDO('mysql:host=localhost;dbname=carro', $username, $password);
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMOD_EXCEPTION);
    } 
    catch(PDOException $e)
    {
        echo 'ERROR: ' . $e->getMessage();
    }
?>