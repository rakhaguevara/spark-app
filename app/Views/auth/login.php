<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | SPARK</title>
    <link href="<?= BASEURL ?>/assets/css/style.css" rel="stylesheet">
</head>
<body class="login-page">

<div class="login-wrapper">

    <!-- LEFT FORM -->
    <div class="login-form">

        <h2>Welcome to SPARK!</h2>
        <p>Please enter your details to login.</p>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="login-error">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="/login/auth" method="POST">

            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit" class="btn-login">
                Log In
            </button>

        </form>

        <small>Don't have an account? <a href="/register">Sign Up</a></small>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="login-image">
        <img src="<?= BASEURL ?>/assets/img/content-1.png" alt="Parking">
        <div class="login-quote">
            <p>
                “With SPARK, I can manage my parking effortlessly.”
            </p>
            <strong>Steven Curry</strong>
            <span>GOAT Basketball</span>
        </div>
    </div>

</div>

</body>
</html>
