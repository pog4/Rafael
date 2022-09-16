<?php
    $username = 'root';
    $password = '';

    try
    {
        $conn = new PDO('mysql:host=localhost;dbname=aula', $username, $password);
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMOD_EXCEPTION);
    } 
    catch(PDOException $e)
    {
        echo 'ERROR: ' . $e->getMessage();
    }

    if(isset($_GET['Listartodos'])){
        $data = $conn->query('SELECT * FROM pessoa');

        foreach($data as $row)
        {
            print $row;
        }
    }

    if(isset($_GET['Listar1'])){
        $stmt = $conn->prepare('SELECT * FROM pessoa WHERE id = :id');
        $stmt->execute(array('id' -> $_GET['listar1']));

        while($row = $stmt->fetch())
        {
            print_r($row);
        }
    }

    if(isset($_GET['gravar']))
    {
        $stmt = $conn->prepare('INSERT INTO pessoa(nome) values (:nome)');
        $stmt->execute(array('nome' => $_GET['nome']));
    }

    if(isset($_GET['atualizar']))
    {
        $stmt = $conn->prepare('UPDATE pessoa set nome = :nome where id = :id');
        $stmt->execute(array('id' => $_GET['id'], 'nome' => $_GET['nome']));
    }

    if(isset($_GET['remover']))
    {
        $stmt = $conn->prepare('DELETE from pessoa where codigo = :codigo');
        $stmt->execute(array('codigo' => $_GET['codigo']));
    }
?>