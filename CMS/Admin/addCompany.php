<?php
require '../session1.php';
//echo $role;
//echo $uid;
//echo $username;
if($role!=4)
	{
		echo "<script>window.location='../login.php'</script>";
	}
	require 'master.php';		    
?>
<title> Add Company </title>
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
