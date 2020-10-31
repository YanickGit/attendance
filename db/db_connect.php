<?php    
    //local_db 
    $host = '127.0.0.1';
    $db = 'attendance_db';
    $username = 'root';
    $password = '';
    $charset = 'utf8mb4';

    //remote_db 
    $_host = 'db4free.net';
    $_db = 'yl_attendance_db';
    $_username = 'yl_root_db';
    $_password = 'yl_root_db.9';
    $_charset = 'utf8mb4';

    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";
    $_dsn = "mysql:host=$_host; dbname=$_db; charset=$_charset";

    require_once 'host_check.php';

    try {
       /* 
       if (isHostAvailible('127.0.0.1')) {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } else {
            $pdo = new PDO($_dsn, $_username, $_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        */
        //================================================================== 
        //$pdo = new PDO($dsn, $username, $password);
        $pdo = new PDO($_dsn, $_username, $_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
   require_once 'crud.php';
   $crud = new crud($pdo);
?>