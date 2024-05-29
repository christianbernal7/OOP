<?php
namespace App\Controllers;

// defined('BASEPATH') OR exit('No direct script access allowed'); 

use App\Controllers\Abstract\PaymentAbstract;

class BaseController extends PaymentAbstract {

    private $request;
    private $table;

    const POST_METHOD = 'POST';
    const GET_METHOD = 'GET';

    const METHOD = [
        'POST' => self::POST_METHOD,
        'GET' => self::GET_METHOD
    ];

    // Set Json Response 
    public function jsonResponse($params){
        header('Content-Type: application/json');               // application type is json
        $response = json_encode($params, JSON_PRETTY_PRINT);    // turn into json format
        
        return $response;   // e.g Output: { "result": 300,"status": "success"}
    }

    public function parseRequest(){
        $data = file_get_contents('php://input');
        $this->request = json_decode($data, true);

        return $this->request;
    }

    public function ping() {
        date_default_timezone_set('Asia/Manila');
        $timeStamp = time();
        
        return $timeStamp;
    }

    public function visaPayment(): string
    {
        return "Hoy Bayad Muna Bago Sakay!";
        // Test Abstract Method
    }

    public function withDrawProcess($name, $id){}  
    public function paymentProcess(){}
    public function payNow(){}

    // public function render(){

    //     // $obj = array_merge($param,$data);

    //     $obj = array(
    //         'Users' => array(
    //             'name' => 'whyllardermie',
    //             'email' => 'whyllardermie@gmail.com'
    //         ),
    //     );

    //     return $this->jsonResponse($obj);
    // }

    public function render(string $param, array $data){
        $obj = array(
            $param => $data
        );
        return $this->jsonResponse($obj);
    }


    public function response(string $param, array $data){
        $obj = array(
            $param => $data,
        );
        return $obj;
    }

    public function orderBy(){
    }

    public function all(){
        // $sql = 'SELECT * FROM '.$this->table;
        // $stmt = $this->connect()->query($sql);

        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // return $result;
    }

    public function groupBy(){

    }
    
    public function join(){

    }

    public function union(){

    }
    
    public function query(){
        
    }


    
}