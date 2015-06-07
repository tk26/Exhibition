<?php
require '../session1.php';
//echo $role;
//echo $uid;
//echo $username;
if($role!=1)
	{
		echo "<script>window.location='../login.php'</script>";
	}
	require 'master.php';		 	    
?>
<title><?php echo $username.' : Profile' ?> </title>
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
                            <input class="form-control" name="fname" type="text"  placeholder="First Name" value="<?php echo !empty($fname)?$fname:'';?>" required>
                            
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-sm-2">Last Name</label>
                      <div class="col-sm-10">
                            <input name="lname" class="form-control" type="text"  placeholder="Last Name" value="<?php echo !empty($lname)?$lname:'';?>" required>
                           
                        </div>
                      </div>
					  <div class="form-group" >
                        <label class="control-label col-sm-2">Display Name</label>
                       <div class="col-sm-10">
                            <input name="dname" class="form-control" type="text"  placeholder="Display Name" value="<?php echo !empty($dname)?$dname:'';?>" required>
                           
                        </div>
                      </div>
                      
                      <div class="form-group" >
                         <label class="control-label col-sm-2">Contact</label>
                       <div class="col-sm-10">
                            <input name="contact" type="text" class="form-control"  placeholder="Contact Number" value="<?php echo !empty($contact)?$contact:'';?>" required>
                            
                        </div>
                      </div>
                      <div class="form-group" <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label col-sm-2">Email</label>
                   <div class="col-sm-10">
                            <input name="email" class="form-control" type="text" placeholder="Email Address" disabled="true" value="<?php echo !empty($email)?$email:'';?>">
                            
                        </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-sm-2">Company</label>
                       <div class="col-sm-10">
                            <input name="company" type="text" class="form-control"  placeholder="Company Name" disabled="true" value="<?php echo !empty($contact)?$contact:'';?>">
                            
                        </div>
                        </div>
                        
                         <div class="form-group">
                      <label class="control-label col-sm-2">Role</label>
                       <div class="col-sm-10">
                            <input name="role" type="text" class="form-control"  placeholder="User Role" disabled="true" value="POC">
                            
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


 
