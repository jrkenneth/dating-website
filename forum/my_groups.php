<?php include('../_inc/header.php'); ?>


				<!-- BREADCRUMBS SECTION
				================================================ -->
				<section>
					<div id="breadcrumbs-wrapp">
						<div class="row">
							<div class="nine columns">
								<ul class="breadcrumbs hide-for-small"><li><a href="../index.php" title="Sweet Date" rel="home" class="trail-begin">Home</a>  </li><li><span>Group Forums</span></li></ul>							</div>

							
						</div><!--end row-->
					</div><!--end breadcrumbs-wrapp-->
				</section>
				<!--END BREADCRUMBS SECTION-->
				



<!-- MAIN SECTION
================================================ -->
<section>
    <div id="main">
        
			
			<div class="row">

								
				<!--begin content-->
								<div id="main-content" class="twelve columns ">
				

	<div class="row">
		<div class="twelve columns">
			<div class="article-content">
				
<div id="buddypress">

	<?php
		if(isset($_POST['addGroup'])){
					$gnname = $_POST['g_name'];
					$gddesc = $_POST['g_desc'];
					
					$dcr = date("Y-m-d");
					$djnd = date("Y-m-d h:i:s");
					
					$ifile1=$_FILES['g_icon']['name']; 
					$ifile_tmp1=$_FILES['g_icon']['tmp_name'];
					move_uploaded_file($ifile_tmp1,"photos/$ifile1");			
					
					$userFulln = $f_name." ".$m_name." ".$l_name;
					$userlink = "<a href='../../members/profile/index.php?uid=$mem_id'>$userFulln</a>";					
					$userrr = mysqli_real_escape_string($con, $userlink);
					
					$qry = "insert into groups (g_admin, g_name, g_desc, picture, date_created) values ('$mem_id', '$gnname', '$gddesc', '$ifile1', '$dcr')";
					$run = mysqli_query($con, $qry);	
					
					if($run){
						$cy = "select * from groups where g_admin='$mem_id' order by id desc limit 1";
						$run = $con->query($cy);
						while($row = $run->fetch_assoc())
						{
							$grpp_id= $row['id'];
						}		
						$qry2 = "insert into group_members (g_id, m_id, date_joined) values ('$grpp_id', '$mem_id', '$djnd')";
						$run2 = mysqli_query($con, $qry2);	
						
						$qrytl = "insert into group_timeline (group_id, activity) values ('$grpp_id', '$userrr created the group <b>$gnname</b>')";
						$runtl = mysqli_query($con, $qrytl);
						
									
						$grouplink = "<a href='../../forum/group/index.php?gid=$grpp_id'>$gnname</a>";			
						$ggrpp = mysqli_real_escape_string($con, $grouplink);
			
						$qryutl = "insert into user_timeline (user_id, activity) values ('$mem_id', '<b>$f_name</b> created the group <u>$ggrpp</u>')";
						$runutl = mysqli_query($con, $qryutl);	
					
						if($run2 && $runtl && $runutl){	
							echo "<script>alert('Group created successfully!')</script>";
							echo "<script>window.location='my_groups.php';</script>";
						}else{
							echo "<script>alert('Error! Something went wrong')</script>";
						}
					}
				}
		if(isset($_POST['updGroup'])){
					$editID = $_POST['editID'];
					$curN = $_POST['cur_name'];
					$curP = $_POST['cur_pic'];
					$curD = $_POST['cur_desc'];
			
					$gnname = $_POST['g_name'];
					if($gnname == $curN){						
					}else{
						$qry1 = "update groups set g_name='$gnname' where id='$editID'";
						$run1 = mysqli_query($con, $qry1);
						
						$qry1a = "insert into group_timeline (group_id, activity) values ('$editID', 'Group name has been changed from <i>$curN</i> to <i>$gnname</i>.')";
						$run1a = mysqli_query($con, $qry1a);
					}
					
					$gddesc = $_POST['g_desc'];
					if($gddesc == $curD){						
					}else{
						$qry2 = "update groups set g_desc='$gddesc' where id='$editID'";
						$run2 = mysqli_query($con, $qry2);
						
						$qry2a = "insert into group_timeline (group_id, activity) values ('$editID', 'Group description has been updated.')";
						$run2a = mysqli_query($con, $qry2a);
					}
					
					$ifile1=$_FILES['g_icon']['name']; 
					if($ifile1 == $curP){						
					}elseif($ifile1 == ""){						
					}else{						
						$dir = "photos";    
						$dirHandle = opendir($dir);    
						while ($file = readdir($dirHandle)) {    
							if($file==$ifile1) {
								unlink($dir."/".$file);//give correct path,
							}
						}    
						closedir($dirHandle);
						
						$ifile_tmp1=$_FILES['g_icon']['tmp_name'];
						move_uploaded_file($ifile_tmp1,"photos/$ifile1");
						
						$qry3 = "update groups set picture='$ifile1' where id='$editID'";
						$run3 = mysqli_query($con, $qry3);
						
						$qry3a = "insert into group_timeline (group_id, activity) values ('$editID', 'Group Icon has been updated.')";
						$run3a = mysqli_query($con, $qry3a);
					}
					
					
					echo "<script>alert('Group info updated successfully!')</script>";
					echo "<script>window.location='group/index.php?gid=".$editID."';</script>";
				}
				
		if(isset($_GET['update'])){
			$editGr = $_GET['gid'];
			
			$sqledit = "SELECT * FROM groups where id='$editGr'";
											$runedit = mysqli_query($con, $sqledit);
											while($row = mysqli_fetch_array($runedit)){
												$edit_id=$row['id'];
												$edit_name=$row['g_name'];
												$edit_desc=$row['g_desc'];
												$edit_pic=$row['picture'];
											}
			$FormTitle="Edit Group Info";
			$FormT="Update";
			$FormButton="updGroup";
		}else{
			$edit_name="";
												$edit_desc="";
												$edit_pic="";
												$FormTitle="Create New Group";
			$FormT="Create Group";
			$FormButton="addGroup";
		}
				
	?>
	
		
		
