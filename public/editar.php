<?php

include "../infra/conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM brinquedos WHERE id = $id";

$resultado = mysqli_query($conexao, $sql);

$prato = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <div class="container5">
    <title>Editar Brinquedo</title>
   <link rel="stylesheet" href="..style/style.css">
</head>

<body>

<h1>Editar Brinquedo</h1>

<form action="atualizar.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $brinquedo["id"]; ?>">

    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $brinquedo["nome"]; ?>">

    <br>

    <label>Categoria:</label>
    <input type="text" name="categoria" value="<?php echo $brinquedo["categoria"]; ?>">

    <br>

    <label>Preço:</label>
    <input type="number" name="preco" step="0.01" value="<?php echo $brinquedo["preco"]; ?>">

    <br>
     <label>Faixa etária:</label>
    <input type="int" name="" step="0.01" value="<?php echo $brinquedo["faixaEtaria"]; ?>">

    <br>

    <button type="submit">Salvar</button>

</form>

</body>
</div>
</html>