<?php
session_start();

include('database.php');

if(isset($_POST['save']))
{
    $ename = $_POST['ename'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $mob = $_POST['mob'];
    $comment = $_POST['comment'];
    $sql = "insert into list1 values ('$ename', '$email', '$dob', '$mob', '$comment')";
    $conn->exec($sql);
    $_SESSION['message']= "Inserted Successfully";
    header('location:form.php');
    exit(0);

}else{

    $_SESSION['message']= "Not Inserted";
    header('location:form.php');
    exit(0);
}

?>