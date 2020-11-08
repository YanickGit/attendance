
    <?php
        $title = 'Forget Password';
        require_once 'includes/header.php';
        require_once 'db/db_connect.php';
        require_once 'sendemail.php';

        // If data was submitted via a form request, then..
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = strtolower(trim($_POST['username']));
            $result2 =$user->getUserbyUsername($username);
            if ($result2['userCount'] != 1){
                echo '<div class="alert alert-danger">User not found, try again.....</div>';
            }else{
                //create random password
                $random_pw=rand(); 
                $password = $random_pw; 
                echo '<div class="alert alert-success">Your new password is <b>'.$random_pw.'</b>.</div>';           
                $new_password = md5($password.$username);
                $result = $user->forgetPassword($username, $new_password);
            }
        } 
    ?>

    <h1 class = "text-center">Reset Password</h1>
    
    <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post" autocomplete="off">
        <div class="form-group">
            <label for="username">Username*</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'] ?>" required>
            <?php if (empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>$username_error</p>";?>
            <small id="usernameHelp" class="form-text text-muted">Type your username</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Reset</button>
        <a href ="login.php" class ="btn btn-info btn-block" >Login</a>
    </form>
    
    <?php
        require_once 'includes/footer.php';
    ?>