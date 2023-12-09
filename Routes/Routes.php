<?php

namespace App\Route;

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Models\UserModel;

// Get the request URI path
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pattern = '/\/OOP\/Models\/getUser\/(\d+)/';

if (preg_match($pattern, $requestPath, $matches)) {
    $userId = $matches[1];

    require_once dirname(__DIR__) . '/App/Models/UserModel.php';
    $obj = new UserModel();
    $userData = $obj->getUser($userId);

    print_r($userData);
} 


if (!preg_match($pattern, $requestPath, $matches)) {
    // Handle invalid route
    header("HTTP/1.1 404 Not Found");
    echo "404 Not Found";
}
