<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';

    if(isset($_POST['submit'])){
      //extract values from the $_POST array
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $specialization = $_POST['specialization'];
      $contact_num = $_POST['contact_num'];

      //call function to insert and track if success or not
      $isSuccess = $crud->insertAttendees ($firstname, $lastname, $dob, $specialization, $email, $contact_num);

      if ($isSuccess) {
        echo'
          <h1 class = "text-center text-success">You Have Been Registered!</h1>
          
          <div id="card">
            <h2 class = "h2">'.$_POST['firstname'].' '.$_POST['lastname'].'</h2>
            <!-- 
            <div class="image-crop">
                <img id="avatar" src="images/avatar1.png"></img>
            </div>
             -->
            <div id="bio">
              <h3 class = "h3">'.$_POST['specialization'].'</h3>
              <p>
              <b>Date of Birth</b> <br>
              '.$_POST['dob'].' <br><br>
              Email Address <br>
              '.$_POST['email'].' <br><br>
              Contact Number <br>
              '.$_POST['contact_num'].' <br><br>
              </p>
            </div>
          </div>
        </div>
        
        ';
      } else {
        echo'
        include "include/error_message.php"
        ';
      }
      
    }
?>

<?php
    require_once 'includes/footer.php';
?>