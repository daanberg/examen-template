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

    public function create($data){
        try{
            $sql = "INSERT INTO shop (Title, Description, Price, Img_URL) VALUES (:Title, :Description, :Price, :Img_URL)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":Title", $data['Title']);
            $stmt->bindParam(":Description", $data['Description']);
            $stmt->bindParam(":Price", $data['Price']);
            $stmt->bindParam(":Img_URL", $data['Img_URL']);
            if(!$stmt->execute()){
                throw new Exception("Product kon niet aangemaakt worden");
            }
            return;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    
}