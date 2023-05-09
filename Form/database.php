<?php
$servername = "postgres";
$username = "postgres";
$password = "postgres";
$database = "test";
try{

    $conn = new PDO("pgsql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    echo "connection failed". $e-> getMessage();
}
?>