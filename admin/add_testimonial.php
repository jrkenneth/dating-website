<?php
	include("_inc/header.php");
	
	
	
		
	if(isset($_GET['tid'])){
		$tesid = $_GET['tid'];
		
		$sql = "SELECT * FROM testimonials where id='$tesid'";
											$run = mysqli_query($con, $sql);
											while($row = mysqli_fetch_array($run)){
												$testi_id=$row['id'];
												$testi_name=$row['fullname'];
												$testi_jdesc=$row['job_desc'];
												$testi_comp=$row['company'];
												$testi=$row['testimony'];
											}
		$name="updTesti";
		$value="UPDATE";
	}else{
		$testi_id="";
												$testi_name="";
												$testi_jdesc="";
												$testi_comp="";
												$testi="";
		$name="addTesti";
		$value="ADD";
	}
	
	
	
	
	
	
	if(isset($_POST['addTesti'])){
			
			$tn = $_POST['name'];
			$jd = $_POST['desc'];
			$com = $_POST['comp'];
			$tes = $_POST['testi'];
			
				$qsql = "INSERT INTO testimonials(fullname, job_desc, company, testimony) VALUES ('$tn','$jd','$com','$tes')";
				$rqsql = mysqli_query($con, $qsql);
			
			if($rqsql){
				echo "<script>alert('Testimonial Added Succesfully!')</script>";
				echo "<script>location.href = 'add_testimonial.php';</script>";
			}else{
				echo "<script>alert('Error! Something went wrong!')</script>";
			}
				
				
			
			
		}elseif(isset($_POST['updTesti'])){
			
			$tn = $_POST['name'];
			$jd = $_POST['desc'];
			$com = $_POST['comp'];
			$tes = $_POST['testi'];
			
				$qsql = "update testimonials set fullname='$tn', job_desc='$jd', company='$com', testimony='$tes' where id='$testi_id'";
				$rqsql = mysqli_query($con, $qsql);
			
			if($rqsql){
				echo "<script>alert('Testimonial Updated Succesfully!')</script>";
				echo "<script>location.href = 'testimonials.php';</script>";
			}else{
				echo "<script>alert('Error! Something went wrong!')</script>";
			}
				
				
			
			
		}
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><?php echo $value; ?> TESTIMONIAL</h4>

                </div>

            </div>
                <div class="row">
				<div class="col-md-8">
                        <div class="panel panel-default col-md-12">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="panel-body">
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" name="name" value="<?php echo $testi_name; ?>" class="form-control" />
  </div>
  
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">Job Description</label>
    <input type="text" name="desc" value="<?php echo $testi_jdesc; ?>" class="form-control" />
  </div>
  
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">Company</label>
    <input type="text" name="comp" value="<?php echo $testi_comp; ?>" class="form-control" />
  </div>
  
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">Testimonial</label>
    <textarea name="testi" rows="5" class="form-control ckeditor"><?php echo $testi; ?></textarea>
  </div>
  <button type="submit" class="btn btn-default" name="<?php echo $name; ?>" style="float: right; background: #B22222; color: white; border-radius: 4px;"><?php echo $value; ?> TESTIMONIAL</button>
                            </div>
</form>
                            </div>
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
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</body>
</html>
