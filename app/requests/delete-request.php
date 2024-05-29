<?php

// For Strict Typing
declare(strict_types = 1);

// // Load the File
require dirname(__DIR__).'/../vendor/autoload.php';

// namespace alias/import
use App\Controllers\deleteController;

// Call the Class
$obj = new deleteController();

// REQUEST HTTP POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        $id = $_POST['id'];

       
            // var_dump($data);
           $obj->operations($id); // used the method
        

            header("location: http://localhost/OOP/Public/index.php");

}


