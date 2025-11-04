<?php

include "../includes/db.php";
include "../src/list.php";

$list = new Lista($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $sql = "UPDATE tarefas SET status = :status WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    if($stmt -> execute()){
        header("refresh: 0");
    } else {
        echo "<script>alert('Erro ao atualizar dados')</script>";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body class="read">
    <nav class="nav">
        <a href="create_user.php">Criar Usuário</a>
        <a href="create_task.php">Criar Tarefa</a>
        <a href="delete.php">Deletar Usuário</a>
    </nav>
    <main class="main_read">
        <section class="tableList">
            <header class="tableTitle">
                <h2>A fazer:</h2>
            </header>
            <?php
            $dados = $list->listarTarefas("A fazer");
            if (count($dados) > 0) {
                foreach ($dados as $dado) {
                    $descricao = htmlspecialchars($dado['descricao']);
                    $prioridade = htmlspecialchars($dado['prioridade']);
                    $id = htmlspecialchars($dado['id']);
                    $status = htmlspecialchars($dado['status']);
                    echo "<div class='tableInfo'>";
                    echo "<p>{$descricao}</p> | <p>Prioridade: {$prioridade}</p> |";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='id' value='{$id}'>";
                    echo "<select name='status' onchange='this.form.submit()'>";
                    echo "<option value='A fazer' " . ($status == 'A fazer' ? 'selected' : '') . ">A fazer</option>";
                    echo "<option value='Fazendo' " . ($status == 'Fazendo' ? 'selected' : '') . ">Fazendo</option>";
                    echo "<option value='Pronto' " . ($status == 'Pronto' ? 'selected' : '') . ">Pronto</option>";
                    echo "</select>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhuma tarefa aqui.</p>";
            }
            ?>
        </section>

        <section class="tableList">
            <header class="tableTitle">
                <h2>Fazendo:</h2>
            </header>
            <?php
            $dados = $list->listarTarefas("Fazendo");
            if (count($dados) > 0) {
                foreach ($dados as $dado) {
                    $descricao = htmlspecialchars($dado['descricao']);
                    $prioridade = htmlspecialchars($dado['prioridade']);
                    $id = htmlspecialchars($dado['id']);
                    $status = htmlspecialchars($dado['status']);
                    echo "<div class='tableInfo'>";
                    echo "<p>{$descricao}</p> | <p>Prioridade: {$prioridade}</p> |";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='id' value='{$id}'>";
                    echo "<select name='status' onchange='this.form.submit()'>";
                    echo "<option value='A fazer' " . ($status == 'A fazer' ? 'selected' : '') . ">A fazer</option>";
                    echo "<option value='Fazendo' " . ($status == 'Fazendo' ? 'selected' : '') . ">Fazendo</option>";
                    echo "<option value='Pronto' " . ($status == 'Pronto' ? 'selected' : '') . ">Pronto</option>";
                    echo "</select>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhuma tarefa aqui.</p>";
            }
            ?>
        </section>

        <section class="tableList">
            <header class="tableTitle">
                <h2>Pronto:</h2>
            </header>
            <?php
            $dados = $list->listarTarefas("Pronto");
            if (count($dados) > 0) {
                foreach ($dados as $dado) {
                    $descricao = htmlspecialchars($dado['descricao']);
                    $prioridade = htmlspecialchars($dado['prioridade']);
                    $id = htmlspecialchars($dado['id']);
                    $status = htmlspecialchars($dado['status']);
                    echo "<div class='tableInfo'>";
                    echo "<p>{$descricao}</p> | <p>Prioridade: {$prioridade}</p> |";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='id' value='{$id}'>";
                    echo "<select name='status' onchange='this.form.submit()'>";
                    echo "<option value='A fazer' " . ($status == 'A fazer' ? 'selected' : '') . ">A fazer</option>";
                    echo "<option value='Fazendo' " . ($status == 'Fazendo' ? 'selected' : '') . ">Fazendo</option>";
                    echo "<option value='Pronto' " . ($status == 'Pronto' ? 'selected' : '') . ">Pronto</option>";
                    echo "</select>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhuma tarefa aqui.</p>";
            }
            ?>
        </section>
    </main>
</body>

</html>