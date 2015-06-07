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
<title> Manage Users </title>
<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 ">
	       
                
                  <?php
                   include '../database.php';
				   $cid=0;
				   //$cid=1;
                   $pdo = Database::connect();
				   $sql = "SELECT cid FROM companies where primarypocuid = ?";
				   $q = $pdo->prepare($sql);
				   $q->execute(array($uid));
                   $data = $q->fetch(PDO::FETCH_ASSOC);
                   $cid = $data['cid'];
				   if($cid==0)
				   {
					   
					   echo "<h1> You can manage users only when you are a primary POC of a Company </h1>";
				      
				   }
				   else
                   {
					   echo '<h3>Users List</h3>
                
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>First Name</th>
					  <th>Last Name</th>
					  <th>Display Name</th>
                      <th>Email</th>
                      <th>Contact</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
				   $sql = 'SELECT * FROM users inner join ciduidlist where users.uid = ciduidlist.uid AND cid=?';
				   $q = $pdo->prepare($sql);
				   $q->execute(array($cid));
                   foreach ($q->fetchAll() as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['ufname'] . '</td>';
							echo '<td>'. $row['ulname'] . '</td>';
							echo '<td>'. $row['uname'] . '</td>';
							echo '<td>'. $row['uemail'] . '</td>';
                            echo '<td>'. $row['ucontact'] . '</td>';
							
							echo '<td width=250>';
                                echo '<a class="btn btn-success" href="updateUser.php?id='.$row['uid'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="deleteUser.php?id='.$row['uid'].'">Delete</a>';
                                echo '</td>';

                            echo '</tr>';
                   }
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
