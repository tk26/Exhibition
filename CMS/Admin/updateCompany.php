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
    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT primarypocuid FROM companies where  cid= ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$uid = $data['primarypocuid'];
        Database::disconnect();
		
    if ( !empty($_POST)) {
        // keep track validation errors
		$cnameError = null;
		$caboutError = null;
        $firstnameError = null;
		$lastnameError = null;
		$displaynameError = null;
        $emailError = null;
        $contactError = null;
         
        // keep track post values
		$cname = $_POST['cname'];
		$cabout = $_POST['cabout'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$dname = $_POST['dname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
         
        // validate input
        $valid = true;
		 if (empty($cname)) {
            $cnameError = 'Please enter Company Name';
            $valid = false;
        }
		 if (empty($cabout)) {
            $caboutError = 'Please enter About the Company';
            $valid = false;
        }
        if (empty($fname)) {
            $firstnameError = 'Please enter First Name';
            $valid = false;
        }
		
        if (empty($fname)) {
            $lastnameError = 'Please enter Last Name';
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
            $sql = "UPDATE companies  set cname = ?,cabout = ?, primarypocfname = ?,primarypoclname = ?, primarypocuname = ?,primarypocemail = ?, primarypoccontact =? WHERE cid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($cname,$cabout,$fname,$lname,$dname,$email,$contact,$id));
		//update corresponding users table data
			$sql = "UPDATE users  set uname = ?, ufname = ?,ulname = ?, uemail = ?,ucontact =? WHERE uid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($dname,$fname,$lname,$email,$contact,$uid));

            Database::disconnect();
            header("Location: dashboard.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM companies where cid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$cname = $data['cname'];
		$cabout = $data['cabout'];
        $fname = $data['primarypocfname'];
		$lname = $data['primarypoclname'];
		$dname = $data['primarypocuname'];
        $email = $data['primarypocemail'];
        $contact = $data['primarypoccontact'];
		$uid = $data['primarypocuid'];
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
                        <h3>Update a Company</h3>
                    </div>
             
                    <form class="form-horizontal" action="updateCompany.php?id=<?php echo $id?>" method="post">
					<div class="control-group <?php echo !empty($cnameError)?'error':'';?>">
                        <label class="control-label">Company Name</label>
                        <div class="controls">
                            <input name="cname" type="text"  placeholder="Company Name" value="<?php echo !empty($cname)?$cname:'';?>">
                            <?php if (!empty($cnameError)): ?>
                                <span class="help-inline"><?php echo $cnameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					 <div class="control-group <?php echo !empty($caboutError)?'error':'';?>">
                        <label class="control-label">About Company</label>
                        <div class="controls">
                            <input name="cabout" type="text"  placeholder="About Company" value="<?php echo !empty($cabout)?$cabout:'';?>">
                            <?php if (!empty($caboutError)): ?>
                                <span class="help-inline"><?php echo $caboutError;?></span>
                            <?php endif; ?>
                        </div>
                      </div> 
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
                          <a class="btn" href="manageCompanies.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
