<?php
	include("_inc/header.php");	
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>

                </div>

            </div>
            <div class="row">
                 <div class="col-md-3 col-sm-3 col-xs-6">
					<a href="members.php" style="text-decoration: none;">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="fa fa-user dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
  </div>
                           
</div>
                         <h5 style="font-weight: bold;"> ACTIVE MEMBERS 
						 (
							<?php
								$sql1 = "select * from members where status='1'"; 
								$res1=mysqli_query($con,$sql1);
								$count1 = mysqli_num_rows($res1); 
								echo $count1;
							?>
						 ) </h5>
                    </div>
					</a>
                </div>
				
                 <div class="col-md-3 col-sm-3 col-xs-6">
					<a href="groups.php" style="text-decoration: none;">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i  class="fa fa-group (alias) dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
  </div>
                           
</div>
                         <h5 style="font-weight: bold;">GROUPS 
						 (
							<?php
								$sql2 = "select * from groups"; 
								$res2=mysqli_query($con,$sql2);
								$count2 = mysqli_num_rows($res2); 
								echo $count2;
							?>
						 ) </h5>
                    </div>
					</a>
                </div>
				
                 <div class="col-md-3 col-sm-3 col-xs-6">
					<a href="enquiries.php" style="text-decoration: none;">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i  class="fa fa-inbox dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
  </div>
                           
</div>
                         <h5 style="font-weight: bold;">ENQUIRIES 
						 (
							<?php
								$sql3 = "select * from contacts"; 
								$res3=mysqli_query($con,$sql3);
								$count3 = mysqli_num_rows($res3); 
								echo $count3;
							?>
						 ) </h5>
                    </div>
					</a>
                </div>
				
                <div class="col-md-3 col-sm-3 col-xs-6">
					<a href="newsletter.php" style="text-decoration: none;">
                    <div class="dashboard-div-wrapper bk-clr-four">
                        <i  class="fa fa-envelope dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
  </div>
                           
</div>
                         <h5 style="font-weight: bold;">NEWSLETTER BROADCASTS 
						 (
							<?php
								$sql = "SELECT DISTINCT b_code FROM newsletter_broadcasts";
								$run = mysqli_query($con, $sql);
								$count4 = 0;
								while($row = mysqli_fetch_array($run)){
									$b_code=$row['b_code'];
									$count4++;
								}
								echo $count4;
							?>
						 ) </h5>
                    </div>
					</a>
                </div>
				
                 <div class="col-md-6 col-sm-6 col-xs-6">
					<a href="testimonials.php" style="text-decoration: none;">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i  class="fa fa-comments dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
  </div>
                           
</div>
                         <h5 style="font-weight: bold;">TESTIMONIALS 
						 (
							<?php
								$sql5 = "select * from testimonials"; 
								$res5=mysqli_query($con,$sql5);
								$count5 = mysqli_num_rows($res5); 
								echo $count5;
							?>
						 ) </h5>
                    </div>
					</a>
                </div>
				
                <div class="col-md-6 col-sm-6 col-xs-6">
					<a href="admins.php" style="text-decoration: none;">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="fa fa-gears (alias) dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
  </div>
                           
</div>
                         <h5 style="font-weight: bold;">ADMINS 
						 (
							<?php
								$sql6 = "select * from admins"; 
								$res6=mysqli_query($con,$sql6);
								$count6 = mysqli_num_rows($res6); 
								echo $count6;
							?>
						 ) </h5>
                    </div>
					</a>
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
