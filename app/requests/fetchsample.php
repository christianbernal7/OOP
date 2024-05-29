<?php

// For Strict Typing
declare(strict_types = 1);

// // Load the File
require dirname(__DIR__).'/../vendor/autoload.php';

// namespace alias/import
use App\Models\UserModel;



// REQUEST HTTP POST
           
    $obj = new UserModel();

    $obj->get();

    print_r($obj); exit;
        


