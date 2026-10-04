<?php include "infra/conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de brinquedos</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
<header>
    <h1>Gestão de brinquedos</h1>
</header>

<main>
    <h2>Adicione um novo brinquedo!</h2>

    <form action="public/cadastrar_brinquedo.php" method="POST">
        <label for="nome">Nome do brinquedo:</label>
        <input type="text" id="nome" name="nome" required>
        <br>

        <label for="faixa">Faixa etária:</label>
        <input type="text" id="faixaEtaria" name="faixaEtaria" required>
        <br>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" required>
        <br>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" min="0" id="preco" name="preco" required>
        <br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" step="1" min="0" id="quantidade" name="quantidade" required>
        <br>

        <button type="submit">Cadastrar brinquedo</button>
    </form>

    <p><a href="public/listar.php">Ver brinquedos cadastrados</a></p>
</main>

<footer></footer>
</body>
</html>