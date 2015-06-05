<?php
include '../database.php';
		$id=$_POST["id"];
		if($id==1)
        { 
		echo '<label class="control-label" for="role">Select Company</label>
			  <div class="controls">';
		
		echo '<select id="cid" name="cid" class="input-xxlarge">';
		$pdo = Database::connect();
        $sql = 'SELECT cid,cname FROM companies';
        foreach ($pdo->query($sql) as $row) {
?>
	<option value="<?php echo $row["cid"]; ?>"><?php echo $row["cname"]; ?></option>
<?php
		}
		echo '</select></div>';
		}
		Database::disconnect();
?>