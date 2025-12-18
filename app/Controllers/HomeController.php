<?php

class HomeController
{
    public function index()
    {
        $title = 'SPARK | Home';

        // 1. Start buffer
        ob_start();

        // 2. Load view
        require __DIR__ . '/../Views/home.php';

        // 3. Save view output
        $content = ob_get_clean();

        // 4. Load layout (SETELAH $content ADA)
        require __DIR__ . '/../Views/layouts/main.php';
    }
}
