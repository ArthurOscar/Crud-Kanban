<?php

class User {
    private $conn;

    public function __construct($db){
        $this -> conn = $db;
    }

    public function criarUsuario($nome, $email){
        $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bindParam(":nome", $nome);
        $stmt -> bindParam(":email", $email);
        return $stmt->execute();
    }

    public function criarTarefa($descricao, $nome_setor, $prioridade, $status, $fk_usuario){
        $sql = "INSERT INTO tarefas (descricao, nome_setor, prioridade, status, fk_usuario) VALUES (:descricao, :nome_setor, :prioridade, :status, :fk_usuario)";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bindParam(":descricao", $descricao);
        $stmt -> bindParam(":nome_setor", $nome_setor);
        $stmt -> bindParam(":prioridade", $prioridade);
        $stmt -> bindParam(":status", $status);
        $stmt -> bindParam(":fk_usuario", $fk_usuario);
        return $stmt->execute();
    }

    public function mostrarUsuarios(){
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



?>