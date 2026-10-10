
<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirm = $_POST["confirm"] ?? "";

    if (!preg_match('/^[A-Za-z ]{2,}$/', $name)) {
        $error = "Enter a valid name using letters only.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Enter a valid email address.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } elseif ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        $error = "Registration input validation successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <form method="POST" action="">
        <h1>Register</h1>

        <?php if ($error != ""): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <div class="input-box">
            <input type="text" name="name" placeholder="Name"
                required minlength="2" pattern="[A-Za-z ]+">
            <i class="bx bxs-user"></i>
        </div>

        <div class="input-box">
            <input type="email" name="email"
                placeholder="Email Address" required>
            <i class="bx bxs-envelope"></i>
        </div>

        <div class="input-box">
            <input type="password" name="password"
                placeholder="Password" required minlength="6">
            <i class="bx bxs-lock-alt"></i>
        </div>

        <div class="input-box">
            <input type="password" name="confirm"
                placeholder="Confirm Password" required minlength="6">
            <i class="bx bxs-shield"></i>
        </div>

        <button type="submit" class="btn">Register</button>

        <div class="register-link">
            <p>Already have an account?
                <a href="login.php">Login Here</a>
            </p>
        </div>
    </form>
</div>

</body>
</html>
