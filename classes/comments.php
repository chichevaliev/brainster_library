<?php 
class Comment {
    private $comment;
    private $bookID;
    private $dbObj;

public function __construct($dbObj,$comment,$bookID)
    {
        $this->setDbObj($dbObj);
        $this->setComment($comment);
        $this->setBookID($bookID);
        
    }


    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of bookID
     */ 
    public function getBookID()
    {
        return $this->bookID;
    }

    /**
     * Set the value of bookID
     *
     * @return  self
     */ 
    public function setBookID($bookID)
    {
        $this->bookID = $bookID;

        return $this;
    }

    /**
     * Get the value of dbObj
     */ 
    public function getDbObj()
    {
        return $this->dbObj;
    }

    /**
     * Set the value of dbObj
     *
     * @return  self
     */ 
    public function setDbObj($dbObj)
    {
        $this->dbObj = $dbObj;

        return $this;
    }

    public function create($user){
        $comment = $this->getComment();
        $bookID = $this->getBookID();
        $dbObj = $this->getDbObj();
        $sql = "INSERT INTO Commentars (content,bookID,user) VALUES(:comment,:bookID,:user)";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->bindParam(":comment", $comment, PDO::PARAM_STR);
        $pdo_statement->bindParam(":bookID", $bookID, PDO::PARAM_INT);
        $pdo_statement->bindParam(":user", $user, PDO::PARAM_STR);
        $pdo_statement->execute();

    }

    public function return(){
        $dbObj = $this->getDbObj();
        $sql = "SELECT * FROM Commentars c JOIN books b ON c.bookID=b.id WHERE is_approved IS NULL ";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->execute();
        $comments=[];
        while ($data = $pdo_statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($comments, $data);
        }
        return $comments;
    }

    public function approve($id){
        $dbObj = $this->getDbObj();
        $sql = "UPDATE `Commentars` SET `is_approved` = '1' WHERE `bookID` = $id ";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->execute();
    
    
    }

    public function disapprove($id){
        $dbObj = $this->getDbObj();
        $sql = " UPDATE `Commentars` SET `is_approved` = '0' WHERE `bookID` = $id ";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->execute();
    
    
    }

    public function returnDisaproved(){
        $dbObj = $this->getDbObj();
        $sql = "SELECT * FROM Commentars c JOIN books b ON c.bookID=b.id WHERE is_approved = 0 ";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->execute();
        $comments=[];
        while ($data = $pdo_statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($comments, $data);
        }
        return $comments;
    }

    public function returnAproved($bookID){
        $dbObj = $this->getDbObj();
        $sql = "SELECT c.id,c.content,c.user,c.is_approved,b.title FROM Commentars c JOIN books b ON c.bookID=b.id WHERE is_approved = 1 AND bookID = $bookID  ";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->execute();
        $comments=[];
        while ($data = $pdo_statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($comments, $data);
        }
        return $comments;
    }

    public function delete($id){
        $dbObj = $this->getDbObj();
        $sql = "DELETE FROM Commentars   WHERE id = $id ";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->execute();
}


    }
