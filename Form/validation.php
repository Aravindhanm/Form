
<?php
include('database.php');



if(isset($_POST['email'])){
  $email = $_POST['email'];

  $stmt = $conn->prepare("SELECT * FROM addlist2 WHERE email=:email");
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  
  if($stmt->rowCount() > 0){
      echo "<span class='text-danger'>Email already exists</span>";
  }else{
      echo "<span class='text-success'>Email available</span>";
  }
}

if(isset($_POST['name'])){
  $ename = $_POST['name'];

  $stmt = $conn->prepare("SELECT * FROM addlist2 WHERE name=:name");
  $stmt->bindParam(':name', $ename);
  $stmt->execute();
  
  if($stmt->rowCount() > 0){
      echo "<span class='text-danger'>Name already exists</span>";
  }else{
      echo "<span class='text-success'>Name available</span>";
  }
}

if(isset($_POST['mob'])){
  $mob = $_POST['mob'];

  $stmt = $conn->prepare("SELECT * FROM addlist2 WHERE phone=:mob");
  $stmt->bindParam(':mob', $mob);
  $stmt->execute();
  
  if($stmt->rowCount() > 0){
      echo "<span class='text-danger'>Phone_Number already exists</span>";
  }else{
      echo "<span class='text-success'>Phone_Number available</span>";
  }
}
if (isset($_POST['image'])) {
  $image = $_POST['image'];

  $query = 'SELECT COUNT(*) FROM addlist2 WHERE profile = :image';
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':image', $image);
  $stmt->execute();
  $count = $stmt->fetchColumn();

  if ($count > 0) {
      echo '<span class="text-danger">Image already exists in the database.</span>';
  } else {
      echo '<span class="text-success">Image is available.</span>';
  }
}

?>