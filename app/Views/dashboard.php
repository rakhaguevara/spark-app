<?php ob_start(); ?>

<h1>Dashboard</h1>
<p>Welcome, <?= htmlspecialchars($_SESSION['user']['nama']) ?></p>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/layouts/main.php';




