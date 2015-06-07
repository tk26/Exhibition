<?php
require '../session1.php';
//echo $role;
//echo $uid;
//echo $username;
if ($role != 1) {
    echo "<script>window.location='../login.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
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

    <title>Company Profile</title>

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
<style>

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
display: block;
line-height: 1.428571429;
color: #999;
}

.control-label .text-info { display:inline-block; }


#dvPreview
{
    filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
    min-height: 400px;
    min-width: 400px;
    display: none;
}

</style>

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
    
      

    $(btnYear).hide();
       $(btncompanyname).hide();
       $(btnlocation).hide();
       $(btnemail).hide();
          $(btnsite).hide();
       
});

function show()
{
    $(btnYear).show();
       $(btncompanyname).show();
       $(btnlocation).show();
       $(btnemail).show();
          $(btnsite).show();
        document.getElementById("sid").disabled=false;
      document.getElementById("did").disabled=false;
       document.getElementById("cabout").disabled=false;
      
}


function edit(element) {
	if(element.id=='btncompanyname')
	{
    var parent=$(element).parent().parent();
    var placeholder=$(parent).find('.company-info').text();
	
    //hide label
    $(parent).find('p').hide();
    //show input, set placeholder
    var input=$(parent).find("input[class*='input-company']");
	
    $(input).show();
    $(input).attr('placeholder', placeholder);
	}
	else if(element.id=='btnlocation')
	{
	
		  var parent=$(element).parent().parent();
    var placeholder=$(parent).find('#lblLocation').text();
	
    //hide label
    $(parent).find('small').hide();
    //show input, set placeholder
    var input=$(parent).find("input[class*='input-location']");
	
    $(input).show();
    $(input).attr('placeholder', placeholder);
	}
	else if(element.id=='btnemail')
	{
	
		  var parent=$(element).parent().parent();
    var placeholder=$(parent).find('#lblemail').text();
	
    //hide label
    $(parent).find('#lblemail').hide();
    //show input, set placeholder
    var input=$(parent).find("input[class*='input-email']");
	
    $(input).show();
    $(input).attr('placeholder', placeholder);
	}
	else if(element.id=='btnsite')
	{
	
		  var parent=$(element).parent().parent();
          var placeholder=$(parent).find('#lblwebsite').text();
	
    //hide label
    $(parent).find('#lblwebsite').hide();
    //show input, set placeholder
    var input=$(parent).find("input[class*='input-site']");
	
    $(input).show();
    $(input).attr('placeholder', placeholder);
	} 
	else if(element.id=='btnYear')
	{
	
		  var parent=$(element).parent().parent();
    var placeholder=$(parent).find('#lblYear').text();
	
    //hide label
    $(parent).find('#lblYear').hide();
    //show input, set placeholder
    var input=$(parent).find("input[class*='input-year']");
	
    $(input).show();
    $(input).attr('placeholder', placeholder);
	} 
}
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
			<li><a href='index.php'><img src="images/logo.jpg"></a></li>
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo
$username; ?><span class="caret"></span></a>
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
        <li><a href="dashboard.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="addProduct.php">Add Product</a></li>
            <li><a href="manageProducts.php">Manage Products</a></li>
      
            
          </ul>
        </li>       		
        <li ><a href="#">Exhibitions<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>        
		<li class="active"><a href="companyProfile.php">Company Profile</a></li>        
     
      </ul>
    </div>
  </div>
</nav>

<div class="container">
 
