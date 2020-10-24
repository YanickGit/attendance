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
          <div class="card text-center" style="width: 18rem; center">
            <div class="card-body">
              <h5 class="card-title">'.$_POST['firstname'].' '.$_POST['lastname'].'</h5>
              <h6 class="card-subtitle mb-2 text-muted">'.$_POST['specialization'].'</h6>
              <p class="card-text">
                Date of Birth: '.$_POST['dob'].'<br>
                Email Address: '.$_POST['email'].'<br>
                Contact Number: '.$_POST['contact_num'].'<br>
              </p>
            </div>
          </div>
        ';
      } else {
        echo'
          <div class="text-center">
            <h2 class = "text-danger">An error occured while processing your registration.</h2>
            <br>
            <img src="images/sorry.jpg" class="rounded" alt="sorry" height="300px" width="350px">
            <br><br>
            <h4>Try again, '.$_POST['firstname'].'.</h4>
          </div>
        ';
      }
      
    }
?>

<?php
    require_once 'includes/footer.php';
?>