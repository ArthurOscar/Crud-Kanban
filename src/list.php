<?php

class Lista {
    private $conn;

    public function __construct($db){
        $this -> conn = $db;
    }

    public function listarTarefas($status){
        $sql = "SELECT * FROM tarefas WHERE status = :status";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> bindParam(":status", $status);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>