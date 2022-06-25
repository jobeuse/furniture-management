<?php session_start()?>
<?php include('conn.php')?>  
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
	<div class="row justify-content-center">
		<div class="col-lg-6 mt-5">
			<div class="card">
				<div class="card-header">
					<h5>Login</h5>
				</div>
				<div class="card-body">

					<?php 
					 
							if (isset($_POST['login'])) {
								$user_name=$_POST['username'];
								$password=$_POST['password'];
								if (empty($user_name and $password)) {
									echo "<div class='alert alert-danger alert-dismissable'>Error: Fill all Fields</div> "; 
								}else{
                                    $mysql=mysqli_query($conn, "SELECT * FROM login where username='$user_name'")or die('errror');
                                    if (mysqli_num_rows($mysql) > 0) {
                                        $result=mysqli_fetch_array($mysql);
                                         
                                        if ($result['username']===$user_name  and $result['password']===$password) {
                                            session_start();
                                            $_SESSION['login']=$user_name;//used to store user name
                                            header('location:index.php');
                                        } elseif ($result['password']!=$password) {
                                            echo "<div class='alert alert-danger alert-dismissable'>incorrect password </div> ";
                                        } elseif ($result['username']!=$user_name) {
                                            echo "<div class='alert alert-danger alert-dismissable'>incorrect Username </div> ";
                                        }
                                    }else{
										echo "<div class='alert alert-danger alert-dismissable'>incorrect Username </div> ";
									}
                                }
						        }



					?>

					<form class="row" method="POST">
						<div class="col-lg-12 mt-3">
							<input type="text" name="username" placeholder="User name" class="form-control" autocomplete autofocus>
						</div>
						<div class="col-lg-12 mt-3">
							<input type="password" name="password" placeholder="ENter password" class="form-control">
						</div>
						<div class="col-lg-12 mt-3">
							<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
						</div>
						<div class="col-lg-6 mt-2">
							<a href="#" class="link text-danger text-decoration-none">Forgot Password</a>
						</div>
						<div class="col-lg-4 mt-2">
							<a href="createaccount.php" class="text-primary text-decoration-none">Create Account</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>