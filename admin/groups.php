<?php
	include("_inc/header.php");
	
	
	if(isset($_GET['set'])){
		$setdata = $_GET['set'];
		$group = $_GET['id'];
		
		if($setdata == "freeze"){
			$qry = "update groups set status='0' where id='$group'";
			$run = mysqli_query($con, $qry);
			
			$qry3a = "insert into group_timeline (group_id, activity) values ('$group', 'Group activity has been frozen! Contact site support for more info, complaints or inquiries.')";
			$run3a = mysqli_query($con, $qry3a);
								
			if($run && $run3a){
				echo "<script>alert('Group Frozen Successfully!')</script>";
				echo "<script>window.location='groups.php';</script>";
			}
		}elseif($setdata == "open"){
			$qry = "update groups set status='1' where id='$group'";
			$run = mysqli_query($con, $qry);
			
			$qry3a = "insert into group_timeline (group_id, activity) values ('$group', 'Group activity has been re-activated! Contact site support for more info, complaints or inquiries.')";
			$run3a = mysqli_query($con, $qry3a);
								
			if($run){
				echo "<script>alert('Group Re-activated Successfully!')</script>";
				echo "<script>window.location='groups.php';</script>";
			}
		}
	}
	
	if(isset($_GET['del'])){
		$del_id = $_GET['del'];
			$sqldel1 = "DELETE FROM groups WHERE id = '$del_id'";
			$rundel1 = mysqli_query($con, $sqldel1);
			
			$sqldel2 = "DELETE FROM group_members WHERE g_id = '$del_id'";
			$rundel2 = mysqli_query($con, $sqldel2);
			
			$sqldel3 = "DELETE FROM group_timeline WHERE group_id = '$del_id'";
			$rundel3 = mysqli_query($con, $sqldel3);			
			
			if($rundel1 && $rundel2 && $rundel3){
				echo "<script>alert('Group Deleted Successfully!')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'groups.php',1000));</script>";
			}else{
				echo "<script>alert('Error Deleting Group')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'groups.php',1000));</script>";
			}
		}
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Manage Groups</h4>

                </div>

            </div>
                <div class="row">

                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class=" panel-default">
                        <div class="panel-heading" style="font-weight: bold;">
                            ALL GROUPS 
							(
								<?php
									$sql2 = "select * from groups"; 
									$res2=mysqli_query($con,$sql2);
									$count2 = mysqli_num_rows($res2); 
									echo $count2;
								?>
							)
                        </div>
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Group Name</th>
                                            <th>Description</th>
                                            <th>Date Created</th>
                                            <th>Group Admin</th>
                                            <th>Group Member Count</th>
                                            <th>Group Page Link</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
											$sql = "SELECT * FROM groups";
											$run = mysqli_query($con, $sql);
											$no = 0; 
											while($row = mysqli_fetch_array($run)){
												$gr_id=$row['id'];
												$gr_admin=$row['g_admin'];
												$gr_name=$row['g_name'];
												$gr_desc=$row['g_desc'];
												$date_cr=$row['date_created'];
												$gr_stat=$row['status'];
												
												$sqlgra = "SELECT * FROM members where id='$gr_admin'";
												$rungra = mysqli_query($con, $sqlgra);
												while($row = mysqli_fetch_array($rungra)){
													$mem_id=$row['id'];
													$f_name=$row['f_name'];
													$m_name=$row['m_name'];
													$l_name=$row['l_name'];
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
												}
												
												$sqlgrm = "select * from group_members where g_id='$gr_id'"; 
												$resgrm=mysqli_query($con,$sqlgrm);
												$countgrm = mysqli_num_rows($resgrm);
												
												if($gr_stat == 1){
													$stat = "<b style='color: green;'>ACTIVE</b> | <a href='groups.php?set=freeze&id=$gr_id'>FREEZE GROUP ACTIVITY</a>";
												}else{
													$stat = "<b style='color: darkred;'>FROZEN</b> | <a href='groups.php?set=open&id=$gr_id'>RE-ACTIVATE GROUP</a>";
												}
												
												$no++;
												
												echo "
													<tr>
														<td>$no</td>
														<td>$gr_name</td>
														<td>$gr_desc</td>
														<td>$date_cr</td>
														<td>".$f_name." ".$m_name.". ".$l_name." <hr style='margin: 3px;'> <a href='../members/profile/index.php?uid=$mem_id' target='new tab'>View ".$f_name."'s Profile</a></td>
														<td>$countgrm</td>
														<td><a href='../forum/group/index.php?gid=$gr_id' target='new tab'>View ".$gr_name."'s Page</a></td>
														<td>$stat</td>
														<td><a href='groups.php?del=$gr_id'>DELETE GROUP</a></td>
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
