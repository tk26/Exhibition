<?php
session_start();
if(!isset($_SESSION['uid']))
{	echo "<script>window.location='../login.php'</script>";
}
else
{	$uid=$_SESSION['uid'];
	$role=$_SESSION['rid'];
	$username=$_SESSION['username'];
}
			
?>	