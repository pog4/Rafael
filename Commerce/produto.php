<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 <link rel="stylesheet" href="css.css">
<?php

include_once "lib/conexao.php";

$sql_produto = 'SELECT p.id, p.descricaop, p.caracteristicas, pg.descricao, p.valor, p.estoque, p.resumo, p.imagem 
from produtos p
inner join categorias pg on (p.categoria_id = pg.id)
where p.id = :id';
$produto = $conn->prepare($sql_produto);
$produto->execute(['id' => $_GET['id']]);
$linha = $produto->fetch();
?>
<h1><?php echo $linha['descricaop']; ?></h1>

<table class='table meio prod container'>

        <thead>
        <tr>
        <th class="table-dark" scope='col'></th>
        <th class="table-dark" scope='col'>Informações</th>
        </tr>
        
        <tr>
        <td colspan="2"><img class="img" src=" <?php echo $linha['imagem']; ?> "></td>
        </tr>

        <tr>
        <td>ID</td>
        <td ><?php echo $linha['id']; ?> </td>
        </tr>

        <tr>
        <td>Descrição</td>
        <td ><?php echo $linha['descricaop']; ?> </td>
        </tr>

        <tr>
        <td>Características</td>
        <td><?php echo $linha['caracteristicas']; ?></td>
        </tr>

        <tr>
        <td>Categoria</td>
        <td><?php echo $linha['descricao']; ?></td>
        </tr>

        <tr>
        <td>Valor</td>
        <td><?php echo $linha['valor']; ?></td>
        </tr>

        <tr>
        <td>Estoque</td>
        <td><?php echo $linha['estoque']; ?></td>
        </tr>

        <tr>
        <td>Resumo</td>
        <td><?php echo $linha['resumo']; ?></td>
        </tr>

        <tr>
        <td colspan="2"><input type="submit" name="adicionar" class="btn btn-primary" value="adicionar carrinho"></td>
        </tr>
        

    </thead>
    <tbody>

    