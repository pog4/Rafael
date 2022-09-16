<h1 id="tit">Atualizar Produto</h1>
<br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
<?php
    if (isset($_POST['atualizar'])) {
        $sql = "UPDATE produtos
        set nome = :nome
        , valor = :valor
        , grupo_id = :grupo
        where codigo = :codigo";
    
    $atualizar = $conn->prepare($sql);
    $atualizar->execute(array(
                            "nome" => $_POST['nome'],
                            "valor" => $_POST['valor'],
                            "grupo" => $_POST['grupo'],
                            "codigo" => $_GET['codigo'],
    ));
    echo "Atualizado com sucesso!";
}

    $sql = "SELECT p.codigo, p.nome, p.valor, pg.descricao 
    FROM produtos p
    inner join produtos_grupos pg on (p.grupo_id = pg.id)
     where codigo = :codigo";
    $produto = $conn->prepare($sql);
    $produto ->execute(array("codigo" => $_GET['codigo']));

    $linha = $produto ->fetch();
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


<form method="post">
    <div id="aaa">
    <label  class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" value="<?php echo $linha['nome']; ?>">
    
    
    <label  class="form-label">Valor</label>
    <input type="text" name="valor" class="form-control" value="<?php echo $linha['valor']; ?>">
    
    <label  class="form-label">Grupo</label>
    <select name="grupo" class="form-select">
        <?php
            $sql = "SELECT * from produtos_grupos";
            $grupos = $conn->prepare($sql);
            $grupos->execute();
            while($grupo = $grupos->fetch()){
                if ($grupo['id'] == $linha['grupo_id']) {
                    echo "<option value=\"{$grupo['id']}\" selected>{$grupo['descricao']}</option>";
                }else{
                    echo "<option value=\"{$grupo['id']}\">{$grupo['descricao']}</option>";
                }
                
            }
        ?>
    </select>

    <br> 
    <input type="submit" name="atualizar" class="btn btn-success" value="Atualizar">
    </div>
    </form>