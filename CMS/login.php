
<!doctype html>
<html lang='EN'>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
   <link rel="stylesheet" href="css/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/script.js"></script>
   <title>Login</title>
</head>
<body>

<!--login form-->
<script src="js/jquery-1.11.3.js"></script><!--Jquery JS-->


<link href="css/bootstrap.css" rel="stylesheet"><!--bootstrap CSS-->
<script src="js/bootstrap.js"></script><!--bootstrap JS-->


<link href="css/login.css" rel="stylesheet"><!--Register CSS-->

<?php
 require 'database.php';
	 if(isset($_POST['add']))
	{
         
        // keep track post values
        $email = $_POST['email'];
		$password = $_POST['password'];
		$hashedpassword=md5($password);
        
         
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM users where uemail = ? AND upwd = ? ";
            $q = $pdo->prepare($sql);
            $q->execute(array($email,$hashedpassword));
			
			$data = $q->fetch(PDO::FETCH_ASSOC);
			$username = $data['uname'];
			$role = $data['rid'];
			$uid = $data['uid'];
			Database::disconnect();
			session_start();
			$_SESSION['uid']=$uid;
			$_SESSION['rid']=$role;
			$_SESSION['username']=$username;
            if($role==1)
			//companyPOC
			{
				echo "<script>window.location='Poc/dashboard.php'</script>";
			}
		    if($role==4)
			//superuser or Admin
			{	
				echo "<script>window.location='Admin/dashboard.php'</script>";
			}
			if($role==3)
			//enduser
			{
				echo "<script>window.location='enduser/dashboard.php'</script>";
			}
	}
	
?>

<div class = "container">
	<div class="wrapper">
		<form action="<?php $_PHP_SELF ?>" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Welcome Back! Please Login</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" autofocus="" />
			  <br>
			  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="add" value="Login" type="Submit">Login</button>  			
		</form>			
	</div>
</div>
</body>
<html>
