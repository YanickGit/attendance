
    <?php
        $title = 'Login';
        require_once 'includes/header.php';
        require_once 'db/db_connect.php';

        // If data was submitted via a form request, then..
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = strtolower(trim($_POST['username']));
            $password = $_POST['password'];
            $new_password = md5($password.$username);

            $result = $user->getUser($username, $new_password);
            if (!$result){
                    echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $result['user_id'];
                header ("Location: viewrecords.php");
            }
        }
        
    ?>

    <h1 class = "text-center">Login</h1>
    
    <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post" autocomplete="off">
        <div class="form-group">
            <label for="username">Username*</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'] ?>" required>
            <?php if (empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>$username_error</p>";?>
            
        </div>
        <div class="form-group">
            <label for="password">Password*</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <?php if (empty($password) && isset($password_error)) echo "<p class='text-danger'>$password_error</p>";?>
        </div>
        <!--
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"  required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        -->
        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        <a href ="forgetpassword.php" class ="btn btn-info btn-block" >Forget Password</a>
    </form>
   
    <?php
        require_once 'includes/footer.php';
    ?>