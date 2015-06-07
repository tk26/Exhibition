<?php
require '../session1.php';
//echo $role;
//echo $uid;
//echo $username;
if ($role != 1) {
    echo "<script>window.location='../login.php'</script>";
}
	require 'master.php';	   
?>
<?php 
include '../database.php';
				   $cid=0;
				   $pdo = Database::connect();
				   $sql = "SELECT * FROM companies where primarypocuid = ?";
				   $q = $pdo->prepare($sql);
				   $q->execute(array($uid));
                   $data = $q->fetch(PDO::FETCH_ASSOC);
                   $cid = $data['cid'];
				   $disabled=1;
				   if($cid!=0)
				   {	$disabled=0;
						$cname = $data['cname'];
						$cabout = $data['cabout'];
						$sid = $data['sid'];
						$primarypocuid = $data['primarypocuid'];
						$primarypocuname = $data['primarypocuname'];
						$primarypocfname = $data['primarypocfname'];
						$primarypoclname = $data['primarypoclname'];
						$primarypocemail = $data['primarypocemail'];
						$primarypoccontact = $data['primarypoccontact'];
					  
				   }
				   else
                   {	
						$sql = "SELECT * FROM ciduidlist where uid=? ";
						$q = $pdo->prepare($sql);
						$q->execute(array($uid));
						$data = $q->fetch(PDO::FETCH_ASSOC);
						$cid=$data['cid'];
						$sql = "SELECT * FROM companies where cid=? ";
						$q = $pdo->prepare($sql);
						$q->execute(array($cid));
						$data = $q->fetch(PDO::FETCH_ASSOC);
						$cname = $data['cname'];
						$cabout = $data['cabout'];
						$sid = $data['sid'];
						$primarypocuid = $data['primarypocuid'];
						$primarypocuname = $data['primarypocuname'];
						$primarypocfname = $data['primarypocfname'];
						$primarypoclname = $data['primarypoclname'];
						$primarypocemail = $data['primarypocemail'];
						$primarypoccontact = $data['primarypoccontact'];
                   
				   }
				   // cid is now with us.. query users with uids for this cid
				  // echo 'cid='.$cid;
				   $sql = "SELECT sname FROM subdomains where sid=? ";
						$q = $pdo->prepare($sql);
						$q->execute(array($sid));
						$data = $q->fetch(PDO::FETCH_ASSOC);
						$subdomain=$data['sname'];
                   Database::disconnect();
?>
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
    var placeholder=$(parent).find('#lblyear').text();
	
    //hide label
    $(parent).find('#lblyear').hide();
    //show input, set placeholder
    var input=$(parent).find("input[class*='input-year']");
	
    $(input).show();
    $(input).attr('placeholder', placeholder);
	} 
}
</script>
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
 var comname = document.getElementById('companyname').value;
 var comabout = document.getElementById('companyabout').value;
 
 var cidvalue = document.getElementById('cidvalue').value;
// var sex = document.getElementById('sex').value;
 var queryString = "?cn=" + comname ;
 queryString +=  "&ca=" + comabout + "&cid=" + cidvalue ;
 ajaxRequest.open("GET", "updateCompanyProfile.php" + 
                              queryString, true);
 ajaxRequest.send(null); 
}
//-->
</script>
</head>

<title> Company Profile </title>
<div class="container">
 
