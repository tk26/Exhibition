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
				   //get cname
				   $sql = "SELECT cname from companies where primarypocuid = ? OR cid IN (select cid from ciduidlist where uid =?)";
				   $q = $pdo->prepare($sql);
				   $q->execute(array($uid,$uid));
				    $data = $q->fetch(PDO::FETCH_ASSOC);
                   $cname = $data['cname'];
                   



?>


<script src="http://crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/md5.js"></script>

<script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function ajaxFunction(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.
 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){
      var ajaxDisplay = document.getElementById('ajaxDiv');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
 }
 // Now get the value from user and pass it to
 // server script.
 var uname = document.getElementById('uname').value;
 var ufname = document.getElementById('ufname').value;
 var ulname = document.getElementById('ulname').value;
 var ucontact = document.getElementById('ucontact').value;
 
 var uid = document.getElementById('uid').value;
// var sex = document.getElementById('sex').value;
 var queryString = "?uname=" + uname ;
 queryString +=  "&ufname=" + ufname + "&ulname=" + ulname  + "&ucontact=" + ucontact  + "&uid=" + uid ;
 ajaxRequest.open("GET", "updateUserProfilePOC.php" + 
                              queryString, true);
 ajaxRequest.send(null); 
}
//-->

function ajaxFunction2(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.
 var ajaxDisplay = document.getElementById('ajaxDiv2');
 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){
      
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
 }
 // Now get the value from user and pass it to
 // server script.
 var op = document.getElementById('op').value;
 var np = document.getElementById('np').value;
 var cnp = document.getElementById('cnp').value;
  var uid = document.getElementById('uid').value;
  
  var oldpasshash = CryptoJS.MD5(op);
  var newpasshash = CryptoJS.MD5(np);
  
 if(cnp == np && np.length >=8 )
 {	 
 var queryString = "?op=" + oldpasshash ;
 queryString +=  "&np=" + newpasshash + "&uid=" + uid   ;
 ajaxRequest.open("GET", "updatePOCPassword.php" + 
                              queryString, true);
 ajaxRequest.send(null); 
}
else {ajaxDisplay.innerHTML = "Passwords Do not Match and/Or Minimum length required is 8 ";}
}
</script>

<div class="container">


    <div class="col-md-8">
		

     
                <div class="span10 offset1">
                    <div class="row">
                        <CENTER><h3>User Details</h3></CENTER>
                    </div>
             <input type="hidden" name="uid" id="uid" value="<?php echo $uid ?>">
                    <form name="myform" class="form-horizontal" action="javascript:void(0);" method="post">
                      <div class="form-group">
                        <label class="control-label col-sm-2">First Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="ufname" id="ufname" type="text"  placeholder="First Name" value="<?php echo $ufname ?>" required>
                            
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-sm-2">Last Name</label>
                      <div class="col-sm-10">
                            <input name="ulname" class="form-control" type="text" id="ulname" placeholder="Last Name" value="<?php echo $ulname ?>" required>
                           
                        </div>
                      </div>
					  <div class="form-group" >
                        <label class="control-label col-sm-2">Display Name</label>
                       <div class="col-sm-10">
                            <input name="uname" id="uname"class="form-control" type="text"  placeholder="Display Name" value="<?php echo $uname ?>" required>
                           
                        </div>
                      </div>
                      
                      <div class="form-group" >
                         <label class="control-label col-sm-2">Contact</label>
                       <div class="col-sm-10">
                            <input name="ucontact" id="ucontact" type="text" class="form-control"  placeholder="Contact Number" value="<?php echo $ucontact ?>" required>
                            
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2">Email</label>
                   <div class="col-sm-10">
                            <input name="uemail" id="uemail" class="form-control" type="text" placeholder="Email Address" disabled="true" value="<?php echo $uemail?>">
                            
                        </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-sm-2">Company</label>
                       <div class="col-sm-10">
                            <input name="company" type="text" class="form-control"  placeholder="Company Name" disabled="true" value="<?php echo $cname ?>">
                            
                        </div>
                        </div>
                        
                         <div class="form-group">
                      <label class="control-label col-sm-2">Role</label>
                       <div class="col-sm-10">
                            <input name="role" type="text" class="form-control"  placeholder="User Role" disabled="true" value="POC">
                            
                        </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                           <div id='ajaxDiv'>
						   </div>
						   <input type='button' onclick='ajaxFunction()' value='SAVE'/>
                         
                        </div>
                    </form>
					<br/><br/><h4>Change Password : </h4>
					<form name="myform2" class="form-horizontal" action="javascript:void(0);" method="post">
                      <div class="form-group">
                        <label class="control-label col-sm-2">Old : </label>
                        <div class="col-sm-10">
                            <input class="form-control" name="op" id="op" type="password"  placeholder=" "  required>
                            
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-sm-2">New : </label>
                      <div class="col-sm-10">
                            <input name="np" class="form-control" type="password" id="np" placeholder=" "  required>
                           
                        </div>
                      </div>
					  <div class="form-group" >
                        <label class="control-label col-sm-2">Confirm New : </label>
                       <div class="col-sm-10">
                            <input name="cnp" id="cnp" class="form-control" type="password"  placeholder=" " required>
                           
                        </div>
                      </div>
					  <div class="col-sm-offset-2 col-sm-10">
                           <div id='ajaxDiv2'>
						   </div>
						   <input type='submit' onclick='ajaxFunction2()' value='CHANGE'/>
                         
                        </div>
					  </form>
                </div>
                 
  
	
</div>
</div>
</body>

</html>


 
