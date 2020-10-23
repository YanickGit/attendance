<?php 
    $host = '127..0.1';
    $db = 'attendance_db';
    $username = 'root';
    $password = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";

    try {
        $pdo = new PDO($dsn, $username, $password);
        echo "<h2 class='text-success text-center' ><-----Database Connection Successful-----></h2>";
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
        //echo "<h2 class='text-danger text-center' ><-----Database Connection FAILED-----></h2>";
    }


?>