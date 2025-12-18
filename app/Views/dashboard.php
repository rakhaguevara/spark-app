<?php ob_start(); ?>


<?php
$content = ob_get_clean();
require_once __DIR__ . '/layouts/main.php';
