<?php

// For Strict Typing
declare(strict_types = 1);

// // Load the File
require dirname(__DIR__).'/../vendor/autoload.php';

// namespace alias/import
use App\Controllers\searchController;

// Call the Class
$obj = new searchController();

// REQUEST HTTP POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $search = $_POST['search'];

}

