<?php

include_once('config/app.php');

$db = new DatabaseConnection();

if(isset($_POST['register_btn']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $confirm_password =  $_POST['confirm_password'];

   $register_password = $db->confirmPassword($password, $confirm_password);

   if($register_password)
   {
        $result_user = $db->isUserExist($email);
        if($result_user)
        {
            echo "Email already exists";
            header('Location:signlog.php');
        }

        else
        {
                $register_query = $db->registration($fname, $lname, $email, $password);
                if($register_query)
                {
                    echo "Registered successfully";
                    header('Location:signlog.php');
                }

                else
                {
                    echo "Something went wrong";
                    header('Location:signlog.php');
                }
        }
   }
   else
   {
      echo "password & confirm password does not match";
      header('Location:signlog.php');
   }
    

}


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login & Signup forms</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header text-center text-white bg-dark">
                            <h1>Signup Form</h1>
                        </div>
                        <div class="card-body">
                            
                            <form action="signlog.php" method="POST">
                                <div class="form-group mb-3 ">
                                    <label>First Name:</label>
                                    <input type="text" placeholder="Enter First name" name="fname" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3 ">
                                    <label>Last Name:</label>
                                    <input type="text" placeholder="Enter Last name" name="lname" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3 ">
                                    <label>Email:</label>
                                    <input type="text" placeholder="Enter Email" name="email" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password:</label>
                                    <input type="text" placeholder="Enter Password"  name="password" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Confirm Password:</label>
                                    <input type="text" placeholder="Enter Confirm Password"  name="confirm_password" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="submit" name="register_btn" value="register" class="btn btn-success" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header text-center text-white bg-dark">
                            <h1>Login Form</h1>
                        </div>
                        <div class="card-body">
                            <form action="signlog.php" method="POST">
                                <div class="form-group mb-3 ">
                                    <label class="font-weight-bold">Username:</label>
                                    <input type="text" placeholder="Enter username" name="uid" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password:</label>
                                    <input type="password" placeholder="Enter Password"  name="pwd" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="submit" name="login" value="login" class="btn btn-primary" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
<html>