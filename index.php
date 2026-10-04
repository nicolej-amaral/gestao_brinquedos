<?php

include "infra/conexao.php";

$brinquedos = mysqli_query($conexao, "SELECT * FROM brinquedos");

$resultadoPesquisa = null;

if (isset($_GET["pesquisa"]) && $_GET["pesquisa"] != "") {

    $pesquisa = $_GET["pesquisa"];

    $sql = "SELECT usuarios.nome AS usuario,
                   pratos.id,
                   pratos.nome AS prato,
                   pratos.descricao,
                   pratos.preco
            FROM usuarios
            INNER JOIN pratos
            ON usuarios.id = pratos.usuario_id
            WHERE usuarios.nome LIKE '%$pesquisa%'";

    $resultadoPesquisa = mysqli_query($conexao, $sql);
}


$sqlPratos = "SELECT * FROM pratos";

$pratos = mysqli_query($conexao, $sqlPratos);

?>

<!DOCTYPE html>

<html class="html1" lang="pt-br">
<body>
<div class="container1">
<h2>Cadastrar usuário</h2>
<link rel="stylesheet" href="style/style.css">
<form action="public/cadastro_usu.php" method="POST">

    <label>Nome:</label>

    <input
        type="text"
        name="nome"
        required
    >

    <br><br>

    <label>Email:</label>

    <input
        type="email"
        name="email"
        required
    >

    <br><br>

    <button div= "botao" type="submit">
        Cadastrar usuário
    </button>

</form>
</div>



<hr>


<div class="container2">
<h2>Cadastrar prato</h2>

<form action="public/cadastrar.php" method="POST">

    <label>Nome do prato:</label>

    <input
        type="text"
        name="titulo"
        required
    >

    <br><br>


    <label>Descrição:</label>

    <input
        type="text"
        name="autor"
        required
    >

    <br><br>


    <label>Preço:</label>

    <input
        type="number"
        name="ano"
        step="0.01"
        required
    >

    <br><br>


    <label>Usuário:</label>

    <select name="usuario_id" required>

        <option value="">
            Selecione o usuário
        </option>

        <?php while ($usuario = mysqli_fetch_assoc($usuarios)) { ?>

            <option value="<?php echo $usuario["id"]; ?>">

                <?php echo $usuario["nome"]; ?>

            </option>

        <?php } ?>

    </select>

    <br><br>

    <button div= "botao" type="submit">
        Cadastrar prato
    </button>

</form>
</div>




<hr>


<div class="container3">
<h2>Pesquisar pratos por usuário</h2>

<form method="GET">

    <input
        type="text"
        name="pesquisa"
        placeholder="Digite o nome do usuário"
        required
    >

    <button div= "botao" type="submit">
        Pesquisar
    </button>

</form>


<?php if ($resultadoPesquisa != null) { ?>

    <h2>Pratos encontrados</h2>

    <table border="1" cellpadding="10">

        <tr>

            <th>Usuário</th>
            <th>Prato</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>

        </tr>


        <?php while ($prato = mysqli_fetch_assoc($resultadoPesquisa)) { ?>

            <tr>

                <td>
                    <?php echo $prato["usuario"]; ?>
                </td>

                <td>
                    <?php echo $prato["prato"]; ?>
                </td>

                <td>
                    <?php echo $prato["descricao"]; ?>
                </td>

                <td>
                    R$ <?php echo $prato["preco"]; ?>
                </td>

                <td>

                    <a href="public/editar.php?id=<?php echo $prato["id"]; ?>">
                        Editar
                    </a>

                    |

                    <a
                        href="public/excluir.php?id=<?php echo $prato["id"]; ?>"
                        onclick="return confirm('Deseja excluir este prato?')"
                    >
                        Excluir
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

<?php } ?>
</div>

<hr>
<div class="container4">
<h2 class="titulo">Todos os pratos</h2>

<table class="table" border="1" cellpadding="10">

    <tr>

        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Ações</th>

    </tr>


    <?php while ($prato = mysqli_fetch_assoc($pratos)) { ?>

        <tr>

            <td>
                <?php echo $prato["id"]; ?>
            </td>

            <td>
                <?php echo $prato["nome"]; ?>
            </td>

            <td>
                <?php echo $prato["descricao"]; ?>
            </td>

            <td>
                R$ <?php echo $prato["preco"]; ?>
            </td>

            <td>

                <a href="public/editar.php?id=<?php echo $prato["id"]; ?>">
                    Editar
                </a>

                |

                <a
                    href="public/excluir.php?id=<?php echo $prato["id"]; ?>"
                    onclick="return confirm('Deseja excluir este prato?')"
                >
                    Excluir
                </a>

            </td>

        </tr>

    <?php } ?>

</table>
</div>
</body>

</html>