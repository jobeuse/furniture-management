<?php session_start()?>
<?php include('../conn.php')?>

<?php 
if (!isset($_SESSION['login'])) {
  header("location:../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cargo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="icon" href="images/shopping.png"> 
</head>
<body class="bg-light">
    <div class="container"> 
      
    <nav class="navbar navbar-expand-lg bg-light mb-5 border-bottom">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Cargo</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../import/furniture.php">Import</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="furniture.php">Export</a>
                </li> 
              </ul>
              <div class="d-flex" role="search">
            <?php 
            if (!isset($_SESSION['login'])):
              ?>
              <a href="login.php" class="btn btn-sm btn-primary">
                Login
              </a>
              <?php else: ?>
                <form method="POST">
                  <?php 
                    if (isset($_POST['logout'])) {
                      session_destroy();
                      header('location:../login.php');
                    }
                  ?>
                  <button class="btn btn-sm btn-danger" type="submit" name="logout">Logout</button>
                </form>
                <?php  endif ?>
                </div>
            </div>
          </div>
        </nav>
        <div class="row justify-content-center">
          <div class="col-md-5"> 
            <div class="card">
                <div class="card-header">
                    Export furniture
                </div>
                <div class="card-body"> 
                    <form method="post" class="row">
                        <?php include "exportoperation.php"?>
                        <div class="col-md-12">
                        <label >Furniture Name (id)</label>
                        <select name="FurnitureId" class="form-control">

                        
                        <?php  
  $select=mysqli_query($conn, "SELECT * FROM furniture ")or die('errror');
  if(mysqli_num_rows($select)>0){
    while($row=mysqli_fetch_array($select)){?>
                        
                        <option value="<?php echo$row['id']?>"><?php echo$row['Fname']?></option>

<?php 
    } 
  }else{
    ?>
     <option value="">No Furniture</option>
    <?php
  }
  ?>
                       </select>
                     </div>
                        <div class="col-md-12">
                            <label >Quantity</label>
                            <input type="number" id="furniture"  name="Quantity" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label >Furniture exportDate</label>
                            <input type="date" id="furniture"   name="exportDate" class="form-control">
                        </div>
                        <div class="col-md-12 mt-3">
                            <button type="subimt" class="btn btn-primary" name="export">Export</button>                   
                        </div>
                    </form>
                     
                </div>
            </div>
          </div>


          <div class="col-md-6">
          <div class="card">
            <div class="card-header">
                exported  furnitures
            </div>
            <div class="card-body">
                <table class="table">
                    <thead> 
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Furniture id</th>
                        <th scope="col">Quantity</th> 
                        <th scope="col">exportDate</th> 
                        <th scope="col"> </th> 
                        </tr>
                    </thead>
                    <tbody>
                        
<?php  
  $select=mysqli_query($conn, "SELECT * FROM export ")or die('errror');
  if(mysqli_num_rows($select)>0){
    while($row=mysqli_fetch_array($select)){?>

                    <tr>
                        <th scope="row"><?php echo $row['id']?></th>
                        <td ><?php echo $row['FurnitureId']?></td>
                        <td><?php echo $row['Quantity']?></td>
                        <td><?php echo $row['exportDate']?></td>
                        <td><a href="delete.php?id=<?php echo$row['id']?>">delete</a></td>
                    </tr>
    <?php 
    } 
  }else{
    ?>
                    <tr> 
                        <td colspan="4">No data added</td> 
                    </tr>
    <?php
  }
  ?>

                       
                            </tbody>
                        </table>
                    </div>
                </div>
          </div>
        </div>
    </div>
</body>
</html>