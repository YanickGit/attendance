<?php    
    //local_db 
    $host = 'DESKTOP-G3E641O';
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
        if (isHostAvailible('DESKTOP-G3E641O')) {
            $pdo = new PDO($_dsn, $_username, $_password);
            //$pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } else {
            $pdo = new PDO($dsn, $username, $password);
            //$pdo = new PDO($_dsn, $_username, $_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        //$pdo = new PDO($dsn, $username, $password);
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "<h2 class='text-success text-center' ><-----Database Connection Successful-----></h2>";
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
        //echo "<h2 class='text-danger text-center' ><-----Database Connection FAILED-----></h2>";
    }
   require_once 'crud.php';
   $crud = new crud($pdo);

?>