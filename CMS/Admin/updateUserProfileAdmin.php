<?php
			include '../database.php';
			$uname = $_GET['uname'];
			$ufname = $_GET['ufname'];
			$ulname = $_GET['ulname'];
			$ucontact = $_GET['ucontact'];
			//$wpm = $_POST['wpm'];
			$uid = $_GET['uid'];
			
			$pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE users  set uname = ?,ufname = ?,ulname = ?,ucontact = ? WHERE uid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($uname,$ufname,$ulname,$ucontact,$uid));
            Database::disconnect();
           
	
	
echo "User Profile Updated";
?>