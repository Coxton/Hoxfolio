<?php

namespace App\Core;

class Router
{
    private string $viewDirectory;
    private string $layout;

    public function __construct(
        string $viewDirectory = 'views',
        string $layout = 'layouts/default.php'
    ) {
        $this->viewDirectory = rtrim($viewDirectory, '/');
        $this->layout = $layout;
    }

    public function run(): void
    {
        
        $page = filter_input(INPUT_GET, 'page') ?: 'home';

        
        $page = basename($page);

        
        $viewPath = "{$this->viewDirectory}/{$page}.php";

        
        if (!file_exists($viewPath)) {
            http_response_code(404);
            $viewPath = "{$this->viewDirectory}/404.php";
        }

        
        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        
        include $this->layout;
    }
}