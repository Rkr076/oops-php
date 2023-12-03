<?php

include('conn.php');

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
    <h1>Show data</h1>
        <div class="container">
            <table class="table table-bordered ">
                <thead class="table-success">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         
                        foreach($fetch_data as $arr)
                        {
                         ?>
                            <tr>
                                <td><?= $arr['id'];  ?></td>
                                <td><?= $arr['student_name'];  ?></td>
                                <td><?= $arr['age'];  ?></td>
                                <td><?= $arr['city'];  ?></td>
                                <td>
                                    <a href="add-data.php?id=<?= $arr['id'];  ?>" class="btn btn-primary">Edit</a>
                                    <a href="conn.php?id=<?= $arr['id'];  ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                         <?php
                       }
                    ?>
                    
                </tbody>
            </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>