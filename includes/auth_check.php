<?php
    //if ($title = 'Index' || $title = 'Success'){
        //return true;
    //} else {
        if (!isset($_SESSION['user_id'])){
            header('Location: login.php');
        }
    //}
?>