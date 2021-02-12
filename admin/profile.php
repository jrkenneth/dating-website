<?php
	include("_inc/header.php");
	
	if(isset($_POST['uprofile'])){
		$uname = $_POST['uname'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		
			$qry = "update admins set uname='$uname', fname='$fname',lname='$lname' where id='$aid'";
			$run = mysqli_query($con, $qry);
								
			if($run){
				echo "<script>alert('Profile Updated Successfully!')</script>";
				echo "<script>window.location='profile.php';</script>";
			}
	}
	
	if(isset($_POST['cpassword'])){
		$cur = $_POST['crpw'];
		if($cur == $pword){
			$new = $_POST['npw'];
			$rnew = $_POST['rnpw'];
			
			if($new == $rnew){
				$qry = "update admins set password='$rnew' where id='$aid'";
				$run = mysqli_query($con, $qry);
									
				if($run){
					echo "<script>alert('Password Changed Successfully!')</script>";
					echo "<script>window.location='profile.php';</script>";
				}
			}else{
				echo "<script>alert('Error! Passwords do not match!')</script>";
			}
		}else{
			echo "<script>alert('Error! Incorrect password entered!')</script>";
		}
	}
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">MY PROFILE</h4>
                </div>

            </div>
                <div class="row">
				<div class="col-md-6">
                        <div class="panel panel-default col-md-12" style="padding: 0px;">
						<div class="panel-heading" style="font-weight: bold;">
                            Manage Details 
                        </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="panel-body">
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="uname" value="<?php echo $uname; ?>" class="form-control" placeholder="Subject" />
  </div>
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control" placeholder="Subject" />
  </div>
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control" placeholder="Subject" />
  </div>
  <button type="submit" class="btn btn-default" name="uprofile" style="float: right; background: #B22222; color: white; border-radius: 4px;">UPDATE PROFILE</button>
                            </div>
</form>
                            </div>
                    </div>
					
					
					
				<div class="col-md-6">
                        <div class="panel panel-default col-md-12" style="padding: 0px;">
						<div class="panel-heading" style="font-weight: bold;">
                            Change Password
                        </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="panel-body">
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">Current Password</label>
    <input type="text" name="crpw" class="form-control" placeholder="Enter Current Password..." />
  </div>
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">New Password</label>
    <input type="text" name="npw" class="form-control" placeholder="Enter New Password..." />
  </div>
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">Re-Type New Password</label>
    <input type="text" name="rnpw" class="form-control" placeholder="Re-type New Password..." />
  </div>
  <button type="submit" class="btn btn-default" name="cpassword" style="float: right; background: #B22222; color: white; border-radius: 4px;">CHANGE PASSWORD</button>
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
