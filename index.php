<?php

define('SECURE_ACCESS', true);
require_once "enum/UserRole.php";

require_once "service/ExceptionHandler.php";


require_once "service/AuthService.php";

$request = $_SERVER['REQUEST_URI'];
$content = 'views/index.php';


session_start();
if (isset($_SESSION['userId'])) {
    $user = $_SESSION['userId'];
}


$request = strtok($request, '?');

// Route handling
switch ($request) {
    case '/':
        $content = 'views/index.php';
        break;
    case '/login':
        $content = 'views/auth/login.php';
        break;
    case '/logout':
        $content = 'views/auth/logout.php';
        break;
    case '/register':
        $content = 'views/auth/register.php';
        break;
    case '/error/500':
        $content = 'views/error/500.php';
        break;
    case '/admin/dashboard':
        $content = 'views/admin/AdminDashboard.php';
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        $content = 'views/error/404.php';
        break;
}


if (!file_exists($content)) {
    header("HTTP/1.0 404 Not Found");
    $content = 'views/error/404.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <nav class="nav">
        <div>
            <h2>User Management System</h2>
        </div>
        <div>
            <ul>
                <?php if (isset($_SESSION['userId']) && isset($_SESSION['username'])): ?>
                    <?php if ($_SESSION['role'] === strtolower(UserRole::MEMBER->name)): ?>
                        <li><a href="/admin/dashboard">Dashboard</a></li>
                    <?php endif; ?>
                    <li><a href="#"> <?php echo $_SESSION['username'] ?> </a></li>
                    <form action="/logout" method="post">
                        <button type="submit">Logout</button>
                    </form>
                <?php else: ?>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div class="container" style="flex: 1;">
        <div class="form-container">
            <?php include $content; ?>
        </div>
    </div>
</body>

</html>