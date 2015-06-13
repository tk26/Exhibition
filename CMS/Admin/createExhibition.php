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
<title> Create Exhibition </title>
<?php
     
    require '../database.php';
	 if(isset($_POST['add']))
	{
         
        // keep track post values
        $ename = $_POST['ename'];
		$eabout = $_POST['eabout'];
		$did = $_POST['did'];
		
        $sid = $_POST['sid'];
        $start_date=$_POST['start_date'];
        $end_date=$_POST['end_date'];
	
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CALL createExhibition(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($ename,$eabout,$did,$sid,$start_date,$end_date));
            Database::disconnect();
			echo "Exhibition Created<script>window.location='dashboard.php'</script>";
    }
	
?>
<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form class="form-horizontal" action="<?php $_PHP_SELF ?>" method="post" onsubmit="return myFunction()">
				<fieldset>

				<!-- Form Name -->
				<legend>Exhibition Details</legend>
				<!-- Text input-->
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="ename" id="ename" class="form-control input-lg" placeholder="Exhibition Name Name" tabindex="1" required>
					</div>
				</div>
				</div>
					<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="form-group">
					<select id="did" name="did" class="form-control input-large" placeholder="Choose Domain">
					  <option value="1">domain1</option>
					  <option value="2">domain2</option>
					  <option value="3">domain3</option>
				
					</select>
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
			  <!-- Select Company -->
				<div class="row">
			
                <div class="panel panel-default">
  <div class="panel-heading">Select Participating Companies</div>
  <div class="panel-body">
  
 
			<?php
           
              $pdo = Database::connect();
               $sql = "SELECT DISTINCT cname FROM companies";
                
				   $q = $pdo->prepare($sql);
                    $q->execute();   
     $n = 0;

   foreach ($q->fetchAll() as $row)
{ 
    print "<tr><td>" . PHP_EOL;
    printf('<input type="checkbox" name="section_%2$d" id="section_%2$d" value="%1$s" />
         <label for="section_%2$d">%1$s</label>' . PHP_EOL,
          htmlentities($row['cname'], ENT_QUOTES), $n++
          
        
    );
    print "</td></tr>" . PHP_EOL;
} ?>
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
				  <label class="label label-info" for="cabout">About Exhibition</label>
				  <div class="col-xs-12 col-sm-6 col-md-6">   
					<div class="form-group">
					<textarea id="eabout" name="eabout" class="form-control input-lg" tabindex="1" required></textarea>
					</div>
				  </div>
				</div>
				
				
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="start_date" id="start_date" class="form-control input-lg" placeholder="Start Date" tabindex="1" required>
					</div>
				</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="end_date" id="end_date" class="form-control input-lg" placeholder="End Date" tabindex="1" required>
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
				<div class="col-xs-12 col-md-6"><input name="add" type="submit" value="Create Exhibition" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<!--<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>-->
			</div>
				</form>
				
	</div>
</div>

</body>

</html>
