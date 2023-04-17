<?php 
require_once 'DbConfig.php';

Class Shop extends DbConfig {

    private $titleBool;
    private $descriptionBool;
    private $priceBool;
    private $Img_URLBool;
    

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


    public function updateProduct($ID, $Title, $Description, $Price, $Img_URL){

        try{
            $post = $this->getProduct($ID);
            $sql = "UPDATE shop SET";
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
            if($post->Price != $Price){
                if($this->titleBool || $this->descriptionBool){
                    $sql = $sql . ",";
                }
                $this->priceBool = true;
                $sql = $sql . " Price = :Price";
            }
            if($post->Img_URL != $Img_URL){
                if($this->titleBool || $this->descriptionBool || $this->priceBool){
                    $sql = $sql . ",";
                }
                $this->Img_URLBool = true;
                $sql = $sql . " Img_URL = :Img_URL";
            }

           
            if($post->Description == $Description && $post->Title == $Title && $post->Price == $Price && $post->Img_URL == $Img_URL){
                Throw new Exception("Waardes waren niet veranderd.");
            }

            $sql = $sql . " WHERE ID = :ID";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":ID", $ID);
            if($this->titleBool)
                $stmt->bindParam(":Title", $Title);
            if($this->descriptionBool)
                $stmt->bindParam(":Description", $Description);
            if($this->priceBool)
                $stmt->bindParam(":Price", $Price);  
            if($this->Img_URLBool)
                $stmt->bindParam(":Img_URL", $Img_URL); 
            if($stmt->execute()){
                header("Location: AllProducts.php");
            }else{
                throw new Exception("De waardes kloppen niet.");
            }

        }catch(Exception $e){
            return $e->getMessage();
        } 
    }


    
}