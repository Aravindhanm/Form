<?php session_start();
include('database.php');
$sort_by = $_GET['sort-by'] ?? 'id';
$sort_order = $_GET['sort-order'] ?? 'asc';

$sql = "SELECT * FROM page ORDER BY $sort_by $sort_order";
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
        <?php if(isset($_SESSION['message'])):?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
               <?php 
               unset($_SESSION['message']);
               endif?> 
<form method="GET">
<div class="input-group mb-3">
<<<<<<< HEAD
        <a href="form.php" class="btn btn-danger"><i class="bi bi-arrow-left"></i></a>
		<input type="text" name="search" id="search" class="form-control" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
		<button type="submit" class="btn btn-success" > <i class="bi bi-search"></i>&nbsp; Search</button>
=======
        <a href="form.php" class="btn btn-danger" style="width: 80px;"><i class="bi bi-arrow-left"></i></a>
		<input type="text" name="search" id="search" class="form-control" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
		<button type="submit" class="btn btn-success "  style="width: 150px;"> <i class="bi bi-search"></i>&nbsp; &nbsp; Search</button>
>>>>>>> 89dd117 (Formcommit)
</div>

	</form>
          <div class="card">
        <div class="card-header">
            
        <h3>List
<<<<<<< HEAD
        <a href="formadd.php" class="btn btn-primary float-end"><i class="bi bi-plus-square"></i>&nbsp; AddList</a></h3>
=======
        <a href="formadd.php" class="btn btn-primary float-end" ><i class="bi bi-plus-square" ></i>&nbsp; AddList</a></h3>
>>>>>>> 89dd117 (Formcommit)

        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover" >
        <thead>
     <tr>
      <th>Profile</th>
      <th><a class="nav-link" href="?sort-by=name&sort-order=<?php echo $sort_by == 'name' && $sort_order == 'asc' ? 'desc' : 'asc'; ?>">Name<i class="bi bi-sort-up-alt"></i><i class="bi bi-sort-down"></i></a></th>
      <th><a class="nav-link" href="?sort-by=email&sort-order=<?php echo $sort_by == 'email' && $sort_order == 'asc' ? 'desc' : 'asc'; ?>">Email<i class="bi bi-sort-up-alt"></i><i class="bi bi-sort-down"></i></a></th>
      <th>Date Of Birth<i class="bi bi-sort-up-alt"></i></i><i class="bi bi-sort-down"></i></th>
      <th>Phone<i class="bi bi-sort-up-alt"></i><i class="bi bi-sort-down"></i></th>
      <th>Edit/Delete</th>
     </tr>
        </thead>
        <tbody>
         <?php


        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM addlist2");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_records = $result['count'];

        $records_per_page = 5;
        $records_per_page = 7;
        $total_pages = ceil($total_records / $records_per_page);

        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        $offset = ($current_page - 1) * $records_per_page;

       

        if(isset($_GET['search'])) {
             $search = $_GET['search'];

             $stmt = $conn->prepare("SELECT * FROM addlist2 WHERE name LIKE :search OR email LIKE :search ");
             $stmt->bindValue(':search', '%' . $search . '%');
             $stmt->execute();
            } else {
                $sort_by = $_GET['sort-by'] ?? 'id';
                $sort_order = $_GET['sort-order'] ?? 'asc';
                         $stmt = $conn->query("SELECT * FROM addlist2 ORDER BY $sort_by $sort_order LIMIT $records_per_page OFFSET $offset");
                        }

            while($record = $stmt->fetch(PDO::FETCH_ASSOC))
                 {
                    ?>


                 <tr>
         <td> <img src="images/<?= $record['profile'] ; ?>" class="rounded-circle"  width="60" height="60"></td>
        <td><?= $record['name'];?></td>
        <td><?=  $record['email'];?></td>
        <td><?= $record['dob'];?></td>
        <td><?= $record['phone'];?></td>
        <td><a href="edit.php?id=<?= $record['id'];?>" class="btn btn-primary" ><i class="bi bi-pencil-square"></i></a> <a href="delete.php?id=<?= $record['id'];?>" class="btn btn-danger float-end" ><i class="bi bi-trash"></i></a</td>
      </tr>
     
     <?php  
     }
     ?>
        </tbody>
            </table>

        <ul class="pagination">
        <ul class="pagination  justify-content-end">
     <?php if ($current_page > 1): ?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page - 1; ?>">Previous</a></li>
        <?php endif; ?>

        <?php for ($page = 1; $page <= $total_pages; $page++): ?>
        <li class="page-item <?php echo $page == $current_page ? 'active' : ''; ?>">
        <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
        </li>
        <?php endfor; ?>

        <?php if ($current_page < $total_pages): ?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a></li>
        <?php endif; ?>
        </ul>
        </div>
        </div>
        
        </div>
       </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>   
        
</body>
 </html>