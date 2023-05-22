<?php 
session_start();
include('database.php');



if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $mob = $_POST['mob'];
    $image = $_FILES['image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    if (file_exists($target_file)) {
        
        $_SESSION['message']="File already exists.";
        echo"<script>window.location.href='formadd.php'</script>";

    } else {
        $stmt = $conn->prepare("INSERT INTO addlist2(profile,name,email,dob,phone) VALUES (:image,:name, :email, :dob, :mob)");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':mob', $mob);
        $stmt->bindParam(':image', $image);

        if($stmt->execute()) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        
            $_SESSION['message']="Inserted Successfully";
            echo"<script>window.location.href='form.php'</script>";
        } else {
            
            $_SESSION['message']="Not Inserted ";
            echo"<script>window.location.href='form.php'</script>";
            echo"<script>window.location.href='formadd.php'</script>";
        }
    }
}





?>