<?php
namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\UserModel as Insert;
class searchController extends Insert{

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
   
    private array $data;    
    
    // Identifier
    const SUCCESS = 'success';

    // Initilize Object Properties
    public function __construct()
    {
        $this->request = parent::parseRequest();
    }

    // Custom Method
    public function operations($search){  
    
        return $this->search($search);


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

       
        return $this->jsonResponse($response);
    }

    public static function getErrorResponse(){
        return "Invalid Operations";
    }

   
}