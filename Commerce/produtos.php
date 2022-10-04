<?php                             //Listagem da listagem

$sql_categoria = 'SELECT * from categorias where id = :id';
$categoria = $conn->prepare($sql_categoria);
$categoria->execute(['id' => $_GET['categoria']]);
$linha_categoria = $categoria->fetch();

if (empty($linha_categoria['categoria_pai'])) {
    include 'produtos_destaque.php';
} else {
     ?>
<table>

    <?php
    $sql_produtos = 'SELECT * from produtos where categoria_id = :id';
    $consulta_produtos = $conn->prepare($sql_produtos);
    $consulta_produtos->execute(['id' => $_GET['categoria']]);

    
    while ($produto = $consulta_produtos->fetch()) { ?><td class="meio daw"> 
    <div class="card" style="width: 18rem;">
        <img src="<?php echo $produto['imagem']; ?>" class="card-img-top" alt="<?php echo $produto[
    'descricaop'
]; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $produto['descricaop']; ?></h5>
            <p class="card-text"><?php echo $produto['resumo']; ?></p>
            <a href="produto.php?pagina=produto&id=<?php echo $produto['id']; ?>" class="btn btn-primary">Detalhes</a>
        </div>
    </div></td>
    <?php 
        if ($produto = $consulta_produtos->fetch()) {?><td class="meio daw">
            <div class="card" style="width: 18rem;">
        <img src="<?php echo $produto['imagem']; ?>" class="card-img-top" alt="<?php echo $produto[
    'descricaop'
]; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $produto['descricaop']; ?></h5>
            <p class="card-text"><?php echo $produto['resumo']; ?></p>
            <a href="produto.php?pagina=produto&id=<?php echo $produto['id']; ?>" class="btn btn-primary">Detalhes</a>
        </div>
    </div></td>
         
    <?php
        }
    ?>
    <?php }
    ?>
</div>
</table>
<?php
} ?>