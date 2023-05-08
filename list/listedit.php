<?php include('data.php');
session_start();

if(isset($_POST['update'])){

    $list_id =intval($_GET['id']);
    $ename = $_POST['ename'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $mob = $_POST['mob'];

    $sql = "update addlist set name=:en, email=:em, dob=:dob, phone=:mob where id=:lid" ;

    $query = $conn->prepare($sql);
    $query->bindParam('en', $ename, PDO::PARAM_STR);
    $query->bindParam('em', $email, PDO::PARAM_STR);
    $query->bindParam('dob', $dob, PDO::PARAM_STR);
    $query->bindParam('mob', $mob, PDO::PARAM_STR);
    $query->bindParam('lid', $list_id, PDO::PARAM_STR);

    $query->execute();
    $_SESSION['message']="Updated Successfully";
    echo"<script>window.location.href='index.php'</script>";

   
} else{
    $_SESSION['message']="Not Updated";
}
?>
<!doctype html>
<html lang="en">
  <head>
        <title>Edit List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css”/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body>

<div class="container">
    <div class="row ">
        <div class="col-md-12 mt-5 ">
            <div class="card">
                <div class="card-header">
                    <h4>Edit List  

                    <a href="index.php" class="btn btn-danger float-end">Back</a>

                    </h4>
                </div>
                <div class="card-body">

                <?php
                if(isset($_GET['id'])){
                    $list_id = $_GET['id'];

                    $sql = "select * from addlist where id=:list_id limit 1";
                    $statement = $conn->prepare($sql);
                    $data=[':list_id'=> $list_id];
                    $statement->execute($data);

                    $result = $statement->fetch(PDO::FETCH_OBJ);
                    
                }
                ?>

                <form action="" method="POST">
                    <input type="hidden" name='id' value="<?= $result->id; ?>" >
                    <div class="mb-3">
                        <label >Name</label>
                        <input type="text" class="form-control" value="<?= $result->name; ?>" name="ename">
                    </div>

                    <div class="mb-3">
                        <label >Email</label>
                        <input type="text" class="form-control" value="<?= $result->email; ?>"  name="email">
                    </div>

                    <div class="mb-3">
                        <label >Date_Of_Birth</label>
                        <input type="date" class="form-control" value="<?= $result->dob; ?>"  name="dob">
                    </div>

                    <div class="mb-3">
                        <label >Mobile</label>
                        <input type="text" class="form-control" value="<?= $result->phone; ?>"  name="mob">
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="update" class="btn btn-primary" >Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>