<div id="groups-dir-search" class="dir-search seven columns" style="padding-bottom: 15px;" >
	<h3 style="font-weight: bold;"><?php echo $FormTitle; ?></h3>
	<form action="" method="post" enctype="multipart/form-data" class="custom row collapse">
	
		<label class="twelve columns">
			<input type="text" name="g_name" value="<?php echo $edit_name; ?>" id="" placeholder="Group Name" required />
			<?php 
				if(isset($_GET['update'])){
			?>
				<input type="hidden" name="cur_name" value="<?php echo $edit_name; ?>" />
				<input type="hidden" name="editID" value="<?php echo $editGr; ?>" />
			<?php
				}
			?>
		</label>
		<label class="twelve columns" style="padding: 5px;">
			Group Icon: <input type="file" name="g_icon"/> <?php echo $edit_pic; ?>
			<?php 
				if(isset($_GET['update'])){
			?>
				<input type="hidden" name="cur_pic" value="<?php echo $edit_pic; ?>" />
			<?php
				}
			?>
		</label>
		<label class="twelve columns">
			<textarea name="g_desc" placeholder="Group Description" rows="5"><?php echo $edit_desc; ?></textarea>
			<?php 
				if(isset($_GET['update'])){
			?>
				<input type="hidden" name="cur_desc" value="<?php echo $edit_desc; ?>" />
			<?php
				}
			?>
		</label>
	
		<input class="button radius danger" type="submit" id="groups_search_submit"
		       name="<?php echo $FormButton; ?>" value="<?php echo $FormT; ?>" style="float: right;"/>

	</form>
	
</div><!-- #groups-dir-search -->

