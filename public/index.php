<?php
session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Controller.php';

// Load Controllers
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// HAPUS BASE PATH (jika ada subfolder)
// Pastikan BASEURL di config.php sesuai, misal: http://localhost/spark-app/public
// Maka path-nya adalah /spark-app/public
$basePath = parse_url(BASEURL, PHP_URL_PATH);
if ($basePath && strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

// Routing Sederhana
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
        // Cek sesi login dulu
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        require_once __DIR__ . '/../app/Views/dashboard.php';
        break;

    case '/':
    case '':
    case '/home':
        (new HomeController())->index();
        break;

    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
