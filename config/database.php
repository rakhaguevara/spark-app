<?php

$database = [
    'host' => '127.0.0.1',
    'port' => 3305,        // 🔥 INI KUNCINYA
    'user' => 'root',
    'pass' => 'root',          // XAMPP default
    'name' => 'spark',
    'charset' => 'utf8mb4'
];


if (!defined('DB_HOST')) define('DB_HOST', $database['host']);
if (!defined('DB_USER')) define('DB_USER', $database['user']);
if (!defined('DB_PASS')) define('DB_PASS', $database['pass']);
if (!defined('DB_NAME')) define('DB_NAME', $database['dbname']);

return $database;
