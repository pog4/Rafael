<?php if (isset($_GET['categoria'])) {
    $sql_produtos_destaque = '
       SELECT p.id, p.descricaop, p.valor, p.resumo, p.imagem
        FROM produtos p
        WHERE p.categoria_id in (select id from categorias where categoria_pai = :categoria_id or id = :categoria_id)
        ORDER BY RAND()
        LIMIT 4
    ';
    $sql_produtos_destaque = $conn->prepare($sql_produtos_destaque);
    $sql_produtos_destaque->execute(['categoria_id' => $_GET['categoria']]);
} else {
    $sql_produtos_destaque = '
        SELECT id, descricaop, valor, resumo, imagem
        FROM produtos
        ORDER BY RAND()
        LIMIT 4;
    ';
    $sql_produtos_destaque = $conn->prepare($sql_produtos_destaque);
    $sql_produtos_destaque->execute();
} ?>

<table class="meio daw">
<?php while ($produto = $sql_produtos_destaque->fetch()) { ?>
    <td> 
    <div class="card" style="width: 18rem;">
        <img src="<?php echo $produto['imagem']; ?>" class="card-img-top" alt="<?php echo $produto[
    'descricaop'
]; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $produto['descricaop']; ?></h5>
            <p class="card-text"><?php echo $produto['resumo']; ?></p>
            <a href="?pagina=produto&id=<?php echo $produto['id']; ?>" class="btn btn-primary">Saiba mais</a>
        </div>
    </div></td>
    <?php 
        if ($produto = $sql_produtos_destaque->fetch()) {?><td>
            <div class="card" style="width: 18rem;">
        <img src="<?php echo $produto['imagem']; ?>" class="card-img-top" alt="<?php echo $produto[
    'descricaop'
]; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $produto['descricaop']; ?></h5>
            <p class="card-text"><?php echo $produto['resumo']; ?></p>
            <a href="?pagina=produto&id=<?php echo $produto['id']; ?>" class="btn btn-primary">Saiba mais</a>
        </div>
    </div></td>
        <?php }}?>
</table>