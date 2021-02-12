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
								<div id="main-content" class="eight columns ">
				

	<div class="row">
		<div class="twelve columns">
			<div class="article-content">
				
<div id="buddypress">

	<?php
		if(isset($_GET['groups_search'])){
			$s_key = $_GET{'search_key'};
		}else{
			$s_key = "";
		}	
			
	?>
	
		
		
<div id="groups-dir-search" class="dir-search" role="search">
	
	<form action="" method="get" id="search-groups-form" class="custom row collapse">
	
		<label class="nine columns">
			<input type="text" name="search_key" value="<?php echo $s_key; ?>" id="groups_search" placeholder="Search Groups..."/>
		</label>
	
		<input class="button radius secondary postfix" type="submit" id="groups_search_submit"
		       name="groups_search" value="Search"/>

	</form>
	
</div><!-- #groups-dir-search -->

	<?php
		if(isset($_GET['groups_search'])){
			$s_key = $_GET{'search_key'};
			
			
	?>
	<form action="#" method="post" id="groups-directory-form" class="dir-form">
		<div class="item-list-tabs" aria-label="Groups directory main navigation">
			<ul class="sub-nav">
				<li class="selected" id="groups-all"><a href="#">Search Results <span>
					<?php
									$sqlgrp = "select * from groups where g_name like '%$s_key%' and status='1'"; 
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
											$sql = "SELECT * FROM groups where g_name like '%$s_key%' or g_desc like '%s_key%' and status='1'";
											$run = mysqli_query($con, $sql);
											$no = 0; 
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
					<div class='item-desc'><p>$gr_desc.</p>
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
	<?php
		}elseif(isset($_GET['g_mem'])){
			$g_member = $_GET{'g_mem'};
			
			$sql = "SELECT * FROM members where id='$g_member'"; 
					$rs_result =  $con->query($sql); //run the query
					while($row = $rs_result->fetch_assoc()) { 
										$mmem_id=$row['id'];
												$mf_name=$row['f_name'];
												$mm_name=$row['m_name'];
												$ml_name=$row['l_name'];
					}
					
					if(!isset($_SESSION['mem_id'])){
										$fuuullName = $mf_name." ".$mm_name." ".$ml_name."'s";
										}else{						
											if($g_member == $mem_id){
												$fuuullName = "My";
											}else{
												$fuuullName = $mf_name." ".$mm_name." ".$ml_name."'s";
											}
										}
					
	?>
	<form action="#" method="post" id="groups-directory-form" class="dir-form">
		<div class="item-list-tabs" aria-label="Groups directory main navigation">
			<ul class="sub-nav">
				<li class="selected" id="groups-all"><a href="#"><?php echo $fuuullName; ?> Group(s) <span>
					<?php
									$sqlgrp = "select * from group_members where m_id='$g_member' and status='1'"; 
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
							$sqlgm = "SELECT * FROM group_members where m_id='$g_member' and status='1'";
								$rungm = mysqli_query($con, $sqlgm);
								while($row = mysqli_fetch_array($rungm)){
									$grm_id=$row['id'];
									$grpp_id=$row['g_id'];
									$grmb_id=$row['m_id'];
									$grm_dj=$row['date_joined'];
									$grm_st=$row['status'];
		
											$sql = "SELECT * FROM groups where id='$grpp_id'";
											$run = mysqli_query($con, $sql);
											while($row = mysqli_fetch_array($run)){
												$gr_id=$row['id'];
												$gr_admin=$row['g_admin'];
												$gr_name=$row['g_name'];
												$gr_desc=$row['g_desc'];
												$gr_pic=$row['picture'];
												$date_cr=$row['date_created'];
												$gr_stat=$row['status'];
											}
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
					<div class='item-desc'><p>$gr_desc.</p>
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
	<?php
		}else{
	?>
	<form action="#" method="post" id="groups-directory-form" class="dir-form">
		<div class="item-list-tabs" aria-label="Groups directory main navigation">
			<ul class="sub-nav">
				<li class="selected" id="groups-all"><a href="#">All Groups <span>
					<?php
									$sqlgrp = "select * from groups where status='1'"; 
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
											$sql = "SELECT * FROM groups where status='1'";
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
					<div class='item-desc'><p>$gr_desc.</p>
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
	<?php
		}
	?>
</div><!-- #buddypress -->
			</div><!--end article-content-->
		</div><!--end twelve-->
	</div><!--end row-->
	<!-- End  Article -->
            </div><!--end content-->
  
                        <!-- SIDEBAR SECTION
================================================ -->
<aside class="four columns">

	<div class="widgets-container sidebar_location">
		
		
		<div id="simple_ads_manager_widget-3" class="widgets clearfix simple_ads_manager_widget"><h5>Advertise here (Banner rotate)</h5><div id='c9637_1_1' class='sam-container sam-place' data-sam='0'><a  href='' target='_blank'><img src='../wp-content/plugins/sam-images/sweetdate_wordpress_buddypress.png'  alt=''  /></a></div></div><div id="bp_core_recently_active_widget-3" class="widgets clearfix widget_bp_core_recently_active_widget buddypress widget"><h5>Latest Members</h5>
		
			<div class="avatar-block">
							
				<?php
					$sql_nm = "SELECT * FROM members where status='1' order by 1 desc limit 0,10";
					$run_nm = mysqli_query($con, $sql_nm);
					while($row = mysqli_fetch_array($run_nm)){
						$umem_id=$row['id'];
						$uf_name=$row['f_name'];
						$um_name=$row['m_name'];
						$ul_name=$row['l_name'];
						$ul_dj=$row['date_joined'];
						$upic=$row['picture'];
						
						echo "
							<div class='item-avatar'>
								<a href='../members/profile/index.php?uid=$umem_id' class='bp-tooltip' data-bp-tooltip='$uf_name $um_name $ul_name'><img src='../members/photos/$upic' class='avatar user-45443-avatar avatar-120 photo' style='width: 58px; height: 58px;' alt='Profile picture of $uf_name $um_name $ul_name' /></a>
							</div>
						";
						
					}
				?>
			</div>

		
		</div>
		
</div>

</aside> <!--end four columns-->
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