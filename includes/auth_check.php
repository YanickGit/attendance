<?php
    if ($title <> 'Index' || $title <> 'Success'){
        if (!isset($_SESSION['user_id'])){
            header('Location: login.php');
        }
    }    
?>