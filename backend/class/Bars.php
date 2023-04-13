<?php 
require_once 'DbConfig.php';

Class Bars extends DbConfig {

    public function getAllBars(){
        $sql = "SELECT * FROM bars";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($data){
        try{
            $sql = "INSERT INTO bars (Title, Description, user_id) VALUES (:Title, :Description, 3)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":Title", $data['Title']);
            $stmt->bindParam(":Description", $data['Description']);
            if(!$stmt->execute()){
                throw new Exception("Post kon niet aangemaakt worden");
            }
            return;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }





}

?>


