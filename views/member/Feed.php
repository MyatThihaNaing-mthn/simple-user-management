<?php


// Assuming that admin can also see the feed
if($_SESSION['role'] !== strtolower(UserRole::MEMBER->name) && $_SESSION['role'] !== strtolower(UserRole::ADMIN->name)){
    header("Location: /login");
    exit();
}

?>

<div>
    <h2>Member Feed</h2>
</div>