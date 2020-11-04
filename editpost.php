<?php 
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';

    //Get Values from Post Action
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $specialization = $_POST['specialization'];
        $contact_num = $_POST['contact_num'];
        $status1 = $_POST['status1'];

        //Call CRUD Function
        $result = $crud->editAttendee($id, $firstname, $lastname, $dob, $specialization, $email, $contact_num, $status1);

        //Redirect to ViewRecords
        if ($result){
            header("Location: viewrecords.php");
    }
    else { 
        include 'includes/error_message.php';
    }
    }
    else {
        include 'includes/error_message.php';
    }

    require_once 'includes/footer.php'

?> 