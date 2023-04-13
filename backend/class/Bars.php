<?php 
require_once 'DbConfig.php';

Class Bars extends DbConfig {

    private $titleBool;
    private $descriptionBool;
    private $bodyBool;


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

    public function getBar($ID){
        $sql = "SELECT * FROM bars WHERE ID = :ID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":ID", $ID);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updateBar($ID, $Title, $Description){

        try{
            $post = $this->getBar($ID);
            $sql = "UPDATE bars SET";
            if(!empty($Title) && $post->Title != $Title){
                $this->titleBool = true;
                $sql = $sql . " Title = :Title";
            }
            if($post->Description != $Description){
                if($this->titleBool){
                    $sql = $sql . ",";
                }
                $this->descriptionBool = true;
                $sql = $sql . " Description = :Description";
            }
           
            if($post->Description == $Description && $post->Title == $Title){
                Throw new Exception("Waardes waren niet veranderd.");
            }

            $sql = $sql . " WHERE ID = :ID";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":ID", $ID);
            if($this->titleBool)
                $stmt->bindParam(":Title", $Title);
            if($this->descriptionBool)
                $stmt->bindParam(":Description", $Description);
            if($stmt->execute()){
                header("Location: AllBars.php");
            }else{
                throw new Exception("De waardes kloppen niet.");
            }

        }catch(Exception $e){
            return $e->getMessage();
        } 
    }





}

?>


