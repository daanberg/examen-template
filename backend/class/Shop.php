<?php 
require_once 'DbConfig.php';

Class Shop extends DbConfig {

    public function getAllProducts(){
            $sql = "SELECT * FROM shop";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProduct($ID){
        $sql = "SELECT * FROM shop WHERE ID = :ID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":ID", $ID);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    
}