<?php 
class Note {
    private $note;
    private $bookID;
    private $dbObj;

    public function __construct($dbObj,$note,$bookID)
    {
        $this->setDbObj($dbObj);
        $this->setNote($note);
        $this->setBookID($bookID);
        
    }

    /**
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote($note)
    {
        $this->note = $note;

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
        $note = $this->getNote();
        $bookID = $this->getBookID();
        $dbObj = $this->getDbObj();
        $sql = "INSERT INTO Notes (content,bookID,user) VALUES(:note,:bookID,:user)";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->bindParam(":note", $note, PDO::PARAM_STR);
        $pdo_statement->bindParam(":bookID", $bookID, PDO::PARAM_INT);
        $pdo_statement->bindParam(":user", $user, PDO::PARAM_STR);
        $pdo_statement->execute();

    }

    public function return($user){
        $dbObj = $this->getDbObj();
        $bookID = $this->getBookID();
        $sql = "SELECT n.id,n.content,n.user,b.title FROM Notes n JOIN Books b ON n.bookID=b.id WHERE user = '$user' AND bookID = '$bookID' ";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->execute();
        $notes=[];
        while ($data = $pdo_statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($notes, $data);
        }
        return $notes;
    }

    public function delete($id){
        $dbObj = $this->getDbObj();
        $sql = "DELETE FROM Notes   WHERE id = $id ";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->execute();
}

public function update($id){
    $dbObj = $this->getDbObj();
    $note = $this->getNote();
    $sql = "UPDATE `Notes` SET `content` = '$note' WHERE `id` = $id ";
    $pdo_statement = $dbObj->prepare($sql);
    $pdo_statement->execute();


}
}


