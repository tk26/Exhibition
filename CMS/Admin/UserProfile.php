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

   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
		

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
	   <link href="../css/poc.css" rel="stylesheet">

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
			 <!-- <?php echo $_SESSION['uid']?>-->
                <li><a href="UserProfile.php?id=15">My Profile</a></li>
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
        <li class="active"><a href="dashboard.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
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
				<li><a href="addCompany.php">Add Company</a></li>
				<li><a href="manageCompanies.php">Manage Companies</a></li>
      
            
			</ul>
        </li>       		
        <li ><a href="#">Exhibitions<span style="font-size:16px;" class="pull-right hidden-xs showopacity "></span></a></li>        
		<li ><a href="#">Access Controls</a></li>  
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

<div class="container">


    <div class="col-md-8">
		

     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>User Details</h3>
                    </div>
             
                    <form class="form-horizontal" action="updateUser.php?id=<?php echo $id?>" method="post">
                      <div class="form-group" <?php echo !empty($firstnameError)?'error':'';?>">
                        <label class="control-label col-sm-2">First Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="fname" type="text"  placeholder="First Name" value="<?php echo !empty($fname)?$fname:'';?>">
                            <?php if (!empty($firstnameError)): ?>
                                <span class="help-inline"><?php echo $firstnameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="form-group" <?php echo !empty($lastnameError)?'error':'';?>">
                        <label class="control-label col-sm-2">Last Name</label>
                      <div class="col-sm-10">
                            <input name="lname" class="form-control" type="text"  placeholder="Last Name" value="<?php echo !empty($lname)?$lname:'';?>">
                            <?php if (!empty($lastnameError)): ?>
                                <span class="help-inline"><?php echo $lastnameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="form-group" <?php echo !empty($displaynameError)?'error':'';?>">
                        <label class="control-label col-sm-2">Display Name</label>
                       <div class="col-sm-10">
                            <input name="dname" class="form-control" type="text"  placeholder="Display Name" value="<?php echo !empty($dname)?$dname:'';?>">
                            <?php if (!empty($displaynameError)): ?>
                                <span class="help-inline"><?php echo $displaynameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="form-group" <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label col-sm-2">Email</label>
                   <div class="col-sm-10">
                            <input name="email" class="form-control" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-group" <?php echo !empty($contactError)?'error':'';?>">
                         <label class="control-label col-sm-2">Contact</label>
                       <div class="col-sm-10">
                            <input name="contact" type="text" class="form-control"  placeholder="Contact Number" value="<?php echo !empty($contact)?$contact:'';?>">
                            <?php if (!empty($contactError)): ?>
                                <span class="help-inline"><?php echo $contactError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Update</button>
                         
                        </div>
                    </form>
                </div>
                 
  
	
</div>
</div>
</body>

</html>


 
