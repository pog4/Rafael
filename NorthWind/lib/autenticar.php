<?php
if (isset($_POST['autenticar']) &
    !empty($_POST['login']) &
    !empty($_POST['senha'])) {
    $sql = "SELECT *
                from usuarios
                where login = :login
                and senha = md5(:senha)";
        $consulta = $conn->prepare($sql);
        $resultado = $consulta->execute(array('login' => $_POST['login'],
                                              'senha' => $_POST['senha']));

        $usuario = $consulta->fetch();
        
    if ($consulta->rowCount() > 0){
        if ($usuario['login'] == $_POST['login']) {
            $_SESSION['autenticado'] = true;
        }
    }else{
        echo "Usuário encontrado";
    }
}
?>