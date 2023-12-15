<?php

include 'model.php';
$m1 = new model();


//insert data into database
if(isset($_POST['submit']))
{
    
    $m1->insertRecord($_POST);
}


// Update records
if(isset($_POST['update']))
{
     $m1->updateRecord($_POST);
    
}


// Delete records
if(isset($_GET['deleteid']))
{
    $delid = $_GET['deleteid'];
    $deleteData = $m1->deleteRecord($delid);
    
}


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-info">Bootstrap Form</h1>
                    </div>
                    <div class="card-body">
                            
                        <?php
                        if(isset($_GET['msg']) AND $_GET['msg']='ins')
                        {
                            echo '<div class="alert alert-primary" role="alert">
                                Records Inserted successfully !
                            </div>';
                        }

                        ?>

                        <?php
                        // Display records by Id
                            if(isset($_GET['editid']))
                            {
                                $editid = $_GET['editid'];
                                $singleData = $m1->displayRecordsById($editid);

                        ?>
                            <form action="index.php" method="POST">
                                <div class="form-group mb-3">
                                    <label>Name:</label>
                                    <input type="text" placeholder="enter name" value="<?php echo $singleData['name']; ?>" name="name" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Age:</label>
                                    <input type="text" placeholder="enter Age" value="<?php echo $singleData['age']; ?>" name="age" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label>City:</label>
                                    <input type="text" placeholder="enter City" value="<?php echo $singleData['city']; ?>" name="city" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="hidden" name="hid" value="<?php echo $singleData['id']; ?>" >
                                    <input type="submit" name="update" value="update" class="btn btn-info" >
                                </div>
                            </form>

                        
                        <?php

                            }

                            else
                            {
                                ?>

                            <form action="index.php" method="POST">
                                <div class="form-group mb-3">
                                    <label>Name:</label>
                                    <input type="text" placeholder="enter name"  name="name" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Age:</label>
                                    <input type="text" placeholder="enter Age"  name="age" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label>City:</label>
                                    <input type="text" placeholder="enter City"  name="city" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="submit" name="submit" value="submit" class="btn btn-info" >
                                </div>
                            </form>

                                <?php
                            }
                        ?>
                        <br/>
                        <br/>
                        <table class="table table-striped ">
                            <thead class="table-dark text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>City</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sno=0;
                            $data = $m1->displayRecord();
                            foreach($data as $val)
                            {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo ++$sno;  ?></th>
                                    <td><?php echo $val['name']  ?></td>
                                    <td><?php echo $val['age']  ?></td>
                                    <td><?php echo $val['city']  ?></td>
                                    <td>
                                        <a href="index.php?editid=<?php echo $val['id'];  ?>" class="btn btn-success">Edit</a>
                                        <a href="index.php?deleteid=<?php echo $val['id'];  ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>

                            <?php
                            }


                            ?> 
        
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>