
<?php
    $title = 'View Record';
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';

    //get attendee by id
    if (!isset($_GET['id'])){
        echo '<h1 class = "text-center text-danger">Please check details and try again.</h1>';
    }
    else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
 
        echo'
            <h1 class = "text-center">IT Professional Details</h1>
            <div id="card">
                <h2 class = "h2">'.$result['firstname'].' '.$result['lastname'].'</h1>
                <!-- 
                <div class="image-crop">
                    <img id="avatar" src="images/avatar1.png"></img>
                </div>
                 -->
                <div id="bio">
                    <h3 class = "h3">'.$result['name'].'</h3>
                    <p>
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
                </div>
            </div>
            </div>
        ';
    }

?>

<?php
    require_once 'includes/footer.php';
?>