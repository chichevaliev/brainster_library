<?php


class Category {
    private $title ;
    private $dbObj;

    public function __construct($dbObj,$title)
    {
        $this->setTitle($title);
        $this->setDbObj($dbObj);
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

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

    public function create(){
        $title = $this->getTitle();
        $dbObj = $this->getDbObj();
        $sql = "INSERT INTO Categories (type) VALUES(:title)";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->bindParam(":title", $title, PDO::PARAM_STR);
        $pdo_statement->execute();

    }

    public function return(){
        $dbObj = $this->getDbObj();
        $sql = "SELECT * FROM Categories WHERE is_deleted <> 1";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->execute();
        $categories=[];
        while ($data = $pdo_statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($categories, $data);
        }
        return $categories;
    }

    public function delete($id){
        $dbObj = $this->getDbObj();
        $sql = "UPDATE `Categories` SET `is_deleted` = '1' WHERE `Categories`.`id` = $id ";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->execute();
}

public function update($id){
    $dbObj = $this->getDbObj();
    $title = $this->getTitle();
    $sql = "UPDATE `Categories` SET `type` = '$title' WHERE `id` = $id ";
    $pdo_statement = $dbObj->prepare($sql);
    $pdo_statement->execute();


}

public function returnRow($id){
    $dbObj = $this->getDbObj();
    $sql = "SELECT * FROM Categories WHERE is_deleted <> 1 AND id ='$id' ";
    $pdo_statement = $dbObj->prepare($sql);
    $pdo_statement->execute();
    $categories=[];
    while ($data = $pdo_statement->fetch(PDO::FETCH_ASSOC)) {
        array_push($categories, $data);
    }
    return $categories;
}
}