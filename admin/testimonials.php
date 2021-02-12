<?php
	include("_inc/header.php");
	
	
	if(isset($_GET['status'])){
		$setdata = $_GET['status'];
		$test_id = $_GET['id'];
		
		if($setdata == "show"){
			$qry = "update testimonials set status='1' where id='$test_id'";
			$run = mysqli_query($con, $qry);
								
			if($run){
				echo "<script>alert('Testimonial status updated!')</script>";
				echo "<script>window.location='testimonials.php';</script>";
			}
		}elseif($setdata == "hide"){
			$qry = "update testimonials set status='0' where id='$test_id'";
			$run = mysqli_query($con, $qry);
								
			if($run){
				echo "<script>alert('Testimonial status updated!')</script>";
				echo "<script>window.location='testimonials.php';</script>";
			}
		}
	}
	
	
	if(isset($_GET['t_id'])){
		$del_id = $_GET['t_id'];
			$sqldel1 = "DELETE FROM testimonials WHERE id = '$del_id'";
			$rundel1 = mysqli_query($con, $sqldel1);
			
			
			if($rundel1){
				echo "<script>alert('Testimonial Deleted Successfully!')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'testimonials.php',1000));</script>";
			}else{
				echo "<script>alert('Error Deleting Testimonial')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'testimonials.php',1000));</script>";
			}
		}
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Manage Testimonials</h4>

                </div>

            </div>
                <div class="row">

                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class=" panel-default">
                        <div class="panel-heading" style="font-weight: bold;">
                            ALL TESTIMONIALS 
							(
								<?php
									$sql5 = "select * from testimonials"; 
									$res5=mysqli_query($con,$sql5);
									$count5 = mysqli_num_rows($res5); 
									echo $count5;
								?>
							)
							<span style="float: right;"><a href="add_testimonial.php"><i class="fa fa-plus-circle"></i> Add New Testimonial</a></span>
                        </div>
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>User(s)</th>
                                            <th>Testimonial(s)</th>
                                            <th>Website Visibility</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
											$sql = "SELECT * FROM testimonials";
											$run = mysqli_query($con, $sql);
											$no = 0; 
											while($row = mysqli_fetch_array($run)){
												$testi_id=$row['id'];
												$f_name=$row['fullname'];
												$jdesc=$row['job_desc'];
												$comp=$row['company'];
												$testi=$row['testimony'];
												$date_add=$row['date_added'];
												$w_stat=$row['status'];
												
												if($w_stat == 0){
													$stat = "<b style='color: darkred;'>HIDDEN</b> | <a href='testimonials.php?status=show&id=$testi_id'>SHOW ON WEBSITE</a>";
												}else{
													$stat = "<b style='color: green;'>VISIBLE</b> | <a href='testimonials.php?status=hide&id=$testi_id'>HIDE TESTIMONIAL</a>";
												}
												
												$no++;
												
												echo "
													<tr>
														<td>$no</td>
														<td>$date_add</td>
														<td>$f_name - $jdesc, $comp</td>
														<td>$testi</td>
														<td>$stat</td>
														<td><a href='add_testimonial.php?tid=$testi_id'>EDIT</a></td>
														<td><a href='testimonials.php?t_id=$testi_id'>DELETE</a></td>
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
