
    <?php
        $title = 'Login';
        require_once 'includes/header.php';
        require_once 'db/db_connect.php';

        //get all specialization
        $results = $crud->getSpecialization();
    ?>
    
    <h1 class = "text-center">Login</h1>
    
    <form method="post" action="success.php" autocomplete="off">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="username"  required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="password"  required>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"  required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        <button type="submit" name="create" class="btn btn-warning btn-block">Create Account</button>
    </form>
   
    <?php
        require_once 'includes/footer.php';
    ?>