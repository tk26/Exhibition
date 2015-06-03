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
<?php
if(isset($_POST['add']))
{
//db_connect();

// Quote and escape form submitted values
$firstname = db_quote($_POST['first_name']);
$lastname = db_quote($_POST['last_name']);
$displayname = db_quote($_POST['display_name']);
$email = db_quote($_POST['email']);
$contact = db_quote($_POST['contact']);

$password = db_quote($_POST['password']);

$hashedpassword=md5($password);


$rid=3; // role is 'user'

// A select query. $result will be a `mysqli_result` object if successful
$queryhere='SELECT uemail FROM users WHERE uemail='.$email.'';
$result = db_query($queryhere);

if($result === false) {
    // Handle failure - log the error, notify administrator, etc.
	
$queryhere='INSERT INTO users (rid,uname,upwd,uemail,ucontact) VALUES (3,'.$displayname.',"'.$hashedpassword.'",'.$email.','.$contact.')';
$result = db_query($queryhere);


if($result === false) {
    // Handle failure - log the error, notify administrator, etc.
	$error = db_error();
	//echo $error;
    // Send the error to an administrator, log to a file, etc.
} else {
    // We successfully inserted a row into the database
	//echo "Data entered";
	
}

} else {
    // Fetch all the rows in an array
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
	header('Refresh:3; url=login.php');
	echo 'Email ID already Registered, Login Or Register With new Email';
}

}

else 
{
?>

<div id='cssmenu'>
<ul>
   <li><a href='index.php'><img src="images/logo.jpg"></a></li>
   
   <li><a href='index.php'>Home</a></li>
   <li><a href='services.php'>Services</a></li>
   <li><a href='about.php'>About Us</a></li>
   <li><a href='contactus.php'>Contact Us</a></li>
   
   <li class='active'><a href='register.php'>Sign Up</a></li>
   <li><a href='login.php'>Log in</a></li>
 </ul>
</div>

<!--form for signup/registration-->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script><!--Jquery JS-->


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"><!--bootstrap CSS-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script><!--bootstrap JS-->



<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css" rel="stylesheet"><!--Jquery UI CSS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script><!--Jquery UI JS-->

<link href="css/register.css" rel="stylesheet"><!--Register CSS-->
<script src="js/register.js"></script><!--Register JS-->
<script src="js/registerValidation.js"></script><!--Register Validation JS-->

<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="<?php $_PHP_SELF ?>" method="post" onsubmit="return myFunction()">
			<h2>Please Sign Up <small>It's free and always will be.</small></h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Display Name" tabindex="3" required>
			</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4"required>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="contact" name="contact" id="contact" class="form-control input-lg" placeholder="Contact Number" tabindex="4">
			</div>
			<div class="row">
				<div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
					</span>
				</div>
				<div class="col-xs-8 col-sm-9 col-md-9">
					 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input name="add" type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<!--<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>-->
			</div>
		</form>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<?php
}
?>
</body>
<html>
