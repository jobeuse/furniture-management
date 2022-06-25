<?php
//codes for addding new furniture in table  furniture
if(isset($_POST['SaveF'])){
    $Fname=$_POST['Fname'];
    $owner=$_POST['owner'];
    if(!empty($Fname) or !empty($owner)){
        $mysql=mysqli_query($conn,"INSERT into furniture values('','$Fname','$owner')")or die('error');
        if($mysql){
            echo "<script>alert('furniture added ')</script>";
        }else{
            echo "<script>alert('error')</script>";
        }

    }else{
        echo "<script>alert('empty space found')</script>";
    }   
}

//codes for deleting furniture in table  furniture

if(isset($_POST['delete'])){
    if($_GET['id']){
        //getting add through url to be used to select element chosen
           $id=$_GET['id'];
           //checking if the furniture with id selected, is in table 
            $select=mysqli_query($conn, "SELECT * FROM furniture WHERE id='$id'")or die('errror');  

            //fectching data from slelected furniture
            $fetchs=mysqli_fetch_array($select);

            //condition for checking if Id passed in url match with the one we have ni table

            if ($id == $fetchs['id']) { 
                //deleting selleected element
                $delete=mysqli_query($conn, "DELETE FROM furniture WHERE id='$id'")or die('error');
                //condition for checking if element is deleted
                if($delete){
                    echo "<script>alert('furniture deleeted')</script>";
                    header('location:../index.php');
                }else{
                    echo "<script>alert('error')</script>";
                }
            }
    }else{
        echo "<script>alert('element no found')</script>";
    } 
    
}

if (isset($_POST['update'])) {
    if ($_GET['id']) {
        //data from the form Fname and owner
        $Fname=$_POST['Fname'];
        $owner=$_POST['owner'];
        //getting add through url to be used to select element chosen
        $id=$_GET['id'];
        //checking if the furniture with id selected, is in table
        $select=mysqli_query($conn, "SELECT * FROM furniture WHERE id='$id'")or die('errror');

        //fectching data from slelected furniture
        $fetchs=mysqli_fetch_array($select);

        //checking if we have record for the element selected
        if(!empty($fetchs)){
    $updateproduct=mysqli_query($conn, "UPDATE furniture set Fname='$Fname',owner='$owner' where id='$id' ")or die('errror');
            if ($updateproduct) {
               echo "<script>alert('furniture updated   ')</script>";
            }

        }else{
            echo "<script>alert('error')</script>";
        }
    }
}
 