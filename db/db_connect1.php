<?php 
    $host = '127.0.0.1';
    $db = 'attendance_db';
    $username = 'root';
    $password = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "<h2 class='text-success text-center' ><-----Database Connection Successful-----></h2>";
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
        //echo "<h2 class='text-danger text-center' ><-----Database Connection FAILED-----></h2>";
    }
   require_once 'crud.php';
   $crud = new crud($pdo);

?>