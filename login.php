
    <?php
        $title = 'Login';
        require_once 'includes/header.php';
        require_once 'db/db_connect.php';
    ?>
    
    <h1 class = "text-center">Login</h1>
    
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" autocomplete="off">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-descri bedby="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']?>" required>
            <?php if (empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>$username_error</p>";?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="password"  required>
            <?php if (empty($password) && isset($password_error)) echo "<p class='text-danger'>$password_error</p>";?>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"  required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        <a href ="#" class ="btn btn-info btn-block" >Forget Password</a>
    </form>
   
    <?php
        require_once 'includes/footer.php';
    ?>