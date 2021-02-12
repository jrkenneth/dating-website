<?php
	include("_inc/header.php");
	
	if(isset($_GET['e_id'])){
		$del_id = $_GET['e_id'];
			$sqldel1 = "DELETE FROM newsletter WHERE id = '$del_id'";
			$rundel1 = mysqli_query($con, $sqldel1);
			
			
			if($rundel1){
				echo "<script>alert('Newsletter Deleted Successfully!')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'newsletter.php',1000));</script>";
			}else{
				echo "<script>alert('Error Deleting Newsletter')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'newsletter.php',1000));</script>";
			}
		}
	
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">NEWSLETTERS</h4>

                </div>

            </div>
                <div class="row">

                <div class="col-md-4">
                  <!--   Kitchen Sink -->
                    <div class=" panel-default">
                        <div class="panel-heading" style="font-weight: bold;">
                            ALL SUSCRIBED EMAILS (<?php
					$sql4 = "select * from email_subs"; 
					$res4=mysqli_query($con,$sql4);
					$count4 = mysqli_num_rows($res4); 
					echo $count4;
				?>)
                        </div>
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
										
											$sqlcl = "SELECT * FROM email_subs";
											$runcl = mysqli_query($con, $sqlcl);
											$no = 0;
											while($row = mysqli_fetch_array($runcl)){
												$nl_id=$row['id'];
												$sus_name=$row['name'];
												$sus_em=$row['email'];
												
												$no++;
												
												echo "
													<tr>
														<td>$no</td>
														<td>$sus_name</td>
														<td>$sus_em</td>
														<td><a href='newsletter.php?e_id=$nl_id'>DELETE</a></td>
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
				
                <div class="col-md-8">
                  <!--   Kitchen Sink -->
                    <div class=" panel-default">
                        <div class="panel-heading" style="font-weight: bold;">
                            VIEW ALL NEWSLETTER BROADCASTS
							(
								<?php
									$sqlx = "SELECT DISTINCT b_code FROM newsletter_broadcasts";
									$runx = mysqli_query($con, $sqlx);
									$countx = 0;
									while($row = mysqli_fetch_array($runx)){
										$b_code=$row['b_code'];
										$countx++;
									}
									echo $countx;
								?>
							)
				 <span style="float: right;"><a href="compose.php"><i class="fa fa-plus-circle" ></i> Compose Newsletter Broadcast</a></span>
                        </div>
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Attachments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
										$sqly = "SELECT DISTINCT b_code FROM newsletter_broadcasts";
										$runy = mysqli_query($con, $sqly);
										$no = 0;
										while($row = mysqli_fetch_array($runy)){
											$b_code=$row['b_code'];
											
											$sqlcl = "SELECT * FROM newsletter_broadcasts where b_code='$b_code'";
											$runcl = mysqli_query($con, $sqlcl);
											while($row = mysqli_fetch_array($runcl)){
												$mid=$row['id'];
												$sub=$row['subject'];
												$mes=$row['message'];
												$att1=$row['att1'];
												$att2=$row['att2'];
												$att3=$row['att3'];
												$stat=$row['status'];
												$nl_date=$row['date'];
												$bcd=$row['b_code'];
												
												if($att1 == ""){
													$atta1 = "";
												}else{
													$atta1 = "<a href='attachments/$att1' download>$att1</a>";
												}
												if($att2 == ""){
													$atta2 = "";
												}else{
													$atta2 = "<br><a href='attachments/$att2' download>$att2</a>";
												}
												if($att3 == ""){
													$atta3 = "";
												}else{
													$atta3 = "<br><a href='attachments/$att3' download>$att3</a>";
												}
												
												if($stat == "0"){
													$st = "<b style='color: red;'>PENDING</b>";
												}else{
													$st = "<b style='color: limegreen;'>SUCCESS</b>";
												}
												
												if($nl_date == ""){
													$nd = "------";
												}else{
													$nd = $nl_date;
												}
											}
											
											$no++;
												
												echo "
													<tr>
														<td>$no</td>
														<td>$nd</td>
														<td>$sub</td>
														<td>$mes</td>
														<td>$atta1 | $atta2 | $atta3</td>
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
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })
	
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
