<?php

if($_SESSION['role'] !== strtolower(UserRole::ADMIN->name)){
    header("Location: /error/404");
    exit();
}

?>

<div>
    <h2>Admin Dashboard</h2>
</div>