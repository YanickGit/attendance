<?php
    $title = 'Success';
    require_once 'includes/header.php';
?>
    
<h1 class = "text-center text-success">You Have Been Registered!</h1>

<?php 
echo'
<div class="card text-center" style="width: 18rem; center">
  <div class="card-body">
    <h5 class="card-title">'.$_GET['firstname'].' '.$_GET['lastname'].'</h5>
    <h6 class="card-subtitle mb-2 text-muted">'.$_GET['specialization'].'</h6>
    <p class="card-text">
    Date of Birth: '.$_GET['dob'].'<br>
    Email Address: '.$_GET['email'].'<br>
    Contact Number: '.$_GET['phone'].'<br>
    </p>
  </div>
</div>
';
?>
   
<?php
    require_once 'includes/footer.php';
?>