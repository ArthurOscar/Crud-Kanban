<?php

include "../includes/db.php";
include "../src/user.php";

$user = new User($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['excluirUsuario'])) {
        if ($_POST['fk_usuario'] == "") {
            echo "<script>alert('Escolha um usuário')</script>";
            header("refresh:0");
        } else if (!$user->conferirTarefas($_POST['fk_usuario'])){
            echo "<script>alert('Usuário com tarefas relacionadas.')</script>";
            header("refresh:0");
        } else {
            if ($user->delatarUsuario($_POST['fk_usuario'])) {
                echo "<script>alert('Usuário excluido com sucesso!'); window.location.href='read.php';</script>";
            } else {
                echo "<script>alert('Ocorreu um erro ao excluir o usuário')</script>";
                header("refresh:0;");
            }
        }
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body class="create">
    <form method="POST" class="formCreate">
        <h1>Excluir Usuário:</h1>
        <select name="fk_usuario">
            <option value="" selected>Selecione um Usuário</option>
            <?php
            $dados = $user->mostrarUsuarios();
            if (count($dados) > 0) {
                foreach ($dados as $dado) {
                    $id = htmlspecialchars($dado['id']);
                    $nome = htmlspecialchars($dado['nome']);
                    echo "<option value='{$id}'>{$nome}</option>";
                }
            }
            ?>
        </select><br>
        <button type="submit" name="excluirUsuario">Excluir</button><br><br>
        <a href="read.php">Voltar</a>
    </form>
</body>
</html>