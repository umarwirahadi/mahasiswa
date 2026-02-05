<?php
/**
 * Student Portal - Main Entry Point
 * Portal for Students in Higher Education
 */

// Define path constants
define('BASEPATH', __DIR__ . '/');
define('APPPATH', BASEPATH . 'application/');
define('VIEWPATH', APPPATH . 'views/');

// Start session
session_start();

// Simple routing
$request = $_SERVER['REQUEST_URI'];
$script_name = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
$request = str_replace($script_name, '', $request);
$request = trim($request, '/');

// Parse the route
$parts = explode('/', $request);
$controller = !empty($parts[0]) ? $parts[0] : 'home';
$action = !empty($parts[1]) ? $parts[1] : 'index';

// Validate controller name - only allow alphanumeric characters
if (!preg_match('/^[a-zA-Z0-9_]+$/', $controller)) {
    http_response_code(404);
    echo "404 - Invalid request";
    exit;
}

// Load the appropriate controller
$controllerFile = APPPATH . 'controllers/' . ucfirst($controller) . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = ucfirst($controller);
    $controllerObj = new $controllerClass();
    
    if (method_exists($controllerObj, $action)) {
        $controllerObj->$action();
    } else {
        http_response_code(404);
        echo "404 - Action not found";
    }
} else {
    http_response_code(404);
    echo "404 - Page not found";
}
