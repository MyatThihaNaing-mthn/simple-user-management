<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'User Management System'; ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <nav class="nav">
        <div>
            <h2>User Management System</h2>
        </div>
        <div>
            <ul>
                <?php if(isset($_SESSION["userId"]) && $_SESSION["username"] === true): ?>
                    <li><a href="/dashboard.php">Dashboard</a></li>
                    <li><a href="#"> <?php echo $_SESSION ?> </a></li>
                    <li><a href="/logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div style="flex: 1;">
        <div class="container">
            <?php include $content; ?>
        </div>
    </div>
</body>
</html> 