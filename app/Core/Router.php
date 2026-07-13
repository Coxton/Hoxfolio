<?php

namespace App\Core;

class Router
{

    public function run(): void
    {
        $page = filter_input(INPUT_GET, 'page') ?: 'home';
        $page = trim($page, '/');

        $isAdmin = str_starts_with($page, 'admin');

        if ($isAdmin) {

            
            $page = preg_replace('#^admin/?#', '', $page);

            
            if ($page === '') {
                $page = 'dashboard';
            }

            $viewDirectory = 'admin/views';
            $layout = 'admin/layouts/default.php';

        } else {

            $viewDirectory = 'views';
            $layout = 'layouts/default.php';

        }

        $viewPath = "{$viewDirectory}/{$page}.php";

        if (!file_exists($viewPath)) {
            http_response_code(404);
            $viewPath = "{$viewDirectory}/404.php";
        }

        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        include $layout;
    }
}