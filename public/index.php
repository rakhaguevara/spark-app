<?php
include '/../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parkster Business</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Header / Navigation -->
    <header class="header">
        <div class="container">
            <h1 class="logo">Parkster Business</h1>
            <nav class="nav">
                <a href="#">Home</a>
                <a href="#">Business</a>
                <a href="#">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2>Manage all parking and EV charging in one account</h2>
            <p>With Parkster’s business solutions everyday life gets easier — simplified administration and transparent costs for your company.</p>
            <a href="#pricing" class="btn primary-btn">Get Started</a>
        </div>
    </section>

    <!-- About / Info Section -->
    <section class="info">
        <div class="container">
            <h3>Business Solutions</h3>
            <p>
                Turn parking and EV charging into something that just works. Our packages offer flexibility and control over all company parking needs.
            </p>
        </div>
    </section>

    <!-- Pricing Table -->
    <section class="pricing" id="pricing">
        <div class="container">
            <h3>Our Pricing</h3>
            <div class="pricing-cards">
                <div class="card">
                    <h4>Flex</h4>
                    <p class="price">SEK 49 + SEK 4.80/month</p>
                    <ul>
                        <li>No startup fee</li>
                        <li>Monthly cost per user</li>
                        <li>Pay-per-parking</li>
                    </ul>
                </div>
                <div class="card">
                    <h4>Fixed</h4>
                    <p class="price">SEK 89/month</p>
                    <ul>
                        <li>No startup fee</li>
                        <li>Monthly cost per user</li>
                        <li>Unlimited parking included</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>Contact us: +46 775 33 30 00 | foretag@parkster.se</p>
            <p>Available in Sweden & beyond.</p>
        </div>
    </footer>
</body>

</html>