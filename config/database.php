<?php
namespace Config;

use PDO;

class Database{

    private array $creds = [
        'host'          => 'localhost',
        'username'      => 'root',
        'password'      => '',
        'database_name' => 'sample'
    ];

    const DB_CONNECTION = [
        'SUCCESS'   => 'Connection Success',
        'FAILED'    => 'Connection Failed',
    ];

    public function connect(){
        
        // DataSource Name
        $dsn = 'mysql:host='.$this->creds['host'].';dbname='.$this->creds['database_name'];
        
        // PDO COnnection
        $pdo = new PDO(
            $dsn,
            $this->creds['username'],
            $this->creds['password']
        );

        $pdo->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE, 
            PDO::FETCH_ASSOC
        );
       
        // if ($pdo) {
        //     echo "Succes";
        // }


        return $pdo; 

    }


}



// $obj = new Database();

// print_r($obj->connect()); exit;