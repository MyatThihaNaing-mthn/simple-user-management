<?php

require_once __DIR__ . '/../../model/User.php';
require_once __DIR__ . '/../../service/AuthService.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authService = new AuthService();

    //skipped validation for brevity
    $user = new User(
        $_POST['username'],
        $_POST['password'],
        $_POST['email']
    );

    
    try {
        $authService->register($user);
        header("Location: /login");
        exit();
    } catch (Exception $e) {
        throw new Exception("Failed to register user: " . $e->getMessage());
    }
}

?>
<div class="form-container">
    <h2>Register</h2>
    <form action="/register" method="post" class="form-container">
        <div class="form-group">
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <button type="submit">Register</button>
        </div>
        <p>Already have an account? <a href="/login">Login here</a>.</p>
    </form>
</div>