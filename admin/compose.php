<?php
	include("_inc/header.php");
	
	if(isset($_POST['send'])){
			
			$sub = $_POST['sub'];
			$mess = $_POST['mess'];
			$senddate = date("Y-m-d");
			$random_code = "".rand(0, 9).",".rand(0, 9).",".rand(0, 9).",".rand(0, 9).",".rand(0, 9)."";
			
			$ifile1=$_FILES['at1']['name']; 
			$ifile_tmp1=$_FILES['at1']['tmp_name'];
			move_uploaded_file($ifile_tmp1,"attachments/$ifile1");
			
			$ifile2=$_FILES['at2']['name']; 
			$ifile_tmp1=$_FILES['at2']['tmp_name'];
			move_uploaded_file($ifile_tmp1,"attachments/$ifile2");
			
			$ifile3=$_FILES['at3']['name']; 
			$ifile_tmp1=$_FILES['at3']['tmp_name'];
			move_uploaded_file($ifile_tmp1,"attachments/$ifile3");
			
			$sqlcl = "SELECT * FROM email_subs";
			$runcl = mysqli_query($con, $sqlcl);
			$sendCount = 0;
			while($row = mysqli_fetch_array($runcl)){
				$nl_id=$row['id'];
				$sus_em=$row['email'];
				
				$qsql = "INSERT INTO newsletter_broadcasts(subject, recipient, message, att1, att2, att3, date, b_code) VALUES ('$sub','$sus_em','$mess','$ifile1','$ifile2','$ifile3','$senddate','$random_code')";
				$rqsql = mysqli_query($con, $qsql);
				
				$sendCount++;
			}
			
			if($sendCount > 0){
				echo "<script>alert('Email(s) sent Successfully!')</script>";
				echo "<script>location.href = 'newsletter.php';</script>";
			}else{
				echo "<script>alert('Error! Email(s) not sent!')</script>";
			}
				
				
			
			
		}
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">COMPOSE NEWSLETTER</h4>

                </div>

            </div>
                <div class="row">
				<div class="col-md-8">
                        <div class="panel panel-default col-md-12">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="panel-body">
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">Subject</label>
    <input type="text" name="sub" class="form-control" placeholder="Subject" />
  </div>
  
  <div class="form-group col-md-12" style="padding: 0px;">
    <label for="exampleInputEmail1">Message</label>
    <textarea name="mess" rows="5" class="form-control ckeditor"></textarea>
  </div>
  <div class="form-group col-md-4" style="padding: 0px;">
    <label for="exampleInputEmail1">Add Attachment(s)</label>
    <input type="file" name="at1" class="form-control" />
  </div>
  <div class="form-group col-md-4">
    <label for="exampleInputEmail1" style="visibility: hidden;">**</label>
    <input type="file" name="at2" class="form-control" />
  </div>
  <div class="form-group col-md-4">
    <label for="exampleInputEmail1" style="visibility: hidden;">**</label>
    <input type="file" name="at3" class="form-control" />
  </div>
  <button type="submit" class="btn btn-default" name="send" style="float: right; background: #B22222; color: white; border-radius: 4px;">SEND BROADCAST</button>
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
