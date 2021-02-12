<?php
	include("_inc/header.php");
	
	
	if(isset($_GET['del'])){
		$del_id = $_GET['del'];
			$sqldel1 = "DELETE FROM admins WHERE id = '$del_id'";
			$rundel1 = mysqli_query($con, $sqldel1);
			
			
			if($rundel1){
				echo "<script>alert('Account Deleted Successfully!')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'admins.php',1000));</script>";
			}else{
				echo "<script>alert('Error Deleting Account')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'admins.php',1000));</script>";
			}
		}
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Manage Admins</h4>

                </div>

            </div>
                <div class="row">

                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class=" panel-default">
                        <div class="panel-heading" style="font-weight: bold;">
                            ALL ADMINS 
							(
								<?php
									$sql5 = "select * from admins"; 
									$res5=mysqli_query($con,$sql5);
									$count5 = mysqli_num_rows($res5); 
									echo $count5;
								?>
							)
							<span style="float: right;"><a href="add_admin.php"><i class="fa fa-plus-circle"></i> Add New Admin</a> | <a href="profile.php"><i class="fa fa-user"></i> Manage My Profile</a></span>
                        </div>
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Designation</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
											$sql = "SELECT * FROM admins";
											$run = mysqli_query($con, $sql);
											$no = 0; 
											while($row = mysqli_fetch_array($run)){
												$adm_id=$row['id'];
												$f_name=$row['fname'];
												$l_name=$row['lname'];
												$desig=$row['desig'];
												$uname=$row['uname'];
												$pword=$row['password'];
												
												$no++;
												
												echo "
													<tr>
														<td>$no</td>
														<td>$f_name $l_name</td>
														<td>$uname</td>
														<td>*****</td>
														<td style='text-transform: uppercase; font-weight: bold;'>$desig</td>
														<td><a href='add_admin.php?edit=$adm_id'>EDIT</a></td>
														<td><a href='admins.php?del=$adm_id'>DELETE</a></td>
													</tr>
												";
											}
										?>
									
                                        
                                    </tbody>
                                </table>
                            </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
				
            </div>
           
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
	
	<?php
		include("_inc/footer.php");
	?>
	
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
