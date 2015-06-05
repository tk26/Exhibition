<?php
require '../session1.php';
//echo $role;
//echo $uid;
//echo $username;
if($role!=3)
	{
		echo "<script>window.location='../login.php'</script>";
	}

?>