<?php
			include '../database.php';
			$op = $_GET['op'];
			$np = $_GET['np'];
			$uid = $_GET['uid'];
			
			$pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
            
			$sql = "SELECT count(*) from users WHERE uid = ? AND upwd=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($uid,$op));
			$count = $q->fetchColumn(); 
			if($count==1)
			{   $sql = "UPDATE users  set upwd=? WHERE uid = ?";
				$q = $pdo->prepare($sql);
				$q->execute(array($np,$uid));
				
				$sql = "SELECT count(*) from companies WHERE primarypocuid";
                $q = $pdo->prepare($sql);
                $q->execute(array($uid));
			    $count2 = $q->fetchColumn();
				if($count2==1)				
			    {   $sql = "UPDATE companies  set primarypocpwd=? WHERE primarypocuid = ?";
					$q = $pdo->prepare($sql);
					$q->execute(array($np,$uid));
					
				}
				echo "Password Updated";
			}
			else echo "Enter correct old Password";
			Database::disconnect();
           
	

?>