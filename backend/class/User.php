<?php
require_once 'DbConfig.php';

Class User extends DbConfig {

    public function create($data){
        try{
            if($data['password'] != $data['conf-password']){
                throw new Exception("Wachtwoorden komen niet overeen.");
            }
            $sql = "INSERT INTO users (Email, password) VALUES (:Email, :password)";
            $encryptedPassword = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":Email", $data['Email']);
            $stmt->bindParam(":password", $encryptedPassword);
            if(!$stmt->execute()){
                throw new Exception("Account kon niet aangemaakt worden.");
            }
            header("Location: login.php");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

}

?>