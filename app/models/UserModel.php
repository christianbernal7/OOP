<?php
namespace App\Models;

use PDO;


// class UserModel extends Database{
    
class UserModel extends BaseModel{

    private string $table = 'users';
    
    public function search($search){
        return parent::find($search,$this->table);
    }

    public function get(){
        $result = [];

        $sql = 'SELECT * FROM ' . $this->table;
        $stmt = $this->connect()->query($sql);
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        
        return $result;
        
 
    }

    public function patch(array $data, $searchid){
        return parent::update($data, $searchid, $this->table);
        
    }

    public function remove($id){
        return parent::delete($id, $this->table);
        
    }

    public function post(array $data){
        return parent::insert($data, $this->table);
    }

    // Fetch Users Data
    // protected function show(){
    //     $query = $this->get_all($this->table);
    //     return $query;
    // }

    
    // public function getRows(){
    //     $sql = 'SELECT * FROM '.$this->table;
    //     $stmt = $this->connect()->query($sql);

    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     $query = parent::get_all($this->table);

    //     return $query;
    // }
        

    // protected function getAllUsers(){
        
    //     $result = [];

    //     $sql = 'SELECT * FROM '.$this->table;
    //     $stmt = $this->connect()->query($sql);

    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     while ($row = $stmt->fetch()) {
    //        $result[] = $row;
    //     }
        
    //     return $result;
 

    // }

    // public function getUser($param): string{
       
    //     $sql = "SELECT * FROM users where id = '$param'";
    //     $stmt = $this->connect()->query($sql);
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $this->jsonResponse($result);
    // }
    // protected function getUser($userId){
    //     // Use a prepared statement to prevent SQL injection
    //     $sql = "SELECT * FROM ".$this->table." WHERE id = :id";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $this->jsonResponse($result);
    // }

    // public function fetchUser(array $param){
    //     // $query = parent::get_where($param);
    //     // return $this->jsonResponse($query);
    // }



    protected function addUser(array $data){
        /* Begin a transaction, turning off autocommit */
        $this->connect()->beginTransaction();
        $sql = "INSERT INTO ".$this->table." (first_name, last_name, age, email, address, contact) VALUES (:firstname, :lastname, :age, :email, :address, :contact)";
        $stmt = $this->connect()->prepare($sql);
        
        $stmt->bindParam(':firstname', $data['firstname']);
        $stmt->bindParam(':lastname', $data['lastname']);
        $stmt->bindParam(':age', $data['age']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':contact', $data['contact']);
        
        $stmt->execute();

        $response = array(
            'status' => 'ok',
            'lastInsertedId' => $this->connect()->lastInsertId(),
        );
    
        return $this->jsonResponse($response);
    }


}

