<?php
if (isset($_SESSION['sacola'])) { ?>

<table class="table table-striped meio daw">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descricao</th>
            <th scope="col">Valor</th>
            <th scope="col">Ações</th>
            <th scope="col">#</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $chaves = array_keys($_SESSION['sacola']);
        foreach ($chaves as $item) {

            //select produto
            $sql_produto = 'SELECT * from produtos where id = :id';
            $produto = $conn->prepare($sql_produto);
            $produto->execute(['id' => $_SESSION['sacola'][$item]]);
            $produto = $produto->fetch();
            ?>
        <tr>
            <th scope="row"><?php echo $produto['id']; ?></th>
            <td><?php echo $produto['descricaop']; ?></td>
            <td><?php echo $produto['valor']; ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="produto" value="<?php echo $item; ?>">
                    <input class="btn btn-danger" type="submit" name="remover_sacola" value="Remover">
                </form>
            </td>
        </tr>
        <?php
        }
        ?>
            <td><a class="btn btn-primary" href="?pagina=realizar_pedido">Realizar pedido</a>
            <form method="post">
    <input class="btn btn-danger" type="submit" name="limpar_sacola" value="Limpar sacola">
            </form>
</td>
    </tbody>
</table>


<?php } else {echo '<h3 class="meio daw">Nenhum produto adicinado a sacola!';}
?>