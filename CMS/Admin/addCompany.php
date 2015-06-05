<?php
require '../session1.php';
//echo $role;
//echo $uid;
//echo $username;
if($role!=4)
	{
		echo "<script>window.location='../login.php'</script>";
	}
		    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	   <meta charset='utf-8'>
	    <script src="../js/jquery-1.11.3.js"></script>
		 <script src="../js/bootstrap.js"></script>
	   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />

    <title>Add Company</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
		

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
	   <link href="../css/poc.css" rel="stylesheet">

<link href="../css/register.css" rel="stylesheet"><!--Register CSS-->
<script src="../js/register.js"></script><!--Register JS-->
<script src="../js/registerValidation.js"></script><!--Register Validation JS-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


<script type="text/javascript">
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
</head>

<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">
	
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-slide-dropdown">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
			<a href='index.php'></a>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-slide-dropdown">
       
      <!--  <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form> -->
        <ul class="nav navbar-nav navbar-right">
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username; ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">My Profile</a></li>
                <li><a href="../logout.php">Logout</a></li>
             
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--
<div id='cssmenu'>
<ul>
   <li><a href='index.php'><img src="images/logo.jpg"></a></li>
   
   <li class='active'><a href='index.php'>Home</a></li>
   <li><a href='services.php'>Services</a></li>
   <li><a href='about.php'>About Us</a></li>
   <li><a href='contactus.php'>Contact Us</a></li>
   
   <li><a href='register.php'>Sign Up</a></li>
   <li><a href='login.php'>Log in</a></li>
 
</ul>
</div>-->
   <nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="dashboard.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
			<ul class="dropdown-menu forAnimate" role="menu">
				<li><a href="addUser.php">Add User</a></li>
				<li><a href="manageUsers.php">Manage Users</a></li>
      <!-- 
            <li class="divider"></li>
            <li><a href="#"></a></li>
            <li class="divider"></li>
            <li><a href="#">Informes</a></li> -->
			</ul>
        </li>       
		<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Companies<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a>
			<ul class="dropdown-menu forAnimate" role="menu">
				<li class="active"><a href="addCompany.php">Add Company</a></li>
				<li><a href="manageCompanies.php">Manage Companies</a></li>
      
            
			</ul>
        </li>       		
        <li ><a href="#">Exhibitions<span style="font-size:16px;" class="pull-right hidden-xs showopacity "></span></a></li>        
		<li ><a href="#">Accessibility</a></li>  
		<li ><a href="#">Roles</a></li>		
		<li ><a href="#">Categories</a></li>   		
		<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Management<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cloud"></span></a>
			<ul class="dropdown-menu forAnimate" role="menu">
				<li><a href="#">Generate Reports</a></li>
				<li><a href="#">Site Stats</a></li>
				<li><a href="#">Data Import Wizard</a></li>
			    <li><a href="#">Data Export</a></li>
      
            
			</ul>
		</li>  
      </ul>
    </div>
  </div>
</nav>
<?php
     
    require '../database.php';
	 if(isset($_POST['add']))
	{
         
        // keep track post values
        $firstname = $_POST['first_name'];
		$lastname = $_POST['last_name'];
		$displayname = $_POST['display_name'];
		
        $email = $_POST['email'];
		$password = $_POST['password'];
		$hashedpassword=md5($password);
        $contact = $_POST['contact'];
		$sid = $_POST['sid'];
		
         $cname = $_POST['cname'];
		$cabout = $_POST['cabout'];
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CALL addCompany(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($sid,$cname,$cabout,$displayname,$firstname,$lastname,$email,$hashedpassword,$contact));
            Database::disconnect();
			echo "Company Added <script>window.location='dashboard.php'</script>";
    }
	
?>

<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form class="form-horizontal" action="<?php $_PHP_SELF ?>" method="post" onsubmit="return myFunction()">
				<fieldset>

				<!-- Form Name -->
				<legend>Basic Information</legend>
				<!-- Text input-->
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="cname" id="cname" class="form-control input-lg" placeholder="Company Name" tabindex="1" required>
					</div>
				</div>
				</div>
				
				<!-- Select Basic -->
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="form-group">
					<select id="sid" name="sid" class="form-control input-large" placeholder="Choose Sub-Domain">
					  <option value="1">subdomain1</option>
					  <option value="2">subdomain2</option>
					  <option value="3">subdomain3</option>
					  <option value="4">subdomain4</option>
					</select>
				  </div>
				</div>
				</div>

				<!-- File Button --> <!--lets keep logo for later stuff, after folder creations is established-->
				<!--<div class="row">
				  <label class="label label-primary" for="cabout">Company Logo</label>
				  <div class="col-xs-12 col-sm-6 col-md-6">  
				  <div class="form-group">
					<input id="logo" name="logo" class="input-file" type="file">
				  </div>
				  </div>
				</div>
				-->
				
				<!-- Textarea -->
				<div class="row">
				  <label class="label label-info" for="cabout">About The Company</label>
				  <div class="col-xs-12 col-sm-6 col-md-6">   
					<div class="form-group">
					<textarea id="cabout" name="cabout" class="form-control input-lg" tabindex="1" required></textarea>
					</div>
				  </div>
				</div>
				<legend>Company POC Details</legend>
				
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
				</fieldset>
				
			
			<div class="row">
				<div class="col-xs-12 col-md-6"><input name="add" type="submit" value="ADD" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<!--<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>-->
			</div>
				</form>
				<hr class="colorgraph">
				

	</div>
</div>
</div>

</body>

</html>
