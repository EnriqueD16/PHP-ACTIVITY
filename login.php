
<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if (!preg_match('/^[A-Za-z0-9_]{5,}$/', $username)) {
        $error = "Username must be at least 5 characters and use only letters, numbers, or underscores.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters.";
    } else {
        $error = "Input validation successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <form method="POST" action="">
        <h1>Login</h1>

        <?php if ($error != ""): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <div class="input-box">
            <input type="text" name="username"
                placeholder="Username" required minlength="5"
                pattern="[A-Za-z0-9_]+">
            <i class="bx bxs-user"></i>
        </div>

        <div class="input-box">
            <input type="password" name="password"
                placeholder="Password" required minlength="8">
            <i class="bx bxs-lock-alt"></i>
        </div>

        <div class="remember-forgot">
            <label><input type="checkbox" name="remember"> Remember me</label>
            <a href="#">Forgot password?</a>
        </div>

        <button type="submit" class="btn">Login</button>

        <div class="register-link">
            <p>Don't have an account?
                <a href="register.php">Register</a>
            </p>
        </div>
    </form>
</div>

</body>
</html>
