<?php
session_start();
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
<div class="container">
  <div class="row">
      <div class="col-md-6 mt-4 mx-auto">
               <?php if(isset($_SESSION['message'])):?>
                    <h5 class="alert alert-danger"><?= $_SESSION['message']; ?></h5>
               <?php 
               unset($_SESSION['message']);

               endif?> 
               <div class="card">
        <div class="card-header">
<h3>Add List<a href="form.php" class="btn btn-danger  float-end"><i class="bi bi-arrow-left-circle"></i>&nbsp; Back</a></h3>
</div>
<div class="card-body">
<form action="code.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
    <label class="form-label" >Name</label>  
<input type="text" name="name"  class="form-control" placeholder="Enter Your Name">

    </div>

    <div class="mb-3">
    <label class="form-label" >Email</label>  

<input type="text" class="form-control" name="email" placeholder="abcd@example.com">
    </div>

    <div class="mb-3">
    <label class="form-label" >DOB</label>  

<input type="date" name="dob" class="form-control">

    </div>
<div class="mb-3">
<label class="form-label" >Phone</label>  

  <input type="number" name="mob"  class="form-control">
</div>


<div class="mb-3">
<label class="form-label">Profile</label>  

  <input type="file" name="image"  class="form-control">
</div>


  
  <input type="submit" name="submit" value="Submit" class="btn btn-success">
  <input type="reset"  value="Reset" class="btn btn-danger float-end">

</form>
</div>
</div>
</div>
</div>
</div>
               endif?> 

        <div class="card" style="width: 600px;">
        <div class="card-header">
        <h3>Add List<a href="form.php" class="btn btn-danger  float-end"><i class="bi bi-arrow-left-circle"></i>&nbsp; Back</a></h3>
      </div>

  <div class="card-body">
  <form action="code.php" method="POST" enctype="multipart/form-data" id="form">

    <div class="mb-3">
    <label class="form-label" >Name</label>  <span class="form-text text-danger">*</span>
    <span id="error_name" class="form-text text-danger "></span>
    <input type="text" name="name"  class="form-control name" placeholder="Enter Your Name">
    </div>

    <div class="mb-3">
    <label class="form-label" >Email </label> <span class="form-text text-danger">*</span>
    <span id="error_email" class="form-text text-danger "></span>
    <input type="text" class="form-control email" name="email" id="email" placeholder="abcd@example.com">
    </div>

    <div class="mb-3">
    <label class="form-label" >DOB</label><span class="form-text text-danger">*</span>  
    <span id="error_dob" class="form-text text-danger "></span> 
    <input type="date" name="dob" class="form-control dob">
    </div>

    <div class="mb-3">
    <label class="form-label" >Phone</label>  <span class="form-text text-danger">*</span>
    <span id="error_mob" class="form-text text-danger "></span> 
    <input type="number" name="mob"  class="form-control mob">
    </div>

    <div class="mb-3">
    <label class="form-label">Profile</label>  <span class="form-text text-danger">*</span> 
    <span id="error_image" class="form-text text-danger "></span>
    <input type="file" name="image"  class="form-control image">
    </div>

    <input type="submit" name="submit" value="Submit" class="btn btn-success">
    <input type="reset"  value="Reset" class="btn btn-danger float-end">

  </form>
  </div>
  </div>
  </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="validation.js"></script>

</body>
</html>