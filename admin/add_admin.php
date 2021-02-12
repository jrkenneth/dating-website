<?php
	include("_inc/header.php");
	
	
	
		
	if(isset($_GET['edit'])){
		$adm_id = $_GET['edit'];
		
		$sql = "SELECT * FROM admins where id='$adm_id'";
											$run = mysqli_query($con, $sql);
											while($row = mysqli_fetch_array($run)){
												$adm_id=$row['id'];
												$f_name=$row['fname'];
												$l_name=$row['lname'];
												$desig=$row['desig'];
												$uname=$row['uname'];
												$pword=$row['password'];
											}
									$p_disp = "none";
		$name="updAdm";
		$value="UPDATE";
	}else{
		$adm_id="";
												$f_name="";
												$l_name="";
												$desig="";
												$uname="";
												$pword="";
									$p_disp = "block";		
		$name="addAdm";
		$value="ADD";
	}
	
	
	
	
	
	
	if(isset($_POST['addAdm'])){
			
			$fn = $_POST['fname'];
			$ln = $_POST['lname'];
			$dg = $_POST['desig'];
			$un = $_POST['uname'];
			$pw = $_POST['pw'];
			
				$qsql = "INSERT INTO admins(fname, lname, desig, uname, password) VALUES ('$fn','$ln','$dg','$un','$pw')";
				$rqsql = mysqli_query($con, $qsql);
			
			if($rqsql){
				echo "<script>alert('Admin Added Succesfully!')</script>";
				echo "<script>location.href = 'add_admin.php';</script>";
			}else{
				echo "<script>alert('Error! Something went wrong!')</script>";
			}
				
				
			
			
		}elseif(isset($_POST['updAdm'])){
			
			$fn = $_POST['fname'];
			$ln = $_POST['lname'];
			$dg = $_POST['desig'];
			$un = $_POST['uname'];
			$pw = $_POST['pw'];
			
				$qsql = "update admins set fname='$fn', lname='$ln', desig='$dg', uname='$un' where id='$adm_id'";
				$rqsql = mysqli_query($con, $qsql);
			
			if($rqsql){
				echo "<script>alert('Admin Updated Succesfully!')</script>";
				echo "<script>location.href = 'admins.php';</script>";
			}else{
				echo "<script>alert('Error! Something went wrong!')</script>";
			}
				
				
			
			
		}
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><?php echo $value; ?> ADMIN</h4>

                </div>

            </div>
                <div class="row">
				<div class="col-md-12">
                        <div class="panel panel-default col-md-12">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="panel-body col-md-6">
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="">First Name</label>
    <input type="text" name="fname" required value="<?php echo $f_name; ?>" class="form-control" />
  </div>
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="">Last Name</label>
    <input type="text" name="lname" required value="<?php echo $l_name; ?>" class="form-control" />
  </div>
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="">Designation</label>
    <select name="desig" required class="form-control">
		<option><?php echo $desig; ?></option>
		<option value="admin">ADMIN</option>
	</select>
  </div>
				</div>
<div class="panel-body col-md-6">
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="">Username</label>
    <input type="text" name="uname" required value="<?php echo $uname; ?>" class="form-control" />
  </div>
  <div class="form-group col-md-12" style="padding: 0px; display: <?php echo $p_disp; ?>;">
    <label for="">Password</label>
    <input type="password" name="pw" required value="<?php echo $pword; ?>" class="form-control" />
  </div>
  
  <button type="submit" class="btn btn-default" name="<?php echo $name; ?>" style="float: right; background: #B22222; color: white; border-radius: 4px;"><?php echo $value; ?> ADMIN</button>
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
