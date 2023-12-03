<?php

    class database
    {
        public function connect()
        {
            $this->server = "localhost";
            $this->user = "root";
            $this->pass="";
            $this->db = "test";

            $conn = new mysqli($this->server, $this->user, $this->pass, $this->db);
            return $conn;

        }
    
    }

    class queries extends database
    {
        public function getData()
        {
           $sql = "SELECT * FROM info";
           $data = $this->connect()->query($sql);
           if($data->num_rows > 0)
           {
             while($result = $data->fetch_assoc())
             {
                $arr[] = $result;
             }

             return $arr;

           }
           else
           {
              echo "Data not exists";
           }
           
        }

        public function addData($data)
        {
            $stu_name = $data['name'];
            $age = $data['age'];
            $city = $data['city'];
            $sql = "INSERT INTO `info`(`student_name`, `age`, `city`) VALUES ('$stu_name','$age','$city')";
            $data = $this->connect()->query($sql);

            if($data)
            {
                echo "Data Inserted";
            }
            else
            {
                echo "Data not Inserted";
            }
        }

        public function showDataUpdate($id)
        {
            $sql = "SELECT * FROM info WHERE id = $id  ";
            $data = $this->connect()->query($sql);
            $result = $data->fetch_assoc();
            return $result;
        }
    } 

    $obj1 = new queries();
    $fetch_data = $obj1->getData();


    if(isset($_POST['submit']))
    {
       $obj1->addData($_POST);
    }

   


?>