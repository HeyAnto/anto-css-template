<?php
ob_start();

$routes = [
    '/' => 'pages/introduction.php',
    '/globals' => 'pages/globals.php',
    '/utilities' => 'pages/utilities.php',
    '/components' => 'pages/components.php',
    '/layout' => 'pages/layout.php',
];

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_uri = rtrim($request_uri, '/');
if (empty($request_uri)) {
    $request_uri = '/';
}

$page_to_include = $routes[$request_uri] ?? 'pages/404.php';

include_once "./_components/head.php";

if (file_exists($page_to_include)) {
    include_once $page_to_include;
} else {
    include_once "pages/404.php";
}

include_once "./_components/footer.php";

ob_end_flush();
