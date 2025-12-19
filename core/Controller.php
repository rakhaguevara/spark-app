<?php

class Controller
{
    public function model($model)
    {
        if (file_exists('../app/Models/' . $model . '.php')) {
            require_once '../app/Models/' . $model . '.php';
            return new $model();
        }
        die("Model $model not found.");
    }

    public function view($view, $data = [])
    {
        // Extract data for view
        if (!empty($data)) {
            extract($data);
        }

        // Check if view exists
        if (file_exists('../app/Views/' . $view . '.php')) {
            // Buffer the view content
            ob_start();
            require_once '../app/Views/' . $view . '.php';
            $content = ob_get_clean();

            // Load main layout
            require_once '../app/Views/layouts/main.php';
        } else {
            die("View $view not found.");
        }
    }
    
    // Simple redirect helper
    public function redirect($url)
    {
        header('Location: ' . BASEURL . $url);
        exit;
    }
}
