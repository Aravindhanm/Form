<?php
session_start();
include('data.php');
if(isset($_POST['delete'])){

    $delete = $_POST['delete'];
    

        $sql = "delete from addlist where id=$delete";
        $conn->exec($sql);
       /* $statement = $conn->prepare($sql);
        $data = [':delete'=> $delete];
        $sql_execute = $statement->execute($data);*/

        $_SESSION['message']="Deleted Successfully";
        
}else{
    $_SESSION['message']="Not Deleted";

}
?>
<script>

window.location.href="index.php";

</script>