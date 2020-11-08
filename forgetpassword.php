
    <?php
        $title = 'Forget Password';
        require_once 'includes/header.php';
        require_once 'db/db_connect.php';
        require_once 'sendemail.php';

        

        // If data was submitted via a form request, then..
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = strtolower(trim($_POST['username']));
            $email = strtolower(trim($_POST['email']));
            $resultE = $user->verifyUserEmail($username, $email);
            if ($resultE['emailCount'] != 1){
                echo '<div class="alert alert-danger">User and/or Email not found, try again.....</div>';
            }else{
                //create random password
                $random_pw=rand(); 
                $password = $random_pw; 
                //echo '<div class="alert alert-success">Your new password is <b>'.$random_pw.'</b>.</div>';
                require_once 'email_forgetpassword.php';
                echo '<div class="alert alert-success">Your new password was sent to <b>'.$email.'</b>.</div>';
                
                //Hash Password           
                $new_password = md5($password.$username);
                //Update Password
                $resultU = $user->forgetPassword($username, $new_password);
            }
        } 
    ?>

    <h1 class = "text-center">Reset Password</h1>
    
    <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post" autocomplete="off">
        <div class="form-group">
            <label for="username">Username*</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp"  required>
            <small id="usernameHelp" class="form-text text-muted">Type your username</small>
        </div>
        <div class="form-group">
            <label for="email">Email address*</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"  required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Reset</button>
        <a href ="login.php" class ="btn btn-info btn-block" >Login</a>
    </form>
    
    <?php
        require_once 'includes/footer.php';
    ?>