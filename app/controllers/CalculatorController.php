<?php
namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\UserModel as Insert;
class CalculatorController extends Insert{

    use ExtraController;

    // Properties
    public  string $firstname;
    public  string $lastname;
    public int $age;
    public string $email;
    public string $contact;
    public string $address;
    public $request;
    public $result;
    // public string $operator;
    // public int $num1;
    // public int $num2;
    // public $request;
    // public $result;

    private array $data;    
    
    // Identifier
    const SUCCESS = 'success';

    // Initilize Object Properties
    public function __construct()
    {
        $this->request = parent::parseRequest();
    }

    // Custom Method
    public function operations(array $data){
        
            $this->firstname    = $data['first_name'];
            $this->lastname    = $data['last_name'];
            $this->age          = $data['age'];
            $this->email        = $data['email'];
            $this->contact        = $data['contact'];
            $this->address        = $data['address'];


            // $params = [
            //     'first_name' => $data['firstname'],
            //     'last_name' =>  $data['lastname'],
            //     'age' => $data['age'],
            //     'email' => $data['email'],
            //     'address' => $data['address'],
            //     'contact' => $data['contact'],
            // ];
            // print_r($params); exit;
            // $result = array ($this->firstname, $this->age, $this->email);
      


        // // Get Requested Data
        // $this->operator     = $data['operator'];
        // $this->num1         = $data['first_number'];
        // $this->num2         = $data['second_number'];
        
        // // Computation
        // $result = match ($this->operator) {
        //     'addition'          => $this->num1 + $this->num2,
        //     'subtraction'       => $this->num1 - $this->num2,
        //     'multiplication'    => $this->num1 * $this->num2,
        //     'division'          => $this->num1 / $this->num2,
        //     default             => $this->getErrorResponse(),
        // };


        // $response = array(
        //     'result'    => $result,
        //     'MagicConstant' => array(
        //         'CLASS'     => __CLASS__,
        //         'DIRECTORY' => __DIR__,
        //         'FILE'      => __FILE__,
        //         'FUNCTION'  => __FUNCTION__,
        //         'METHOD'    => __METHOD__,
        //         'LINE'      => __LINE__,
        //         'NAMESPACE' => __NAMESPACE__,
        //     ),
        //     'status'    => self::SUCCESS,
        //     'message'   => $this->extraMessage().$this->errorMessage(),
        // );
        
        // $this->result = $result;

        return $this->post($data);
    }


    

    
    public function answer(){
        $type = 'POST';

        $response = array(
            'status'    => self::SUCCESS,
            // 'method'    => parent::METHOD[$type],
            'firstname'  => $this->firstname,
            'lastname'  => $this->lastname,
            'age'  => $this->age,
            'email'  => $this->email,
            'contact'  => $this->contact,
            'address'  => $this->address,

  
        );

        // $response = parent::response('response',[
        //     'status'    => self::SUCCESS,
        //     'method'    => parent::METHOD[$type],
        //     'result'    => $this->result,
        // ]);

        // return parent::render('Account',[
        //     'name' => 'whyllardermie',
        //     'email' => 'whyllardermie@gmail.com'
        // ]);
        // // Static    

        return $this->jsonResponse($response);
    }

    public static function getErrorResponse(){
        return "Invalid Operations";
    }

   
    // public function test(){

    //     $response = array(
    //         'result' => 'success',
    //         'timeStamp' => $this->ping(),
    //     );

    //     return $this->jsonResponse($response);

    // }

    // public static function getName(): void{
    //    self::SUCCESS;
    // }

    // public function setName(): string{

    //     $name   = $this->request['name'];
    //     $email  = $this->request['email'];
    //     $age    = $this->request['age'];

    //     $response = array(
    //         "status"    => self::SUCCESS,
    //         "name"      => $name,
    //         "email"     => $email,
    //         "age"       => $age
    //     );
        
    //     return $this->jsonResponse($response);
    // }

}

