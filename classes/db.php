<?php

class Connection
{
    private $host;
    private $dbName;
    private $dbType;
    private $username;
    private $password;
    private $connection;

    public function __construct($dbType, $host, $dbName, $username, $password)
    {
        $this->setDbType($dbType);
        $this->setHost($host);
        $this->setDbName($dbName);
        $this->setUsername($username);
        $this->setPassword($password);
    }

    public function connect()
    {
        $host = $this->getHost();
        $dbName = $this->getDbName();
        $dbType = $this->getDbType();
        $username = $this->getUsername();
        $password = $this->getPassword();

        try {
            $connection = new PDO("$dbType:host=$host;dbname=$dbName", $username, $password);
            $this->setConnection($connection);
        } catch (\PDOException $err) {
            echo $err->getMessage();
            die();
        }
    }

    /**
     * Get the value of host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set the value of host
     *
     * @return  self
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get the value of dbName
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * Set the value of dbName
     *
     * @return  self
     */
    public function setDbName($dbName)
    {
        $this->dbName = $dbName;

        return $this;
    }

    /**
     * Get the value of dbType
     */
    public function getDbType()
    {
        return $this->dbType;
    }

    /**
     * Set the value of dbType
     *
     * @return  self
     */
    public function setDbType($dbType)
    {
        $this->dbType = $dbType;

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
     * Get the value of connection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Set the value of connection
     *
     * @return  self
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;

        return $this;
    }
}
