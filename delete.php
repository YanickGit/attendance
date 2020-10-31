<?php 
require_once 'db/db_connect.php';

if (!$_GET['id']){
    echo 'error';
}else {
    //Get ID Values
    $id = $_GET['id'];

    //Call Delete Function
    $result = $crud->deleteAttendee($id);

    //Redirect to ViewRecords
    if ($result){
        header("Location: viewrecords.php");
    } else{
        echo '';
    }
}
?> 