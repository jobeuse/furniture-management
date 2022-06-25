<?php session_start()?>
<?php include('conn.php')?>

<?php 
if (!isset($_SESSION['login'])) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cargo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="icon" href="images/shopping.png">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
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
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="import/furniture.php">Import</a>
            </li> 
        <li class="nav-item">
              <a class="nav-link" href="export/furniture.php">Export</a>
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
                  header('location:login.php');
                }
              ?>
              <button class="btn btn-sm btn-danger" type="submit" name="logout">Logout</button>
            </form>
            <?php  endif ?>
            </div>
        </div>
      </div>
    </nav>
        <div class="row">
          <div class="col-md-12"> 
           <?php include "furniture/newfurniture.php" ?>
          </div>
        </div>
    </div>
</body>
</html>