<?php
    session_start();

    $time = $_SERVER['REQUEST_TIME'];

    $timeout_duration = 300; //5 minutes timeout

    if (isset($_SESSION['LAST_ACTIVITY']) && 
        ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
        session_unset();
        session_destroy();
        session_start();
    }

    $_SESSION['LAST_ACTIVITY'] = $time; //update time based on user activity
?>