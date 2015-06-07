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
<title><?php echo $username.' : Profile' ?> </title>
<?php 
include '../database.php';
				   
				   $pdo = Database::connect();
				   $sql = "SELECT * FROM users where uid = ?";
				   $q = $pdo->prepare($sql);
				   $q->execute(array($uid));
                   $data = $q->fetch(PDO::FETCH_ASSOC);
                   $uname = $data['uname'];
				   $ufname = $data['ufname'];
				   $ulname = $data['ulname'];
				   $uemail = $data['uemail'];
				   $ucontact = $data['ucontact'];
				   



?>
<div class="container">


    <div class="col-md-8">
		

     
                <div class="span10 offset1">
                    <div class="row">
                        <CENTER><h3>User Details</h3></CENTER>
                    </div>
             
                    <form class="form-horizontal" action="" method="post">
                      <div class="form-group">
                        <label class="control-label col-sm-2">First Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="fname" type="text"  placeholder="First Name" value="<?php echo $ufname ?>" required>
                            
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-sm-2">Last Name</label>
                      <div class="col-sm-10">
                            <input name="lname" class="form-control" type="text"  placeholder="Last Name" value="<?php echo $ulname ?>" required>
                           
                        </div>
                      </div>
					  <div class="form-group" >
                        <label class="control-label col-sm-2">Display Name</label>
                       <div class="col-sm-10">
                            <input name="dname" class="form-control" type="text"  placeholder="Display Name" value="<?php echo $uname ?>" required>
                           
                        </div>
                      </div>
                      
                      <div class="form-group" >
                         <label class="control-label col-sm-2">Contact</label>
                       <div class="col-sm-10">
                            <input name="contact" type="text" class="form-control"  placeholder="Contact Number" value="<?php echo $ucontact ?>" required>
                            
                        </div>
                      </div>
                      <div class="form-group" <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label col-sm-2">Email</label>
                   <div class="col-sm-10">
                            <input name="email" class="form-control" type="text" placeholder="Email Address" disabled="true" value="<?php echo $uemail?>">
                            
                        </div>
                      </div>
                        
                         <div class="form-group">
                      <label class="control-label col-sm-2">Role</label>
                       <div class="col-sm-10">
                            <input name="role" type="text" class="form-control"  placeholder="User Role" disabled="true" value="Super User / Admin ">
                            
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


 
