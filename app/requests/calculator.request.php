<?php

// For Strict Typing
declare(strict_types = 1);

// // Load the File
require dirname(__DIR__).'/../vendor/autoload.php';

// namespace alias/import
use App\Controllers\CalculatorController;

// Call the Class
$obj = new CalculatorController();

// REQUEST HTTP POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        // $data = array(
        //     'operator'      => $_POST['operator'] ??  $obj->request['operator'],
        //     'first_number'  => $_POST['first_number'] ??  $obj->request['first_number'],
        //     'second_number' => $_POST['second_number'] ??  $obj->request['second_number'],
        // );
        // $data = array (
        //     'firstname' => $_POST['firstname'] ?? $obj->request['firstname'],
        //     'lastname'  => $_POST['lastname'] ?? $obj->request['lastname'],
        //     'age'       => $_POST['age'] ?? $obj->request['age'],
        //     'email'     => $_POST['email'] ?? $obj->request['email'],   
        // );

            // $data = [
            //     $_POST['firstname'],
            // ];


        // print_r($_POST['lastname']); exit;

        // Catch Error
        try {
            // var_dump($data);
           $obj->operations($_POST); // used the method
            
            echo $obj->answer();

            header("location: http://localhost/OOP/Public/index.php");

            // echo CalculatorController::query(500);
        } catch (TypeError $e) {
            echo $obj::getErrorResponse() . " " . $e->getMessage();
        }

        
}


