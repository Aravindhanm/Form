<?php 
session_start();
include('database.php');


if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT profile FROM addlist2 WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $image = $stmt->fetchColumn();

    $stmt = $conn->prepare("DELETE FROM addlist2 WHERE id=:id");
    $stmt->bindParam(':id', $id);
    if($stmt->execute()) {
        $target_dir = "images/";
        if(file_exists($target_dir.$image)) {
            unlink($target_dir.$image);
        }
        $_SESSION['message']="Data deleted successfully!";
        echo"<script>window.location.href='form.php'</script>";
    } else {
        $_SESSION['message']="Data not deleted!";
        echo"<script>window.location.href='form.php'</script>";
    }
}
?>