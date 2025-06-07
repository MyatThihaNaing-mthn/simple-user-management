<?php

$content = 'views/auth/login.php';
$title = 'Login';


$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)){
        $username_err = "Please enter username";
    }
    if(empty($password)){
        $password_err = "Please enter password";
    }

    if(empty($username_err) && empty($password_err)){
        try {
            $authService = new AuthService();
            $user = $authService->login($username, $password);
            
            if($user){
                // destroy old session and create new one
                session_destroy();
                session_start();
                $_SESSION['userId'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['status'] = $user['status'];
                header("Location: /");
                exit();
            } else {
                $login_err = "Invalid username or password";
            }
        } catch (Exception $e) {
            throw new Exception("Failed to login user: " . $e->getMessage());
        }
    }
}


?>

<div class="form-container">
    <h2>Welcome</h2>
    <?php if(!empty($login_err)): ?>
        <div class="alert alert-danger"><?php echo $login_err; ?></div>
    <?php endif; ?>
   
    <form action="/login" method="post" class="form-container">
        <div class="form-group">
            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" 
                   value="<?php echo $username; ?>" placeholder="Username">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>    
        <div class="form-group">
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" 
                   placeholder="Password">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
        <p>Don't have an account? <a href="/register">Sign up now</a>.</p>
    </form>
</div> 