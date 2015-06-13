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
<title> Manage Products </title>
<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
 <?php
                   include '../database.php';
				   $cid=0;
				   //$cid=1;
                   $pdo = Database::connect();
				   $sql = "SELECT cid FROM ciduidlist c inner join users on users.uid=c.uid where users.uid = ?";
				   $q = $pdo->prepare($sql);
				   $q->execute(array($uid));
                   $data = $q->fetch(PDO::FETCH_ASSOC);
                   $cid = $data['cid'];
				   if($cid==0)
				   {
					   
					   echo "<h1> You dont have access to manage products </h1>";
				      
				   }
				   else
                   {
					   echo '<h3>Products List</h3>
                
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Product Name</th>
					  <th>Product Code</th>
					  <th>Company Name</th>
                      <th>product Description</th>
                  
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
				   $sql = 'SELECT *,companies.* FROM products inner join companies where products.cid = companies.cid AND companies.cid=?';
				   $q = $pdo->prepare($sql);
				   $q->execute(array($cid));
                   foreach ($q->fetchAll() as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['pname'] . '</td>';
							echo '<td>'. $row['psetid'] . '</td>';
							echo '<td>'. $row['cname'] . '</td>';
							echo '<td>'. $row['pdesc'] . '</td>';
                           
							
							echo '<td width=250>';
                                echo '<a class="btn btn-success" href=#?id='.$row['pid'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="#?id='.$row['pid'].'">Delete</a>';
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