<?php
    $title = 'View Deleted Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/db_connect.php';

    //get attendee by id
    if (!isset($_GET['id'])){
        //echo '<h1 class = "text-center text-danger">Please check details and try again.</h1>';
        include 'includes/error_message.php';
    }
    else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
 
        echo'
            <h1 class = "text-center text-danger">Deleted IT Professional</h1>
            <div id="cardD">
                <h2 class = "h2">'.$result['firstname'].' '.$result['lastname'].'</h2>
                <!-- 
                <div class="image-crop">
                    <img id="avatar" src="images/avatar1.png"></img>
                </div>
                 -->
                <div id="bio">
                    <h3 class = "h3">'.$result['name'].'</h3>
                    <p>
                    Status <br>
                    '.$result['status1'].' <br><br>
                    Date Registered <br>
                    '.$result['registration_time'].' <br><br>
                    Date Updated <br>
                    '.$result['update_time'].' <br><br>
                    Date of Birth <br>
                    '.$result['dob'].' <br><br>
                    Email Address <br>
                    '.$result['email'].' <br><br>
                    Contact Number <br>
                    '.$result['contact_num'].' <br>
                    </p>
        ';
?>
                    <p>
                    <a href ="viewrecords.php" class ="btn btn-info btn-lg" >View List</a>
                    <a href ="edit.php?id=<?php echo $result['attendee_id'] ?>" class ="btn btn-warning btn-lg">Edit</a>
                    <a onclick="return confirm('NOTICE: You are about to activate an attendee, are you sure?');" href ="activateattendee.php?id=<?php echo $result['attendee_id'] ?>" class ="btn btn-secondary btn-lg">Active</a>
                    </p>
                </div>
            </div>
 <?php }  ?>

<?php
    require_once 'includes/footer.php';
?>