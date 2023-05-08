<?php session_start();
include('data.php');




?>
<!doctype html>
<html lang="en">
  <head>
        <title>List</title>
        <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css”/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://write.corbpie.com/wp-content/litespeed/localres/aHR0cHM6Ly9jZG5qcy5jbG91ZGZsYXJlLmNvbS8=ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"/>
    <script src="https://write.corbpie.com/wp-content/litespeed/localres/aHR0cHM6Ly9jZG5qcy5jbG91ZGZsYXJlLmNvbS8=ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://write.corbpie.com/wp-content/litespeed/localres/aHR0cHM6Ly9jZG5qcy5jbG91ZGZsYXJlLmNvbS8=ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://write.corbpie.com/wp-content/litespeed/localres/aHR0cHM6Ly9jZG5qcy5jbG91ZGZsYXJlLmNvbS8=ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://write.corbpie.com/wp-content/litespeed/localres/aHR0cHM6Ly9jZG5qcy5jbG91ZGZsYXJlLmNvbS8=ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css"/>
  </head>
  <body>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4 ">
            <?php if(isset($_SESSION['message'])):?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
               <?php 
               unset($_SESSION['message']);
               endif?> 


            <div class="card">
              
                <div class="card-header">
                    <h4>List
                    <a href="addlist.php" class="btn btn-primary float-end">Add List</a>
                    </h4>

                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover" id="alldata">
                  <thead>
                    <tr>
                     
                    <th>Profile</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Date_Of_Birth</th>
                      <th>Phone</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>Image </th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                  $sql = "select * from addlist";
                  $statement = $conn->prepare($sql);
                  $statement->execute();

                  $statement->setFetchMode(PDO::FETCH_OBJ);
                  $result = $statement->fetchAll();
                  


                  if($result){

                    foreach($result as $row){

                      ?>
                      <tr>
                      <td><img src="<?= $row->profile; ?>" class="rounded-circle"  width="60" height="60"></td>
                      <td><?= $row->name; ?></td>
                      <td><?= $row->email; ?></td>
                      <td><?= $row->dob; ?></td>
                      <td><?= $row->phone; ?></td>

                      <td>
                        
                        <a href="listedit.php?id=<?= $row->id;?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i>
                      <td>
                        <form action="delete.php" method="POST">
                          <button type="submit" name="delete" value="<?= $row->id;?>" class="btn btn-danger" ><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                  
                    <td>
                    <a href="profile.php?id=<?= $row->id;?>" class="btn btn-success"><i class="bi bi-image"></i></a>

                    </td>


                    </tr>
                      <?php

                    }

                  }else{
                    ?> 
                    
                    <tr>
                      <td colspan="5">No records found</td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
  <script type="application/javascript">
    $(document).ready(function () {
        $('#alldata').DataTable({"pageLength": 5, "order": []});
    });
</script>
</html>