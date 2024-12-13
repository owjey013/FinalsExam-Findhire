<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php'; 
require_once 'core/handleForms.php';

if (isset($_SESSION['user'])) {
    header("Location: " . ($_SESSION['user']['role'] === 'HR' ? 'hr_dashboard.php' : 'applicant_dashboard.php'));
    exit;
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FindHire</title>
    <link rel="stylesheet" href="css/log.css">
</head>
<body class="login">
    <div class="container">
        <h1>Welcome to FindHire, Login your account here</h1>
        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        
        <form action="core/handleforms.php" method="POST">
            <p><label for="username">Username:</label>
            <input type="text" name="username" id="username" required></p>

            <p><label for="user_password">Password:</label>
            <input type="password" name="user_password" id="user_password" required></p>

            <p><button type="submit" name="login">Login</button></p>
        </form>
        <p>Want to Apply? <a href="register.php">Register here</a></p>
    </div>
</body>