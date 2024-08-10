<?php 
class User {
    private $email;
    private $password;
    private $username;
    private $dbObj;

    public function __construct($dbObj,$email,$password,$username){
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setUsername($username);
        $this->setDbObj($dbObj);

    }


    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

/**
 * Get the value of username
 */ 
public function getUsername()
{
return $this->username;
}

/**
 * Set the value of username
 *
 * @return  self
 */ 
public function setUsername($username)
{
$this->username = $username;

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
        $email = $this->getEmail();
        $password = md5($this->getPassword());
        $username = $this->getUsername();
        $dbObj = $this->getDbObj();
$sql = "INSERT INTO Users (email,password,username) VALUES(:email,:pass,:username)";
$pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->bindParam(":email", $email, PDO::PARAM_STR);
        $pdo_statement->bindParam(":pass", $password, PDO::PARAM_STR);
        $pdo_statement->bindParam(":username", $username, PDO::PARAM_STR);
        $pdo_statement->execute();

}
public function return(){
    $dbObj = $this->getDbObj();
    $sql = "SELECT * FROM Users";
    $pdo_statement = $dbObj->prepare($sql);
    $pdo_statement->execute();
    $user=[];
    while ($data = $pdo_statement->fetch(PDO::FETCH_ASSOC)) {
        array_push($user, $data);
    }
    return $user;
}

}



