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
<title> Manage Companies </title>
<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 ">
	       
                <h3>Companies List</h3>
                
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Company Name</th>
					  <th>About</th>
					  <th>Primary POC Display Name</th>
					  <th>Primary POC First Name</th>
					  <th>Primary POC Last Name</th>
                      <th>Primary POC Email</th>
                      <th>Primary POC Contact</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include '../database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT cid,cname,cabout,primarypocuname,primarypocfname,primarypoclname,primarypocemail,primarypoccontact FROM companies';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['cname'] . '</td>';
							echo '<td>'. $row['cabout'] . '</td>';
							echo '<td>'. $row['primarypocuname'] . '</td>';
							echo '<td>'. $row['primarypocfname'] . '</td>';
							echo '<td>'. $row['primarypoclname'] . '</td>';
							echo '<td>'. $row['primarypocemail'] . '</td>';
                            echo '<td>'. $row['primarypoccontact'] . '</td>';
							
							echo '<td width=250>';
                                echo '<a class="btn btn-success" href="updateCompany.php?id='.$row['cid'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="deleteCompany.php?id='.$row['cid'].'">Delete</a>';
                                echo '</td>';

                            echo '</tr>';
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
