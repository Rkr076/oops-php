<?php

class model{
   
    private $servername="localhost";
    private $username="root";
    private $password="";
    private $dbname="testi";
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

    // function define for insert records
    public function insertRecord($post)
    {
       $name = $post['name'];
       $age = $post['age'];
       $city = $post['city'];
       $sql = "INSERT INTO `info`(`name`, `age`, `city`) VALUES ('$name','$age','$city')";
       $result = $this->conn->query($sql);
       if($result)
       {
        header("Location:index.php?msg=ins");
       }
       else
       {
         echo "Error ".$sql."<br>".$this->conn->error();
       }
    }// Insert function close.
    

    //Display all records
    public function displayRecord()
    {
        $sql = "SELECT * FROM `info` ";
        $result = $this->conn->query($sql) ;
        if($result->num_rows > 0)

        {
            while($row = $result->fetch_assoc())
            {
                $data[] = $row;
            }

            return $data;
        }
    }

    // Display records by Id
    public function displayRecordsById($editid)
    {
        $sql = "SELECT * FROM `info` WHERE id = '$editid' ";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            return $row;
        }

    }

    //update function
    public function updateRecord($post)
    {
       $name = $post['name'];
       $age = $post['age'];
       $city = $post['city'];
       $hid= $post['hid'];
       $sql = "UPDATE `info` SET `name`='$name',`age`='$age',`city`='$city' WHERE id = $hid  ";
       $result = $this->conn->query($sql);
       
    }// update function close.

    // Delete record
    public function deleteRecord($delid)
    {
        $sql = "DELETE FROM `info` WHERE id = $delid ";
        $result = $this->conn->query($sql);
        return $sql;
        if($result)
        {
           echo "Deleted succesfully";
        }

        else
        {
           echo "Not Deleted";
        }

    }


}



?>