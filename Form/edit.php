<?php 
session_start();

include('database.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM addlist2 WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $mob = $_POST['mob'];
    $image = $_FILES['image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
       
    } else {
        $stmt = $conn->prepare("SELECT profile FROM addlist2 WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $old_image = $stmt->fetchColumn();

        $stmt = $conn->prepare("UPDATE addlist2 SET profile=:image, name=:name, email=:email, dob=:dob, phone=:mob WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':mob', $mob);

        if($stmt->execute()) {
            if(file_exists($target_dir.$old_image)) {
                unlink($target_dir.$old_image);
            }
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $_SESSION['message']="updated Successfully";
            echo"<script>window.location.href='form.php'</script>";
        } else {
            echo "Data not updated!";
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body>

  <div class="container">
       <div class="row">
               <div class="col-md-12 mt-4 ">

               <div class="card">
        <div class="card-header">
            
        <h3>Update List
        <a href="form.php" class="btn btn-danger float-end"><i class="bi bi-arrow-left-circle"></i>&nbsp; Back</a></h3>

        </div>
        <div class="card-body">




<form  method="POST" enctype="multipart/form-data">

  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

  <div class="mb-3">

  <label class="form-label" >Name</label>  
<input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
  </div>

<div class="mb-3">
<label class="form-label" >email</label>  

  <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control">
</div>

<div class="mb-3">
<label class="form-label" >DOB</label>  

  <input type="date" name="dob" value="<?php echo $row['dob']; ?>" class="form-control">

</div>

<div class="mb-3">
<label class="form-label" >Phone</label>  

  <input type="number" name="mob" value="<?php echo $row['phone']; ?>" class="form-control">

</div>

  <div class="mb-3">
  <label class="form-label">Profile</label>  

<img src="images/<?php echo $row['profile']; ?>" height="100" width="100" class="rounded-circle"  >
  </div>

  <input type="file" name="image" class="form-control" >

  <br>
  <br>
  <input type="submit" name="update" value="Update" class="btn btn-success">
  <input type="reset"  value="Reset" class="btn btn-danger float-end">

</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>