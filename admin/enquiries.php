<?php
	include("_inc/header.php");
	
	if(isset($_GET['del'])){
		$del_id = $_GET['del'];
			$sqldel1 = "DELETE FROM contacts WHERE id = '$del_id'";
			$rundel1 = mysqli_query($con, $sqldel1);		
			
			if($rundel1){
				echo "<script>alert('Enquiry Deleted Successfully!')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'enquiries.php',1000));</script>";
			}else{
				echo "<script>alert('Error Deleting Group')</script>";
				echo "<script>document.ready(window.setTimeout(location.href = 'enquiries.php',1000));</script>";
			}
		}
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">View All Enquiries</h4>

                </div>

            </div>
                <div class="row">

                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class=" panel-default">
                        <div class="panel-heading" style="font-weight: bold;">
                            ALL ENQUIRIES (<?php
					$sql5 = "select * from contacts"; 
					$res5=mysqli_query($con,$sql5);
					$count5 = mysqli_num_rows($res5); 
					echo $count5;
				?>)
                        </div>
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message / Enquiry</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
											$sql = "SELECT * FROM contacts";
											$run = mysqli_query($con, $sql);
											$no = 0; 
											while($row = mysqli_fetch_array($run)){
												$enq_id=$row['id'];
												$enq_name=$row['name'];
												$enq_em=$row['email'];
												$enq_sub=$row['subject'];
												$enq_mes=$row['message'];
												
												$no++;
												
												echo "
													<tr>
														<td>$no</td>
														<td>$enq_name</td>
														<td>$enq_em</td>
														<td>$enq_sub</td>
														<td>$enq_mes</td>
														<td><a href='enquiries.php?del=$enq_id'>DELETE ENQUIRY</a></td>
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
