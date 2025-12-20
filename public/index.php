<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Controller.php';


// Load Controllers
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/DashboardController.php';


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

    case '/register':
        (new AuthController())->register();
        break;
    case '/auth/register':
        (new AuthController())->registerProcess();
        break;



    case '/logout':
        (new AuthController())->logout();
        break;

    case '/dashboard':
        (new DashboardController())->index();
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
