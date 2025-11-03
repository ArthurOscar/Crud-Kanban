<?php

include "../includes/db.php";
include "../src/user.php";

$user = new User($conn);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['adicionarUsuario'])) {
        if ($_POST['nome'] == "" || $_POST['email'] == "") {
            echo "<script>alert('Preencha todos os campos de usuário')</script>";
        } else {
            if ($user->criarUsuario($_POST['nome'], $_POST['email'])) {
                echo "<script>alert('Usuário inserido com sucesso!')</script>";
                header("refresh:0;");
            } else {
                echo "<script>alert('Ocorreu um erro, verifique todos os campos.')</script>";
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
    <title>Create User</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <form method="POST" class="formCreate">
        <h1>Criar Usuário</h1>
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <button type="submit" name="adicionarUsuario">Enviar</button><br><br>
        <a href="read.php">Listar Registros</a>
    </form><br>
</body>
</html>