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
        <div class="row justify-content-center">
          <div class="col-md-6"> 
            <div class="card">
                <div class="card-header">
                    Edit
                </div>
                <div class="card-body">
                    <?php if($_GET['id']):

                        $id=$_GET['id'];
                        $select=mysqli_query($conn, "SELECT * FROM furniture WHERE id='$id'")or die('errror');  
                        //fectching data from slelected furniture
                        $fetchs=mysqli_fetch_array($select);
                        if(!empty($fetchs)):
                 
                        ?>
                    <form method="post" class="row">
                        <?php include "furnitureoperations.php"?>
                        <div class="col-md-12">
                            <label >Furniture name</label>
                            <input type="text" id="furniture" value="<?php echo$fetchs['Fname']?>" name="Fname" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label >Furniture owner name</label>
                            <input type="text" id="furniture" value="<?php echo$fetchs['owner']?>" name="owner" class="form-control">
                        </div>
                        <div class="col-md-12 mt-3">
                            <button type="subimt" class="btn btn-primary" name="update">Update</button>
                            <button type="subimt" class="btn btn-danger" name="delete">Delete</button>
                            <a href="../index.php"   class="btn btn-dark" >Cancel</a>                        
                        </div>
                    </form>
                    <?php endif; endif;?>
                </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>