<?php
session_start();
include('data.php');
if(isset($_POST['upload']))
{

    $list_id = intval($_GET['id']);

    $allow = array("jpeg"=>"image/jpeg", "gif"=>"image/gif", "png"=>"image/png", "svg"=>"image/svg+xml", "webp"=>"image/webp");

    $filename = $_FILES['file']['name'];
    $filetemp = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $location = 'upload/'.$filename;

    if(!array_key_exists($ext, $allow)) die("Please Select Valid File Format");
    if(!file_exists('upload/'.$_FILES['file']['name'])){
        if(move_uploaded_file($filetemp, $location)){
            try{
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "update addlist set profile='$location' where id = '$list_id'";
                $conn->exec($sql);

            }catch(PDOException $e){
                echo $e->getMessage();
            }
            $conn ='null';
    $_SESSION['message']="Image Inserted Successfully";

    echo"<script>window.location.href='index.php'</script>";


        }
    }else{
    $_SESSION['message']="Image already Exists";
        
    }

}
?>
<!doctype html>
<html lang="en">
  <head>
        <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css”/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body>

  <?php 
  
  $list_id = intval($_GET['id']);
  $sql = "select * from addlist where id='$list_id'";
  $query = $conn->prepare($sql);
  $query->execute();
  $result = $query->fetch();

  ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 ">
            <?php if(isset($_SESSION['message'])):?>
                    <h5 class="alert alert-danger"><?= $_SESSION['message']; ?></h5>
               <?php 
               
               endif?> 
               <div class="card">

                <div class="card-header">

                    <h4>Profile

                    <a href="index.php" class="btn btn-danger float-end">Back</a>

                    </h4>
                </div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Upload Image</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <button type="submit" name="upload" class="btn btn-success">Upload</button>
                    <button type="reset" name="upload" class="btn btn-danger float-end">Reset</button>

                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>