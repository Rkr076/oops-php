<?php

include('conn.php');

  if(isset($_GET['id']))
    {

       $showInputData = $obj1->showDataUpdate($_GET['id']);

    }
  else
    {

       $showInputData = '' ;

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD TABLE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between " >
                            
                           <h5 class="card-title text-center" style="font-family: sans-serif;font-weight: 600;font-size: 1.5rem;">Bootstrap Forms</h5>
                           <a href="view-data.php" class="btn btn-primary">View records</a>
                        </div>
                        <div class="card-body">    
                            <form method="POST" action="conn.php"> 
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" 
                                    value ="" placeholder="Enter name" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label>Age</label>
                                    <input type="text" class="form-control" name="age" value="<?= $showInputData['age']; ?>" placeholder="Enter Age" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" value="<?= $showInputData['city']; ?>" placeholder="Enter city" autocomplete="off">
                                </div>

                                <?php
                                  
                                  if(isset($_GET['id']))

                                  {

                                    ?>

                                    <button type="submit" name="update" class="btn btn-success">Update</button>

                                    <?php
                                    
                                  }

                                  else
                                  {

                                    ?>

                                      <button type="submit" name="submit" class="btn btn-success">Submit</button>

                                    <?php
                                  }

                                ?>
                                
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>