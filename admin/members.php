<?php
	include("_inc/header.php");
	
	if(isset($_GET['action'])){
		$action = $_GET['action'];
		$user = $_GET['uid'];
		
		if($action == "suspend"){
			$sqlsus = "update members set status='0' WHERE id = '$user'";
			$runsus = mysqli_query($con, $sqlsus);
			if($runsus){
				echo "<script>alert('Account Suspended!')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'members.php',1000));</script>";
			}else{
				echo "<script>alert('Error Suspending Account!')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'members.php',1000));</script>";
				//echo "<script>document.ready(window.setTimeout(location.href = 'javascript:history.go(-1)',1000));</script>";
			}
		}elseif($action == "activate"){
			$sqlsus = "update members set status='1' WHERE id = '$user'";
			$runsus = mysqli_query($con, $sqlsus);
			if($runsus){
				echo "<script>alert('Account Activated!')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'members.php',1000));</script>";
			}else{
				echo "<script>alert('Error Activating Account!')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'members.php',1000));</script>";
				//echo "<script>document.ready(window.setTimeout(location.href = 'javascript:history.go(-1)',1000));</script>";
			}
		}elseif($action == "terminate"){
			$sqldel = "DELETE FROM members WHERE id = '$user'";
			$rundel = mysqli_query($con, $sqldel);
			if($rundel){
				echo "<script>alert('Account Termination Successful!')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'members.php',1000));</script>";
			}else{
				echo "<script>alert('Error Terminating Account!')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'members.php',1000));</script>";
			}
		}
	}
	
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Members</h4>

                </div>

            </div>
                <div class="row">

                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class=" panel-default">
                        <div class="panel-heading" style="font-weight: bold;">
                            ALL MEMBERS 
							(
								<?php
								$sql1 = "select * from members"; 
								$res1=mysqli_query($con,$sql1);
								$count1 = mysqli_num_rows($res1); 
								echo $count1;
							?>
							)
							<span style="float: right;">
								<a href="add_member.php"><i class="fa fa-plus-circle"></i> ADD NEW MEMBER</a>
							</span>
                        </div>
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Reg. Date</th>
                                            <th>Last Login</th>
                                            <th>Member Profile Link</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
											$sql = "SELECT * FROM members";
											$run = mysqli_query($con, $sql);
											$no = 0; 
											while($row = mysqli_fetch_array($run)){
												$mem_id=$row['id'];
												$f_name=$row['f_name'];
												$m_name=$row['m_name'];
												$l_name=$row['l_name'];
												$eml=$row['email'];
												$usn=$row['username'];
												$psw=$row['password'];
												$dj=$row['date_joined'];
												$gender=$row['gender'];
												$l_for=$row['looking_for'];
												$bday=$row['b_day'];
												$m_stat=$row['m_status'];
												$city=$row['city'];
												$country=$row['country'];
												$nat=$row['nationality'];
												$religion=$row['religion'];
												$l_seen=$row['last-seen'];
												$pic=$row['picture'];
												$user_stat=$row['status'];
												
												if($user_stat == 1){
													$acc_stat = "<b style='color: green;'>ACTIVE</b> | <a href='members.php?action=suspend&uid=$mem_id'>SUSPEND ACCOUNT</a>";
												}else{
													$acc_stat = "<b style='color: darkred;'>SUSPENDED</b> | <a href='members.php?action=activate&uid=$mem_id'>ACTIVATE ACCOUNT</a>";
												}
												
												$no++;
												
												echo "
													<tr>
														<td>$no</td>
														<td style='text-transform: uppercase;'>".$f_name." ".$m_name.". ".$l_name."</td>
														<td>$eml</td>
														<td>$usn</td>
														<td>$dj</td>
														<td>$l_seen</td>
														<td><a href='../members/profile/index.php?uid=$mem_id' target='new tab'>View ".$f_name."'s Profile</a></td>
														<td>$acc_stat</td>
														<td><a href='members.php?action=terminate&uid=$mem_id'>TERMINATE ACCOUNT</a></td>
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
