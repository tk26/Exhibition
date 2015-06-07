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
<?php
    require '../database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: dashboard.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $firstnameError = null;
		$lastnameError = null;
		$displaynameError = null;
        $emailError = null;
        $contactError = null;
         
        // keep track post values
        $fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$dname = $_POST['dname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
         
        // validate input
        $valid = true;
        if (empty($fname)) {
            $firstnameError = 'Please enter First Name';
            $valid = false;
        }
		
        if (empty($lname)) {
            $lastnameError = 'Please enter Last Name"';
            $valid = false;
        }
		if (empty($dname)) {
            $displaynameError = 'Please enter Display Name';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
         
        if (empty($contact)) {
            $contactError = 'Please enter Contact';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE users  set ufname = ?,ulname = ?, uname = ?, uemail = ?, ucontact =? WHERE uid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($fname,$lname,$dname,$email,$contact,$id));
			
			$sql = "SELECT count(*) FROM companies where primarypocuid = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($id));
			$count=$q->fetchColumn(); 
			
			if($count==1)
			{
				$sql = "UPDATE companies  set primarypocfname = ?,primarypoclname = ?, primarypocuname = ?, primarypocemail = ?, primarypoccontact =? WHERE primarypocuid = ?";
				$q = $pdo->prepare($sql);
				$q->execute(array($fname,$lname,$dname,$email,$contact,$id));
			}
            
			Database::disconnect();
            header("Location: dashboard.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM users where uid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $fname = $data['ufname'];
		$lname = $data['ulname'];
		$dname = $data['uname'];
        $email = $data['uemail'];
        $contact = $data['ucontact'];
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<script src="../js/jquery-1.11.3.js"></script>
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
	
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a User</h3>
                    </div>
             
                    <form class="form-horizontal" action="updateUser.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($firstnameError)?'error':'';?>">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <input name="fname" type="text"  placeholder="First Name" value="<?php echo !empty($fname)?$fname:'';?>">
                            <?php if (!empty($firstnameError)): ?>
                                <span class="help-inline"><?php echo $firstnameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($lastnameError)?'error':'';?>">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <input name="lname" type="text"  placeholder="Last Name" value="<?php echo !empty($lname)?$lname:'';?>">
                            <?php if (!empty($lastnameError)): ?>
                                <span class="help-inline"><?php echo $lastnameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($displaynameError)?'error':'';?>">
                        <label class="control-label">Display Name</label>
                        <div class="controls">
                            <input name="dname" type="text"  placeholder="Display Name" value="<?php echo !empty($dname)?$dname:'';?>">
                            <?php if (!empty($displaynameError)): ?>
                                <span class="help-inline"><?php echo $displaynameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($contactError)?'error':'';?>">
                        <label class="control-label">Contact</label>
                        <div class="controls">
                            <input name="contact" type="text"  placeholder="Contact Number" value="<?php echo !empty($contact)?$contact:'';?>">
                            <?php if (!empty($contactError)): ?>
                                <span class="help-inline"><?php echo $contactError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="manageUsers.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
