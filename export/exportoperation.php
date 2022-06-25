<?php
//codes for addding new furniture in table  furniture
if(isset($_POST['export'])){
    $FurnitureId=$_POST['FurnitureId'];
    $Quantity=$_POST['Quantity'];
    $exportDate=$_POST['exportDate'];
    if(!empty($Quantity) or !empty($exportDate) or !empty($FurnitureId)){
        $select=mysqli_query($conn, "SELECT * FROM import WHERE FurnitureId='$FurnitureId'")or die('errror');  
        //cheking number of rows in tbale
        if(mysqli_num_rows($select)>0){
            $fetchs=mysqli_fetch_array($select);

            if ($fetchs['Quantity'] >=  $Quantity) {
                $totalRemain=$Quantity - $fetchs['Quantity'];

                $updateproduct=mysqli_query($conn, "UPDATE import set Quantity='$totalRemain' where FurnitureId='$FurnitureId' ")or die('errror');
                if ($updateproduct) {
                    $mysql=mysqli_query($conn,"INSERT into export values('','$FurnitureId','$Quantity','$exportDate')")or die('error');
                echo "<script>alert('furniture exported  ')</script>";
                }else{
                    echo "<script>alert('Qantity could not exported')</script>";
                }

            }else{
                echo "<script>alert('no enough Qauntity')</script>";
            }

          
        }else{
            echo "<script>alert('furniture not found')</script>";
        }


      
           

        }else{
            echo "<script>alert('empty space found')</script>";
        }   
}




//codes for deleting import in table  import

if(isset($_POST['delete'])){
    if($_GET['id']){
        //getting add through url to be used to select element chosen
           $id=$_GET['id'];
           //checking if the import with id selected, is in table 
            $select=mysqli_query($conn, "SELECT * FROM export WHERE id='$id'")or die('errror');  

            //fectching data from slelected import
            $fetchs=mysqli_fetch_array($select);

            //condition for checking if Id passed in url match with the one we have ni table

            if ($id == $fetchs['id']) { 
                //deleting selleected element
                $delete=mysqli_query($conn, "DELETE FROM export WHERE id='$id'")or die('error');
                //condition for checking if element is deleted
                if($delete){
                    echo "<script>alert('furniture deleted')</script>";
                    header('location:furniture.php');
                }else{
                    echo "<script>alert('error')</script>";
                }
            }
    }else{
        echo "<script>alert('element no found')</script>";
    } 
    
}