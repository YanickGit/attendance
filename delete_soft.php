<?php 
require_once 'db/db_connect.php';

if (!$_GET['id']){
    include 'includes/error_message.php';
}else {
    //Get ID Values
    $id = $_GET['id'];

    //Call Delete Function
    $result = $crud->deleteSoftAttendee($id);

    //Redirect to ViewRecords
    if ($result){
        header("Location: viewrecords.php");
    } else{
        require_once 'includes/error_message.php';
    }
}
?> 