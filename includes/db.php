<?php

$config = include __DIR__ . "/config_example.php";

$host = $config['host'];
$user = $config['user'];
$password = $config['password'];
$dbname = $config['dbname'];

try {
    $conn = new PDO("mysql: host=$host;dbname=$dbname", $user, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Conexão falhou: " . $e->getMessage();
}

?>