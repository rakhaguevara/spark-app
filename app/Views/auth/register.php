<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register | SPARK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="<?= BASEURL; ?>/assets/img/logo.png">


    <!-- CSS LOGIN / REGISTER -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/login-style.css">
</head>

<body>

    <div class="login-container">

        <!-- LEFT SIDE -->
        <div class="login-left">
            <div class="login-box">

                <!-- Switch -->
                <div class="login-switch">
                    <button type="button" class="switch-btn "
                        onclick="window.location.href='<?= BASEURL; ?>/login'">
                        Login
                    </button>

                    <button type="button" class="switch-btn active"
                        onclick="window.location.href='<?= BASEURL; ?>/register'">
                        Sign Up
                    </button>
                </div>


                <h1>Welcome New Member!</h1>
                <p class="subtitle">
                    Welcome to SPARK,<br>
                    Your journey starts here
                </p>

                <form action="<?= BASEURL; ?>/auth/register" method="POST">

                    <label>Username</label>
                    <input type="text" name="username" placeholder="Enter your username" required>

                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email address" required>

                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>

                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm your password" required>

                    <label>Phone Number</label>
                    <input type="tel" name="phone" placeholder="Enter your phone number" required>

                    <button type="submit" class="btn-primary">Sign Up</button>

                    <div class="divider">OR</div>


                </form>

                <p class="signup-text">
                    Already have an account?
                    <a href="<?= BASEURL; ?>/login">Login</a>
                </p>

            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="login-right">
            <div class="quote-card">
                <p class="quote">
                    “With SPARK, I can manage my parking effortlessly—from finding available spaces nearby,
                    reserving a spot in advance, to parking with confidence without wasting time or dealing
                    with unnecessary stress.”
                </p>

                <div class="author">
                    <strong>Steven Curry</strong>
                    <span>GOAT Basketball Player</span>
                    <span>PARKSTER from 2022</span>
                </div>

                <div class="quote-nav">
                    <span>←</span>
                    <span>→</span>
                </div>
            </div>
        </div>

    </div>

</body>

</html>