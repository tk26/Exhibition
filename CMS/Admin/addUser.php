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
<title> Add User </title>
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
		$rid = $_POST['role'];
		$cid=$_POST['cid'];
         
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO users (rid,uname,ufname,ulname,uemail,upwd,ucontact) values(?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($rid,$displayname,$firstname,$lastname,$email,$hashedpassword,$contact));
			$newuid = $pdo->lastInsertId();
			$sql = "INSERT INTO ciduidlist (cid,uid) values(?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($cid,$newuid));
			Database::disconnect();
			echo "User Added! Hit refresh to continue adding <script>window.location='dashboard.php'</script>";
    }
	
?>

<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="<?php $_PHP_SELF ?>" method="post" onsubmit="return myFunction()">
			<h2>Add a New User</h2>
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
			<!-- Select Basic -->
			
			<div class="control-group">
			  <label class="control-label" for="role">Select Role</label>
			  <div class="controls">
				<select id="role" name="role" class="input-xxlarge" onChange="getState(this.value);">
				  <option value="1">Company POC</option>
				  <option value="2">Company Executive</option>
				  <option value="3">End User</option>
				  <option value="4">Super User</option>
				</select>
			  </div>
			</div>
			
			<div class="control-group" id="company-list">
			  
			</div>
			
			

			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input name="add" type="submit" value="ADD" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<!--<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>-->
			</div>
		</form>
	</div>
</div>
</div>

</body>

</html>
