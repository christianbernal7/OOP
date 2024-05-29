<?php
namespace App\Routes;

require_once dirname(__DIR__).'/vendor/autoload.php';
// routes/routes.php


use App\Controllers\CalculatorController;
use App\Controllers\UserController;
use App\Models\UserModel;

// if (isset($_GET['action'])) {
//     $action = $_GET['action'];
           // http://localhost/OOP/index.php?action=ping
//     // Define your routes here
//     if ($action === 'ping') {
//         require_once '../App/Controllers/UserController.php';
//         $controller = new UserController();
//         $controller->ping();
//     }
//     // Add more routes as needed
// }

if ($_SERVER['REQUEST_URI'] === '/OOP/User/test') {
    $controller = new UserController();
    print_r($controller->test());
}

if ($_SERVER['REQUEST_URI'] === '/OOP/Calculator/test') {
    echo "dawdaw";

    $controller = new CalculatorController();
    print_r($controller->test());
}

if ($_SERVER['REQUEST_URI'] === '/OOP/Calculator/setName') {
    $obj = new CalculatorController();
    print_r($obj->setName());
}

if ($_SERVER['REQUEST_URI'] === '/OOP/Calculator/operations') {
    require_once dirname(__DIR__).'/App/Requests/calculator.request.php';
}

if ($_SERVER['REQUEST_URI'] === '/OOP/Database/connection') {
    require_once dirname(__DIR__).'/Config/Database.php';
    $obj = new UserModel();
    print_r($obj->testConnection());
}

if ($_SERVER['REQUEST_URI'] === '/OOP/Models/getAllUsers') {
    require_once dirname(__DIR__).'/App/Models/UserModel.php';
    $obj = new UserModel();
    print_r($obj->getAllUsers());
}

if ($_SERVER['REQUEST_URI'] === '/OOP/Models/getUser/2') {
    require_once dirname(__DIR__).'/App/Models/UserModel.php';
    $obj = new UserModel();
    print_r($obj->getUser(2));
}


// if (isset($_GET['action'])) {
//     $action = $_GET['action'];
           // http://localhost/OOP/index.php?action=ping
//     // Define your routes here
//     if ($action === 'ping') {
//         require_once '../App/Controllers/UserController.php';
//         $controller = new UserController();
//         $controller->ping();
//     }
//     // Add more routes as needed
// }

// if ($_SERVER['REQUEST_URI'] === '/OOP/Calculator/operations') {
//     $obj = new CalculatorController();
//     $data = array(
//         'operator'      => $obj->request['operator'],
//         'first_number'  => $obj->request['first_number'], 
//         'second_number' => $obj->request['second_number'], 
//     );
//     print_r($obj->operations($data));
// }



// $directory = array(
//     'root' => 'OOP',
//     'App' => array(
//         'Controllers' => array(
//             'CalculatorController.php'
//         ),
//         'Models',
//         'Requests',
//         'Views',
//     ),
//     'className' => array(
//         'Calculator',
//     ),
//     'methodName' => array(
//         'test',
//     ),
// );


// $obj = new BaseController();

// $routes = '/OOP/Calculator/test';
// $dirname = '/App/Controllers/CalculatorController.php';
// $className = 'CalculatorController';
// $fullClassName = __NAMESPACE__ . '\\' . $className;

// if ($_SERVER['REQUEST_URI'] === $routes) {
//     require_once dirname(__DIR__). $dirname;

//     $controller = new $fullClassName();
//     print_r($controller->test());
// }

// print_r($obj->jsonResponse($fullClassName));














// $directory = dirname(__DIR__);
// $contents = scandir($directory);

// // Filter out directories
// $directories = array_filter($contents, function ($item) use ($directory) {
//     $itemPath = $directory . DIRECTORY_SEPARATOR . $item;
//     return is_dir($itemPath) && !in_array($item, ['.', '..']);
// });

// // Remove file extensions
// $directories = array_map(function ($dir) {
//     $pathInfo = pathinfo($dir);
//     return $pathInfo['filename'];
// }, $directories);

// // Output the result
// // print_r($directories);
// print_r($obj->jsonResponse($directories));




