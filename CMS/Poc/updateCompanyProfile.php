<?php
			include '../database.php';
			$cname = $_GET['cn'];
			$cabout = $_GET['ca'];
			//$wpm = $_GET['wpm'];
			$cid = $_GET['cid'];
			
			$pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE companies  set cname = ?,cabout = ? WHERE cid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($cname,$cabout,$cid));
            Database::disconnect();
           
	
	
echo "Profile Updated";
?>