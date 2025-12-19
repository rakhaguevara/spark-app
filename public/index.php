<?php
session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../core/App.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// HAPUS BASE PATH
$base = '/spark-app/public';
$uri = str_replace($base, '', $uri);

switch ($uri) {
    case '/login':
        (new AuthController())->login();
        break;

    case '/login/auth':
        (new AuthController())->authenticate();
        break;

    case '/logout':
        (new AuthController())->logout();
        break;

    case '/dashboard':
        require_once __DIR__ . '/../app/Views/dashboard.php';
        break;

    default:
        (new HomeController())->index();
        break;
}
