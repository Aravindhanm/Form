<?php session_start();
include('database.php');
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    
        <div class="crd">
            <?php  if(isset($_SESSION['message'])):?>
                <h4><?= $_SESSION['message'];?></h4>

            <?php 
              unset($_SESSION['message']);

               endif;?>

            <div class="head">
                <h3>List <a href="formadd.php">Add List</a></h3>
                
            </div>

            <table>
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Of Birth</th>
                        <th>Mobile</th>
                        <th>Comment</th>
                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php 
                        $sql ="select * from list1";
                        $statement = $conn->prepare($sql);
                        $statement->execute();

                        $result = $statement->fetchAll();
                        if($result)
                        {
                            foreach($result as $row)
                            {
                                ?>
                                <tr>
                                    <td><?= $row['Name'];?></td>
                                    <td><?= $row['Email'];?></td>
                                    <td><?= $row['Date_of_Birth'];?></td>
                                    <td><?= $row['Mobile'];?></td>
                                    <td><?= $row['Comment'];?></td>
                                    <td>
                                        <a href="edit.php?Name=<?= $row['Name']; ?>">Edit</a>
                                    </td>
                                </tr>
                                <?php
                            }

                        }else{
                            ?>
                            <tr>

                            <td colspan="5">
                                No Record Found
                            </td>
                            </tr>

                            <?php

                        }
                        
                        ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>