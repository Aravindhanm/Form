<?php
session_start();
include('data.php');

if(isset($_POST['submit'])){

    $ename = $_POST['ename'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $mob = $_POST['mob'];

    $sql = "insert into addlist(name,email,dob,phone) VALUES ('$ename', '$email', '$dob', '$mob')";
    $conn->exec($sql);
    $_SESSION['message']="Inserted Successfully";
   
} else{
    $_SESSION['message']="Not Inserted";
}



?>


<script>

window.location.href="index.php";

</script>