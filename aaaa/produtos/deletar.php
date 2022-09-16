<link rel="stylesheet" href="css.css">
<?php
    if (isset($_POST['deletar'])){
        $sql = "DELETE from produtos where codigo = :codigo";
        $parse = $conn->prepare($sql);
        $parse->execute(array("codigo" => $_GET['codigo']));
        header("Location: ?pagina=p_lista");
    }
?>

<h1 id="tit">Deletar Produto</h1>
<br>

<?php
    $sql = "SELECT p.codigo, p.nome, p.valor, pg.descricao 
    FROM produtos p
    inner join produtos_grupos pg on (p.grupo_id = pg.id)
     where codigo = :codigo";

    $consulta = $conn->prepare($sql);
    $consulta->execute(array("codigo" => $_GET['codigo']));

    $linha = $consulta->fetch();

    
?>
<table class='table'>
        <thead>
        <tr>
        <th class="table-dark" scope='col'>código</th>
        <th class="table-dark" scope='col'>nome</th>
        <th class="table-dark" scope='col'>valor</th>
        <th class="table-dark" scope='col'>grupo</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $linha['codigo']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td><?php echo $linha['valor']; ?></td>
            <td><?php echo $linha['descricao']; ?></td>
        </tr>
        </tbody>
    </table>

<form method="post"  >
    <input type="hidden" name="codigo">
    <input class="btn btn-danger" type="submit" name="deletar" value="Deletar">
</form>


