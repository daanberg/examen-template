<?php
require_once 'DbConfig.php';

Class User extends DbConfig {


    public function getUser($Email){
        $sql = "SELECT * FROM users WHERE Email = :Email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":Email", $Email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function create($data){
        try{
            if($data['Password'] != $data['conf-password']){ //kijkt of wachtwoorden gelijk zijn
                throw new Exception("Wachtwoorden komen niet overeen.");
            }
            $sql = "INSERT INTO users (Email, Password, Active) VALUES (:Email, :Password, 1 )"; //slaat shit op in db + zet user op actief
            $encryptedPassword = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]); //password encrypt
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":Email", $data['Email']);
            $stmt->bindParam(":Password", $encryptedPassword);
            if(!$stmt->execute()){
                throw new Exception("Account kon niet aangemaakt worden."); 
            }
            header("Location: login.php"); //als registratie gelukt is redirect die naar de login pagina
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }


    public function login($data){
        try{
            $user = $this->getUser($data['Email']);
            if(!$user){
                throw new Exception("Gebruiker bestaat niet.");
            }
            if(!password_verify($data['Password'], $user->Password)){
                throw new Exception("Wachtwoord is incorrect.");
            }
            session_start();
            $_SESSION['ingelogd'] = true;
            $_SESSION['Email'] = $user->Email;
            $_SESSION['user_id'] = $user->ID;
            header("Location: backend/admin.php");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function getAuthorNameById($ID){
        $sql = "SELECT concat(First_Name, ' ', Last_Name) AS name FROM users WHERE ID = :ID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":ID", $ID);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}

?>