<div class="row">

	  <div class="col-md-10">
			<form class="form-horizontal" action="<?php $_PHP_SELF ?>" method="post" onsubmit="return myFunction()">
				<fieldset>

				<!-- Form Name -->
				<legend>Company Profile</legend>
				<!-- Text input-->
				
				<div class="row">
				<div class="jumbotron" > 
					<button id="edit" onclick="show();" class="btn btn-primary pull-right btn-sm RbtnMargin" type="button">Edit Company Profile</button>
				 <div class="well well-sm">
                <div class="row">
			
                    <div class="col-xs-6 col-md-3">
                        <img src="../images/virtual-conference.jpg" alt="Company Logo" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-md-8">
                        <h3>
                        <p class="company-info">Virtual Exhibition</p></h3>
						<input type="text" class="input-company" style="display:none;">
						<div class="controls">
        <a href="#" id="btncompanyname" onclick="edit(this);" class="label label-info">Edit Name</a>
    </div><br/>
                        <small id="lblLocation">Mumbai, India <i class="glyphicon glyphicon-map-marker">
                        </i></small>
								<input type="text" class="input-location" style="display:none;">
						<div class="controls">
        <a href="#" id="btnlocation" onclick="edit(this);" class="label label-info">Edit Location</a>
    </div><br />
                        
                            <i id="lblemail" class="glyphicon glyphicon-envelope"> email@example.com</i>	
							<input type="text" class="input-email" style="display:none;">
							<div class="controls">
        <a href="#" id="btnemail" onclick="edit(this);" class="label label-info">Edit Email</a>
    </div>
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a id="lblwebsite" href="#">www.Virtualexhibtion.com</a>
	<input type="text" class="input-site" style="display:none;">
							<div class="controls">
        <a href="#" id="btnsite" onclick="edit(this);" class="label label-info">Edit Website Url</a>
    </div>                           
						   <br />
                           <small id="lblYear">June 06, 2015</small>
                         
                        <!-- Split button -->
                      <input type="text" class="input-year" style="display:none;">
							<div class="controls">
        <a href="#" id="btnYear" onclick="edit(this);" class="label label-info">Edit Year Established</a>
    </div>   
                    </div>
                </div>
            </div>
  <h3>Banner Text/Short description</h3>


				
				
				</div>
				</div>
				 <div class="form-group">
      <label for="domain" class="col-sm-2 control-label">Domain</label>
      <div class="col-sm-10">
     <select id="did" name="did" class="form-control input-large" placeholder="Choose Domain" disabled="true">
					  <option value="1">domain1</option>
					  <option value="2">domain2</option>
					  <option value="3">domain3</option>
					  <option value="4">domain4</option>
					</select>
      </div>
   </div>
   <div class="form-group">
      <label for="subdomain" class="col-sm-2 control-label">Sub-Domain</label>
      <div class="col-sm-10">
        <select id="sid" name="sid" class="form-control input-large" placeholder="Choose Sub-Domain" disabled="true">
					  <option value="1">subdomain1</option>
					  <option value="2">subdomain2</option>
					  <option value="3">subdomain3</option>
					  <option value="4">subdomain4</option>
					</select>
      </div>
   </div>
   <div class="form-group">
     <label for="lastname" class="col-sm-2 control-label">About Company</label>
      <div class="col-sm-10">
       <label class="label label-info" for="cabout">About The Company</label>
				 
				
					<textarea id="cabout" style="overflow:auto;resize:none" rows="13" cols="20" name="cabout" class="form-control input-lg" tabindex="1" required disabled="true"></textarea>
			
				
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
				
				<legend>Company POC Details</legend>
			  <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">First Name</label>
      <div class="col-md-10">
             <label for="lastname" class="col-md-8">Hitesh Mirchandani</label>
      </div>
   </div>
    <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Last Name</label>
      <div class="col-md-10">
            <label for="lastname" class="col-md-8">Mirchandani</label>
      </div>
   </div>
    <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Email</label>
      <div class="col-md-10">
             <label for="lastname" class="col-md-8">Hitesh@gmail.com</label>
      </div>
   </div>
    <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Contact Number</label>
      <div class="col-md-10">
           <label for="lastname" class="col-md-8">12345</label>
      </div>
   </div>
   
				</fieldset>
				
		
		
				</form>	 
				<hr class="colorgraph">
                
	</div>
	
</div>
</div>

</body>


</html>
