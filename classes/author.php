<?php 
class Author {
private $firstName;
private $lastName;
private $bio;
private $dbObj;

public function __construct($dbObj,$firstName,$lastName,$bio)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setBio($bio);
        $this->setDbObj($dbObj);
    }

/**
 * Get the value of firstName
 */ 
public function getFirstName()
{
return $this->firstName;
}

/**
 * Set the value of firstName
 *
 * @return  self
 */ 
public function setFirstName($firstName)
{
$this->firstName = $firstName;

return $this;
}

/**
 * Get the value of lastName
 */ 
public function getLastName()
{
return $this->lastName;
}

/**
 * Set the value of lastName
 *
 * @return  self
 */ 
public function setLastName($lastName)
{
$this->lastName = $lastName;

return $this;
}

/**
 * Get the value of bio
 */ 
public function getBio()
{
return $this->bio;
}

/**
 * Set the value of bio
 *
 * @return  self
 */ 
public function setBio($bio)
{
$this->bio = $bio;

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
    $firstName = $this->getFirstName();
    $lastName = $this->getLastName();
    $bio = $this->getBio();
    $dbObj = $this->getDbObj();
    $sql = "INSERT INTO Authors(firstname,lastname,bio) VALUES(:firstname, :lastname, :bio)";
    $pdo_statement = $dbObj->prepare($sql);
    $pdo_statement->bindParam(":firstname", $firstName, PDO::PARAM_STR);
    $pdo_statement->bindParam(":lastname", $lastName, PDO::PARAM_STR);
    $pdo_statement->bindParam(":bio", $bio, PDO::PARAM_STR);
    $pdo_statement->execute();

}

public function return(){
    $dbObj = $this->getDbObj();
    $sql = "SELECT * FROM Authors WHERE is_deleted <> 1";
    $pdo_statement = $dbObj->prepare($sql);
    $pdo_statement->execute();
    $authors=[];
    while ($data = $pdo_statement->fetch(PDO::FETCH_ASSOC)) {
        array_push($authors, $data);
    }
    return $authors;
}


public function delete($id){
    $dbObj = $this->getDbObj();
    $sql = "UPDATE `Authors` SET `is_deleted` = '1' WHERE `Authors`.`id` = $id ";
    $pdo_statement = $dbObj->prepare($sql);
    $pdo_statement->execute();
}

public function update($id){
    $dbObj = $this->getDbObj();
    $firstName = $this->getFirstName();
    $lastName = $this->getLastName();
    $bio = $this->getBio();
    $sql = "UPDATE Authors SET firstname = '$firstName', lastname = '$lastName', bio = '$bio'  WHERE id = '$id' ";
    $pdo_statement = $dbObj->prepare($sql);
    $pdo_statement->execute();


}

public function returnRow($id){
    $dbObj = $this->getDbObj();
    $sql = "SELECT * FROM Authors WHERE is_deleted <> 1 AND id = '$id'";
    $pdo_statement = $dbObj->prepare($sql);
    $pdo_statement->execute();
    $authors=[];
    while ($data = $pdo_statement->fetch(PDO::FETCH_ASSOC)) {
        array_push($authors, $data);
    }
    return $authors;
}


}

