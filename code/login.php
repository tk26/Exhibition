<?php include 'connectivity.php';
?>
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
   <title>Online Exhibition</title>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='index.php'><img src="images/logo.jpg"></a></li>
   
   <li><a href='index.php'>Home</a></li>
   <li><a href='services.php'>Services</a></li>
   <li><a href='about.php'>About Us</a></li>
   <li><a href='contactus.php'>Contact Us</a></li>
   
   <li><a href='register.php'>Sign Up</a></li>
   <li class='active'><a href='login.php'>Log in</a></li>
 
</ul>
</div>
<!--login form-->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script><!--Jquery JS-->


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"><!--bootstrap CSS-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script><!--bootstrap JS-->


<link href="css/login.css" rel="stylesheet"><!--Register CSS-->

<?php
if(isset($_POST['add']))
{
//db_connect();

// Quote and escape form submitted values
$email = db_quote($_POST['email']);

$password = db_quote($_POST['password']);

$hashedpassword=md5($password);


// A select query. $result will be a `mysqli_result` object if successful
$queryhere='SELECT r.*,u.* FROM users u inner join userroles r on u.rid=r.rid WHERE u.uemail = '.$email.' AND u.upwd="'.$hashedpassword.'"';

$result = db_query($queryhere);

if($result === false) {
	$error = db_error();
	echo $error;
    // Handle failure - log the error, notify administrator, etc.
	header('url=index.php');
} 
else {
    // Fetch all the rows in an array
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
	if (sizeof($rows) == 1) {
		session_start();
  $_SESSION['sess_user_id'] = $row['uid'];
  $_SESSION['sess_username'] = $row['uname'];
        $_SESSION['sess_userrole'] = $row['rolename'];

        echo $_SESSION['sess_userrole'];


  if( $_SESSION['sess_userrole'] == "superusers"){
   header('Location: ../CMS/Admin/dashboard.php');
  }elseif( $_SESSION['sess_userrole'] == "companyPOC")
  {
   header('Location: ../CMS/Poc/dashboard.php');
  }
  elseif($_SESSION['sess_userrole'] == "companyExecutive")
  {
	    header('Location: ../CMS/');
  }
  else{
	  
	 echo $_SESSION['sess_userrole'];
	 		
  }
	 
	 


    }
	else {
		header("Refresh:0");
		echo 'Invalid Login';
		
	}
	
}

}

else 
{
?>

<div class = "container">
	<div class="wrapper">
		<form action="" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
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
<?php
}
?>