<?php
    $title = 'Success';
    require_once 'includes/header.php';
?>
    
<h1 class = "text-center text-success">You Have Been Registered!</h1>

<?php 
echo'
<div class="card text-center" style="width: 18rem; center">
  <div class="card-body">
    <h5 class="card-title">'.$_POST['firstname'].' '.$_POST['lastname'].'</h5>
    <h6 class="card-subtitle mb-2 text-muted">'.$_POST['specialization'].'</h6>
    <p class="card-text">
    Date of Birth: '.$_POST['dob'].'<br>
    Email Address: '.$_POST['email'].'<br>
    Contact Number: '.$_POST['phone'].'<br>
    </p>
  </div>
</div>
';
?>
   
<?php
    require_once 'includes/footer.php';
?>