<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
      //extract values from the $_POST array
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $specialization = $_POST['specialization'];
      $contact_num = $_POST['contact_num'];

      require_once 'includes/uploadimage.php';

      if (empty($imgpath)) {
        $imgpath = "images/profile/__default.png";
        //echo "<br>";
        //echo "DEFAULT LOADED: $imgpath";
        //echo "<br><br>";
      } 
      //else {
        //echo "<br>";
        //echo "NOT EMPTY: $imgpath";
        //echo "<br><br>";
      //}
    

      //call function to insert and track if success or not
      $isSuccess = $crud->insertAttendees ($firstname, $lastname, $imgpath, $dob, $specialization, $email, $contact_num);
       
      //get all specialization
       $results = $crud->getSpecialization();

      if ($isSuccess) {
        require_once 'email_registration.php';
        
        //SendEmail::SendMail($email, 'Welcome to IT Conference 2020', 'Dear ' .$firstname .',<br><br>You have successfully registered for this year\'s IT Conference. <br><br>Regards. <br> IT Conference Team <br>');

        echo'
          
          <h1 class = "text-center text-success">You Have Been Registered!</h1>
          
          <div id="card">
            <h2 class = "h2">'.$firstname.' '.$lastname.'</h2>
            
            <div class="image-crop">
                <img id="avatar" src="'.$imgpath.'"></img>
            </div>
          
            <div id="bio">
            ';
            ?>
            <?php while($row = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <?php 
                    if ($row['specialization_id'] == $specialization) 
                    echo '<h3 class = "h3">'.$row['name'].'</h3>';
                ?>
            <?php } ?>
          <?php
          echo'     
              <p>
              <b>Date of Birth</b> <br>
              '.$dob.' <br><br>
              Email Address <br>
              '.$email.' <br><br>
              Contact Number <br>
              '.$contact_num.' <br><br>
              </p>
        ';
        ?>
          <p>
            <a href ="index.php" class ="btn btn-success " >Homepage</a>
            <a href ="viewrecords.php" class ="btn btn-info " >View List</a>
          </p> 
            </div>
          </div>
        </div>
    <?php
      } else {
        include 'includes/error_message.php';
      }
    }
    else {
      header("Location: index.php");
    }
  ?>

<?php
    require_once 'includes/footer.php';
?>