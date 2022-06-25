<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"> 
            Add new furniture
            </div>
            <div class="card-body"> 
            <!-- form used to add new furniture -->
            <form method="post" class="row">
                <?php include "furnitureoperations.php"?>
                <div class="col-md-12">
                    <label >Furniture name</label>
                    <input type="text" id="furniture" name="Fname" class="form-control">
                </div>
                <div class="col-md-12">
                    <label >Furniture owner name</label>
                    <input type="text" id="furniture" name="owner" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="subimt" class="btn btn-primary" name="SaveF">Save</button>
                </div>
                </form>
            </div> 
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                added  furnitures
            </div>
            <div class="card-body">
                <table class="table">
                    <thead> 
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Furniture name</th>
                        <th scope="col">Owner name</th> 
                        <th scope="col"> </th> 
                        </tr>
                    </thead>
                    <tbody>
                        
<?php  
  $select=mysqli_query($conn, "SELECT * FROM furniture ")or die('errror');
  if(mysqli_num_rows($select)>0){
    while($row=mysqli_fetch_array($select)){?>

                    <tr>
                        <th scope="row"><?php echo $row['id']?></th>
                        <td ><?php echo $row['Fname']?></td>
                        <td><?php echo $row['owner']?></td>
                        <td><a href="furniture/singlefurniture.php?id=<?php echo$row['id']?>">Select</a></td>
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
