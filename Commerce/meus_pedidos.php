

<?php
$sql_pedidos = 'select * from vendas where usuario_id = :usuario_id';
$sql_pedidos = $conn->prepare($sql_pedidos);
$sql_pedidos->execute(['usuario_id' => $_SESSION['usuario']['id']]);

while ($linha = $sql_pedidos->fetch()) {

    

    $sql_itens = "
        select * 
        from vendas_produtos v
        inner join produtos p on (p.id = v.produto_id)
        where v.venda_id = :venda_id
    ";
    $sql_itens = $conn->prepare($sql_itens);
    $sql_itens->execute(['venda_id' => $linha['id']]);
    ?>
<table class="table meio daw">
    <thead>
        <?php echo " <tr>  <th colspan='4'><h5>#{$linha['id']} - {$linha['data_venda']}</h5></h3>   </th>   <tr>"; ?>
        <tr>  <th colspan="4"> <h3>Meus Pedidos: <?php echo $_SESSION['usuario']['login']; ?></h3>   </th>   <tr>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Produto ID</th>
            <th scope="col">Descricao</th>
            <th scope="col">Valor</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        while ($item = $sql_itens->fetch()) {
            $total += $item['valor']; ?>
        <tr>
            <th scope="row"><?php echo $item['id']; ?></th>
            <td><?php echo $item['produto_id']; ?></td>
            <td><?php echo $item['descricaop']; ?></td>
            <td><?php echo $item['valor']; ?></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <th colspan="4">
                Total: <?php echo $total; ?>
            </th>
        </tr>
    </tbody>
</table>
<br>
<?php
}


?>