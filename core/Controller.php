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

    public function view($view, $data = [], $layout = 'main')
    {
        if (!empty($data)) {
            extract($data);
        }

        if (!file_exists('../app/Views/' . $view . '.php')) {
            die("View $view not found.");
        }

        ob_start();
        require_once '../app/Views/' . $view . '.php';
        $content = ob_get_clean();

        if ($layout === 'main') {
            require_once '../app/Views/layouts/main.php';
        } elseif ($layout === 'dashboard') {
            require_once '../app/Views/layouts/dashboard.php';
        } else {
            echo $content;
        }
    }



    // Simple redirect helper
    public function redirect($url)
    {
        header('Location: ' . BASEURL . $url);
        exit;
    }
}
