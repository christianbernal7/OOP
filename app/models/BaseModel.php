<?php
namespace App\Models;

use Config\Database;
use PDO;

class BaseModel extends Database{

    private $request;
    
    // order by
    // group by
    // where
    // join
    // union
    // in array
    // query
    
    // Fetch All Columns
    public function get_all($table){
        $sql = "SELECT * FROM ".$table;
        $stmt = parent::connect()->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // get_where($this->tbl_name, array('id' => $id)); 
    // public function get_where(array $param){

    //     // Use a prepared statement to prevent SQL injection

    //     $result = array();
    //     foreach ($param as $key) {
    //         $result[] = $key .' = :'.$key;
    //     }
    //     $imp = implode(' and ',$result);
    //     $sql = "SELECT * FROM ".$this->table." WHERE".$imp;

    //     $stmt = $this->conn->prepare($sql);

    //     foreach ($param as $field => $value) {
    //         $stmt->bindParam(':'.$field, $value, PDO::PARAM_INT);
    //     }
    //     // $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $this->jsonResponse($result);
    // }

    public function order_by(){
    }

    public function group_by(){

    }
    
    public function join(){

    }

    public function union(){

    }
    
    public function query(){

    }
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

    protected function insert(array $data, $table = null){
        /* Begin a transaction, turning off autocommit */
        $this->connect()->beginTransaction();

        // Prepare the SQL statement
        $columns = implode(', ', array_keys($data)); // ✔  first_name, last_name, age, email, address, contact

        $placeholders = ':' . implode(', :', array_keys($data));  // ✔  :first_name, :last_name, :age, :email, :address, :contact

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";  // INSERT INTO users (first_name, last_name, age, email, address, contact) VALUES (:first_name, :last_name, :age, :email, :address, :contact)
       
        $stmt = $this->connect()->prepare($sql);

        // Bind parameters
        foreach ($data as $key => $value) {
            $stmt->bindParam(':'.$key, $data[$key]);     
        }
        // Execute the query
        $stmt->execute();
      
        // Get the last inserted ID
        $lastInsertedId = $this->connect()->lastInsertId();

        // Construct the response
        $response = [
            'status' => 'ok',
            'lastInsertedId' => $lastInsertedId,
        ];

        // Output the response
        return $this->jsonResponse($response);
    }



    public function update(array $data, $id,$table) {
    // Ensure the connection is active
    $conn = $this->connect();

    // Begin a transaction
    $conn->beginTransaction();

    // Prepare the SQL statement
    $setClause = implode(', ', array_map(function($key) {
        return "{$key} = :{$key}";
    }, array_keys($data))); // e.g., first_name = :first_name, last_name = :last_name, ...

    // Add condition to update specific rows
    $sql = "UPDATE {$table} SET {$setClause} WHERE id = :id";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    foreach ($data as $key => $value) {
        $stmt->bindParam(':' . $key, $data[$key]);
    }
    $stmt->bindParam(':id', $id);

    // Execute the query
    $stmt->execute();

    // Commit the transaction
    $conn->commit();

    // Construct the response
    $response = [
        'status' => 'ok',
        'affectedRows' => $stmt->rowCount(),
    ];

    // Output the response
    return $this->jsonResponse($response);
}


    public function delete($id,$table){
        $conn = $this->connect();

        $sql = "DELETE FROM .
        {$table} WHERE id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

     
    }
       


    public function find($search, $table){
        $conn = $this->connect();

        $sql = "SELECT * FROM {$table} WHERE first_name LIKE :search OR
         last_name LIKE :search OR age LIKE :search OR email LIKE :search";
         $sth = $conn->prepare($sql);

         $searchTerm = '%' . $search . '%';
         $sth->bindParam(':search', $searchTerm, PDO::PARAM_STR);

         $sth->execute();

         $rows = $sth->fetchAll(PDO::FETCH_ASSOC);

         return $rows;


    }




}