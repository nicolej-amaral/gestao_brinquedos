<?php

include "../infra/conexao.php";

$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$preço = $_POST["preco"];
$faixa_etaria = $_POST["faixaEtaria"];
$quantidade = $_POST["quantidade"];

$sql = "INSERT INTO brinquedos (nome, categoria, preco, faixaEtaria, quantidade) VALUES (?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssi", $nome, $categoria, $preço, $faixa_etaria, $quantidade);
$stmt->execute();

header("Location: ../index.php");

?> 