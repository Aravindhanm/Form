<?php
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];

      $query = 'SELECT COUNT(*) FROM addlist2 WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $result = $statement->fetchColumn();

    if ($result > 0) {
      echo 'Email already exists';
    } else {
      echo 'Email is available';
    }
  } 

?>
