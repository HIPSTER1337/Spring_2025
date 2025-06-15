<?php
$host = 'localhost';
$dbname = 'unik_site';
$username = 'root';
$db_password = '';
$port = 3306;
try {
    // подключаемся к базе данных
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $db_password);
}
catch (PDOException $e) {
    // echo "Database error: " . $e->getMessage().'<br>';
    echo "БАЗА ОТКИСЛА";
    exit(); 
}
?>