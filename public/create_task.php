<?php

include "../includes/db.php";
include "../src/user.php";

$user = new User($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['adicionarTarefa'])) {
        if ($_POST['descricao'] == "" || $_POST['nome_setor'] == "" || $_POST['prioridade'] == "" || $_POST['status'] == "" || $_POST['fk_usuario'] == "") {
            echo "<script>alert('Preencha todos os campos')</script>";
        } else {
            if ($user->criarTarefa($_POST['descricao'], $_POST['nome_setor'], $_POST['prioridade'], $_POST['status'], $_POST['fk_usuario'])) {
                echo "<script>alert('Tarefa inserido com sucesso!')</script>";
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
    <title>Criar Task</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <form method="POST" class="formCreate">
        <h1>Criar Tarefa</h1>
        <input type="text" name="descricao" placeholder="Descrição" required><br>
        <input type="text" name="nome_setor" placeholder="Nome do Setor" required><br>
        <select name="prioridade">
            <option value="" selected>Selecione a Prioridade</option>
            <option value="Baixa">Baixa</option>
            <option value="Média">Média</option>
            <option value="Alta">Alta</option>
        </select><br>
        <select name="status">
            <option value="" selected>Selecione o Status</option>
            <option value="A fazer">A fazer</option>
            <option value="Fazendo">Fazendo</option>
            <option value="Pronto">Pronto</option>
        </select><br>
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
        <button type="submit" name="adicionarTarefa">Enviar</button><br><br>
        <a href="read.php">Listar Registros</a>
    </form>
</body>
</html>