<div class="row">

	  <div class="col-md-10">
			<form name="myform" class="form-horizontal" action="javascript:void(0);" method="post" >
				<fieldset>

				<!-- Form Name -->
				<legend>Company Profile</legend>
				<!-- Text input-->
				<input type="hidden" name="cidvalue" id="cidvalue" value="<?php echo $cid ?>">
				<div class="row">
				<div class="jumbotron" > 
					<button id="edit" onclick="show();" class="btn btn-primary pull-right btn-sm RbtnMargin" type="button" <?php if ($disabled == 1) echo 'disabled="true"' ?>>Edit Company Profile</button>
				 <div class="well well-sm">
                <div class="row">
			
                    <div class="col-xs-6 col-md-3">
                        <img src="../images/virtual-conference.jpg" alt="Company Logo" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-md-8">
                        <h3>
                        <p class="company-info"><?php echo $cname ?></p></h3>
						<input type="text" class="input-company" name="companyname" id="companyname" style="display:none;" required>
						<div class="controls">
        <a href="#" id="btncompanyname" onclick="edit(this);" class="label label-info">Edit Name</a>
    </div><br/>
                        <small id="lblLocation">Put Location Here<i class="glyphicon glyphicon-map-marker">
                        </i></small>
								<input type="text" class="input-location" style="display:none;" required>
						<div class="controls">
        <a href="#" id="btnlocation" onclick="edit(this);" class="label label-info">Edit Location</a>
    </div><br />
                        
                            <i id="lblemail" class="glyphicon glyphicon-envelope"> Enquiry Email</i>	
							<input type="text" class="input-email" style="display:none;" required>
							<div class="controls">
        <a href="#" id="btnemail" onclick="edit(this);" class="label label-info">Edit Email</a>
    </div>
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a id="lblwebsite" href="#">Website</a>
	<input type="text" class="input-site" style="display:none;" required>
							<div class="controls">
        <a href="#" id="btnsite" onclick="edit(this);" class="label label-info">Edit Website Url</a>
    </div>                           
						   <br />
                            Date of Establishment
                        <!-- Split button -->
                      <input type="text" class="input-year" style="display:none;" required>
							<div class="controls">
        <a href="#" id="btnYear" onclick="edit(this);" class="label label-info">Edit Date of Establishment</a>
    </div>   
                    </div>
                </div>
            </div>
  


				
				
				</div>
				</div>
	<div>
      <label for="domain" class="col-sm-2">Domain</label>
      
     <br/><br/>
	</div> 
   <div>
      <label for="subdomain" class="col-sm-2 ">Sub-Domain :</label>
      
         <?php echo $subdomain?>
      
   </div>
   <br/>
   <div class="form-group">
     <label for="cabout" class="col-sm-2 control-label">About Company</label>
      <div class="col-sm-10">
       
				 
				
					<textarea id="companyabout" name="companyabout" style="overflow:auto;resize:none" rows="13" cols="20" name="cabout" class="form-control input-lg" tabindex="1" required <?php if ($disabled == 1) echo 'disabled="true"' ?> ><?php echo $cabout?></textarea>
			
				
      </div>
   </div>
   
   <center><big><div id='ajaxDiv'></div><input type='button' onclick='ajaxFunction()' 
                              value='SAVE'/></big></center>
   </form>	 
  
 
		
			

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
				
				<legend>Company Primary POC Details</legend>
			  <div class="form-group">
				<label for="wholename" class="col-sm-2">Name : </label>
				  <div class="col-md-10">
						 <label for="wholename" class="col-md-8"><?php echo $primarypocfname.' '.$primarypoclname?></label>
				  </div>
			   </div>
    
				<div class="form-group">
				  <label for="dname" class="col-sm-2">Display Name : </label>
				  <div class="col-md-10">
						<label for="dname" class="col-md-8"><?php echo $primarypocuname?></label>
				  </div>
			   </div>

				<div class="form-group">
				  <label for="pocemail" class="col-sm-2">Email : </label>
				  <div class="col-md-10">
						 <label for="pocemail" class="col-md-8"><?php echo $primarypocemail?></label>
				  </div>
				</div>
				
				<div class="form-group">
				  <label for="poccontact" class="col-sm-2">Contact Number : </label>
				  <div class="col-md-10">
					   <label for="poccontact" class="col-md-8"><?php echo $primarypoccontact ?></label>
				  </div>
			    </div>
   
				</fieldset>
				
		
		
				
				<hr class="colorgraph">
				<?php 
				$pdo = Database::connect();
				   
				   
				      echo '<h3>Company Members List</h3>
                
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>First Name</th>
					  <th>Last Name</th>
					  <th>Display Name</th>
                      <th>Email</th>
                      <th>Contact</th>
					  
                    </tr>
                  </thead>
                  <tbody>';
				   $sql = 'SELECT * FROM users inner join ciduidlist where users.uid=ciduidlist.uid AND ciduidlist.cid=?';
				   $q = $pdo->prepare($sql);
				   $q->execute(array($cid));
                   foreach ($q->fetchAll() as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['ufname'] . '</td>';
							echo '<td>'. $row['ulname'] . '</td>';
							echo '<td>'. $row['uname'] . '</td>';
							echo '<td>'. $row['uemail'] . '</td>';
                            echo '<td>'. $row['ucontact'] . '</td>';
							
							

                            echo '</tr>';
                   }
				   
				   
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
                
	</div>
	
</div>
</div>

</body>


</html>