<hr/>

	<form action="#" method="post" id="groups-directory-form" class="dir-form">
		<div class="item-list-tabs" aria-label="Groups directory main navigation">
			<ul class="sub-nav">
				<li class="selected" id="groups-all"><a href="#">My Created Group(s) <span>
					<?php
									$sqlgrp = "select * from groups where g_admin='$mem_id'"; 
									$resgrp=mysqli_query($con,$sqlgrp);
									$countgrp = mysqli_num_rows($resgrp); 
									echo $countgrp;
								?>
				</span></a></li>
			</ul>
		</div><!-- .item-list-tabs -->
		<div id="groups-dir-list" class="groups dir-list">
			



	
	<div id="groups-list" class="item-list search-list" aria-live="assertive" aria-atomic="true" aria-relevant="all">

	
		<?php 
									
											$sql = "SELECT * FROM groups where g_admin='$mem_id'";
											$run = mysqli_query($con, $sql);
											while($row = mysqli_fetch_array($run)){
												$gr_id=$row['id'];
												$gr_admin=$row['g_admin'];
												$gr_name=$row['g_name'];
												$gr_desc=$row['g_desc'];
												$gr_pic=$row['picture'];
												$date_cr=$row['date_created'];
												$gr_stat=$row['status'];
												
												$sqlgrm = "select * from group_members where g_id='$gr_id'"; 
												$resgrm=mysqli_query($con,$sqlgrm);
												$countgrm = mysqli_num_rows($resgrm);
												
												echo "
													<div class='four columns odd public group-has-avatar'>
			<div class='search-item'>
									<div class='avatar'>
						<a href='group/index.php?gid=$gr_id'><img src='photos/$gr_pic' class=' group-4-avatar avatar-94 photo' style='width: 94px; height: 94px;' alt='Group logo of $gr_name' /></a>
					</div>
					
				<div class='search-meta'>
					<h5 class='author'><a href='group/index.php?gid=$gr_id'>$gr_name</a></h5>
					<p class='date'><span class='activity'>active since: ".date("jS M Y",strtotime("".$date_cr.""))."</span></p>
	
				</div>
				<div class='search-body'>
					<div class='item-desc'><p>$gr_desc</p>
</div>
	
						
				</div>
				<br>
				<div class='action'>
					
						
					<div class='meta'>
						
						$countgrm members	
					</div>
	
				</div>
				<br>
				<div class='clear'></div>
			</div>
		</div>
												";
											}
		?>
	

	
	</div>


		</div><!-- #groups-dir-list -->
	</form><!-- #groups-directory-form -->
	
</div><!-- #buddypress -->
			</div><!--end article-content-->
		</div><!--end twelve-->
	</div><!--end row-->
	<!-- End  Article -->
            </div><!--end content-->
  
                       
<!--END SIDEBAR SECTION-->
        </div><!--end row-->
    </div><!--end main-->
  
      
</section>
<!--END MAIN SECTION-->


<!-- TESTIMONIALS SECTION ================================================ -->
<section class="with-top-border">
  	<div class="row">
    	<div class="twelve columns">
        <div id="kleo_testimonials-2" class="widgets clearfix widget_kleo_testimonials">
		<ul class="testimonials-carousel">
			<?php 
											$sql = "SELECT * FROM testimonials where status='1'";
											$run = mysqli_query($con, $sql);
											$no = 0; 
											while($row = mysqli_fetch_array($run)){
												$testi_id=$row['id'];
												$testi_name=$row['fullname'];
												$jdesc=$row['job_desc'];
												$comp=$row['company'];
												$testi=$row['testimony'];
												$date_add=$row['date_added'];
												$w_stat=$row['status'];
											
												echo "
													<li >
														<div class='quote-content'>
															<i class='icon-quote-right iconq'></i>
															<p>$testi</p>
														</div>
														<div class='quote-author'>
															<strong>$testi_name</strong>
															<span class='author-description'> - $jdesc, $comp</span>
														</div>
													</li>
												";
											}									
			?>		
		</ul>

		</div>      </div>
    </div>
</section>
<!--END TESTIMONIALS SECTION-->


<?php include('../_inc/footer.php'); ?>