<?php 
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

    //Call CRUD Function
    $result = $crud->editAttendee($id, $firstname, $lastname, $dob, $specialization, $email, $contact_num);

    //Redirect to ViewRecords
    if ($result){
        header("viewrecords.php");
    }

}
else { echo 'error';


}


?>