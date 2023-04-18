<?php
require_once 'DbConfig.php';

Class User extends DbConfig {

    private $FnameBool;
    private $LnameBool;
    private $EmailBool;
    private $UnameBool;


    public function getUser($Email){
        $sql = "SELECT * FROM users WHERE Email = :Email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":Email", $Email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getAuthorUsernameById($user_id){
        $sql = "SELECT concat(First_Name, ' ', Last_Name) as Name FROM users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $user_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function create($data){
        try{
            if($data['Password'] != $data['conf-password']){ //kijkt of wachtwoorden gelijk zijn
                throw new Exception("Wachtwoorden komen niet overeen.");
            }
            $sql = "INSERT INTO users (Email, Password, Active) VALUES (:Email, :Password, 1 )"; //slaat shit op in db + zet user op actief
            $encryptedPassword = password_hash($data['Password'], PASSWORD_BCRYPT, ['cost' => 12]); //password encrypt
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
            $_SESSION['username'] = $user->username;

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

    public function logout(){
        session_start();
        $_SESSION = null;
        session_unset();
        session_destroy();
        header("Location: ../../index.php");
    }

    public function updateUser($First_Name, $Last_Name, $Email, $username){
        try{
            $post = $this->getUser($Email);
            $sql = "UPDATE users SET";
            if(!empty($First_Name) && $post->First_Name != $First_Name){
                $this->FnameBool = true;
                $sql = $sql . " First_Name = :First_Name";
            }
            if($post->Last_Name != $Last_Name){
                if($this->FnameBool){
                    $sql = $sql . ",";
                }
                $this->LnameBool = true;
                $sql = $sql . " Last_Name = :Last_Name";
            }
            if($post->Email != $Email){
                if($this->FnameBool || $this->LnameBool){
                    $sql = $sql . ",";
                }
                $this->EmailBool = true;
                $sql = $sql . " Email = :Email";
            }
            if($post->username != $username){
                if($this->FnameBool || $this->LnameBool || $this->EmailBool){
                    $sql = $sql . ",";
                }
                $this->UnameBool = true;
                $sql = $sql . " username = :username";
            }

           
            if($post->Last_Name == $Last_Name && $post->First_Name == $First_Name && $post->Email == $Email && $post->username == $username){
                Throw new Exception("Waardes waren niet veranderd.");
            }

            $sql = $sql . " WHERE Email = :Email";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":Email", $Email);
            if($this->FnameBool)
                $stmt->bindParam(":First_Name", $First_Name);
            if($this->LnameBool)
                $stmt->bindParam(":LnameBool", $Last_Name);
            if($this->EmailBool)
                $stmt->bindParam(":Email", $Email);  
            if($this->UnameBool)
                $stmt->bindParam(":username", $username); 
            if($stmt->execute()){
                header("Location: admin.php");
            }else{
                throw new Exception("De waardes kloppen niet.");
            }

        }catch(Exception $e){
            return $e->getMessage();
        } 
    }
}

?>