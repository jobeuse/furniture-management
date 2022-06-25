
<?php include('conn.php')?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>cargo</title>
	<link rel="icon" href="images/shopping.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.min"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="fontawesome-free-5.8.1-web/js/fontawesome.js"></script> 
	<script type="text/javascript" src="fontawesome-free-5.8.1-web/js/fontawesome.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/js/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/js/fontawesome.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<?php
session_start(); 

// if(!isset($_SESSION['keys'])){
// 	header('location:keys.php');
// }
?>

<body>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6 mt-5">
			<div class="card">
				<div class="card-header">
					<h5>Create account</h5>
				</div>
				<div class="card-body"> 
					<?php  
							if (isset($_POST['create'])) {
								$user_name=$_POST['username']; 
								$full_username=$user_name;
								$password=$_POST['password']; 
								$paleng=strlen($password);
					   				$select=mysqli_query($conn, "SELECT * FROM login");
					   				if($select){
					   						$fetched=mysqli_fetch_array($select);
					   					}

						       				if ($user_name!='' and $password!='') {
						       						if ($paleng < 4) {
						       							echo "<div class='alert alert-danger'>Atleast five Characters for password</div>";
						       						}else{

														if ($password == $_POST['cpassword']) {
															
															if ($user_name !=$fetched['username'] ) { 
																$mysql=mysqli_query($conn,"INSERT into login values('','$full_username','$password')")or die('error');
 
																	 session_start(); 
																  $_SESSION['login']=$full_username;//used to store user name
																  header('location:index.php');
																	
																	
															} 
															 else{
																 echo "<div class='alert alert-danger'>user_name exist </div>";
 
															 }

														}else{
															echo "<div class='alert alert-danger'>Password doesn't match</div>";
														} 
														} 
													}
												else{
												        echo "<div class='alert alert-danger'>empty space found</div> "; 
													} 
						        }



					?>

					<form class="row" method="POST">
						<div class="col-lg-12 mt-3">
							<input type="text" name="username" placeholder="User name" class="form-control">
						</div>
						<div class="col-lg-12 mt-3">
							<input type="password" name="password" placeholder="enter password" class="form-control">
						</div>
						<div class="col-lg-12 mt-3">
							<input type="password" name="cpassword" placeholder="confirm password" class="form-control">
						</div> 
						<div class="col-lg-12 mt-3">
							<button type="submit" name="create" class="btn btn-primary btn-block">Create Account</button>
						</div>
						<div class="col-lg-6">
							<a href="login.php" class="link text-primary text-decoration-none">Have an account</a>
						</div> 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>