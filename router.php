<?php



$page = $_GET['page'] ?? 'home';
$viewPath = "views/$page.php";


if (!file_exists($viewPath)) {
    $viewPath = "views/404.php";
}


ob_start();
include $viewPath;
$content = ob_get_clean();

include "layouts/default.php";