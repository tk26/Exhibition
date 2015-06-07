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
<title> Add Product </title>
<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form class="form-horizontal" action="<?php $_PHP_SELF ?>" method="post" onsubmit="return myFunction()">
				<fieldset>

				<!-- Form Name -->
				<legend>Product Information</legend>
				<!-- Text input-->
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="pname" id="pname" class="form-control input-lg" placeholder="Product Name" tabindex="1" required>
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

                <!-- Select Company -->
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="form-group">
					<select id="sid" name="sid" class="form-control input-large" placeholder="Choose Company" disabled="true">
					  <option value="1">Company1</option>
					  <option value="2">Company2</option>
					  <option value="3">Company3</option>
					  <option value="4">Company4</option>
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
				  <label class="label label-info" for="cabout">About Product</label>
				  <div class="col-xs-12 col-sm-6 col-md-6">   
					<div class="form-group">
					<textarea id="pabout" name="pabout" class="form-control input-lg" tabindex="1" required></textarea>
					</div>
				  </div>
				</div>
				
				
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="product_code" id="product_code" class="form-control input-lg" placeholder="Product Code" tabindex="1" required>
					</div>
				</div>
				
			</div>
            <div class="row">
             <div class="panel with-nav-tabs panel-info">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1info" data-toggle="tab">Tags</a></li>
                            <li><a href="#tab2info" data-toggle="tab">Documents</a></li>
                             <li><a href="#tab3info" data-toggle="tab">Images</a></li>
                            <li><a href="#tab4info" data-toggle="tab">Videos</a></li>
                            
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1info">
                         <div class="form-group">
    <label for="tagname">Tag Name</label>
    <input type="text" class="form-control" id="tagname">
  </div>
  <div class="form-group">
    <label for="tagvalue">Value</label>
    <input type="text" class="form-control" id="tagvalue">
  </div>
  
  <button type="submit" class="btn btn-default">Add Tag</button>
                        
                        
                        </div>
                        <div class="tab-pane fade" id="tab2info">Info 2</div>
                        <div class="tab-pane fade" id="tab3info">Info 3</div>
                        <div class="tab-pane fade" id="tab4info">Info 4</div>
                      
                    </div>
                </div>
            </div>
            </div>
			
				</fieldset>
				
			
			<div class="row">
				<div class="col-xs-12 col-md-6"><input name="add" type="submit" value="ADD" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<!--<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>-->
			</div>
				</form>
				
	</div>
</div>

</body>

</html>
