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
</head>

<title> Company Profile </title>
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
                            June 06, 2015
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
