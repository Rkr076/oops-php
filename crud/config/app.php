<?php

class DatabaseConnection
{
    
    private $servername="localhost";
    private $username="root";
    private $password="";
    private $dbname="test";
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if($this->conn->connect_error)
        {
            echo "Connection failed";
        }
        else
        {
           return $this->conn;
        }
    }

    public function registration($fname, $lname, $email, $password)
    {
        $register_query = "INSERT INTO `users`( `fname`, `lname`, `email`, `password`) 
        VALUES ('$fname', '$lname', '$email', '$password')";
        $register_query_run = $this->conn->query($register_query);
        return  $register_query_run;
    }

    public function isUserExist($email)
    {
        $checkuser = "SELECT email FROM `users` WHERE email ='email' LIMIT 1 ";
        $result = $this->conn->query($checkuser);
        if($result->num_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function confirmPassword($password, $c_password)
    {
        if($password==$c_password)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

}

?>