<?php include('../_inc/header.php'); ?>


				<!-- BREADCRUMBS SECTION
				================================================ -->
				<section>
					<div id="breadcrumbs-wrapp">
						<div class="row">
							<div class="nine columns">
								<ul class="breadcrumbs hide-for-small"><li><a href="../index.php" title="Sweet Date" rel="home" class="trail-begin">Home</a>  </li><li><span>Members</span></li></ul>							</div>

							
						</div><!--end row-->
					</div><!--end breadcrumbs-wrapp-->
				</section>
				<!--END BREADCRUMBS SECTION-->
				


<!-- BP Profile Search 5.1 members/bps-form-horizontal -->
<div id="search-bar"><div class="row">
	<?php
		if(isset($_GET['search'])){
			$s_gender = $_GET['gender'];
			$s_lfor = $_GET['l_for'];
			$s_agef = $_GET['age_from'];
			$s_ageto = $_GET['age_to'];
			$s_city = $_GET['city'];
		}else{
			$s_gender = "I am a";
			$s_lfor = "Looking For a";
			$s_agef = "Age From";
			$s_ageto = "Age To";
			$s_city = "";
		}
	?>

<form action='' method='get' class='custom dir-form twelve columns custom'>
<div class="row">

	<div class='two columns hz-select'><select class='expand' name='gender' id='field_3' required><option><?php echo $s_gender; ?></option>
<option  value='Man'>Man</option><option  value='Woman'>Woman</option></select></div>

<div class='two columns hz-select'><select class='expand' name='l_for' id='field_6' required><option><?php echo $s_lfor; ?></option>
<option  value='Woman'>Woman</option><option  value='Man'>Man</option></select></div>

<div class="two columns hz-agerange hz-from"><select name="age_from" class="expand customDropdown" required>

<option><?php echo $s_agef; ?></option>

<option value="18" >18</option><option value="19"  >19</option><option value="20"  >20</option><option value="21"  >21</option><option value="22"  >22</option><option value="23"  >23</option><option value="24"  >24</option><option value="25"  >25</option><option value="26"  >26</option><option value="27"  >27</option><option value="28"  >28</option><option value="29"  >29</option><option value="30"  >30</option><option value="31"  >31</option><option value="32"  >32</option><option value="33"  >33</option><option value="34"  >34</option><option value="35"  >35</option><option value="36"  >36</option><option value="37"  >37</option><option value="38"  >38</option><option value="39"  >39</option><option value="40"  >40</option><option value="41"  >41</option><option value="42"  >42</option><option value="43"  >43</option><option value="44"  >44</option><option value="45"  >45</option><option value="46"  >46</option><option value="47"  >47</option><option value="48"  >48</option><option value="49"  >49</option><option value="50"  >50</option><option value="51"  >51</option><option value="52"  >52</option><option value="53"  >53</option><option value="54"  >54</option><option value="55"  >55</option><option value="56"  >56</option><option value="57"  >57</option><option value="58"  >58</option><option value="59"  >59</option><option value="60"  >60</option><option value="61"  >61</option><option value="62"  >62</option><option value="63"  >63</option><option value="64"  >64</option><option value="65"  >65</option><option value="66"  >66</option><option value="67"  >67</option><option value="68"  >68</option><option value="69"  >69</option><option value="70"  >70</option><option value="71"  >71</option><option value="72"  >72</option><option value="73"  >73</option><option value="74"  >74</option><option value="75"  >75</option></select>
                </div>
				
				<div class="two columns hz-agerange hz-to">
                    <select name="age_to" class="expand customDropdown" required>
					<option ><?php echo $s_ageto; ?></option>
					
					<option value="18"  >18</option><option value="19"  >19</option><option value="20"  >20</option><option value="21"  >21</option><option value="22"  >22</option><option value="23"  >23</option><option value="24"  >24</option><option value="25"  >25</option><option value="26"  >26</option><option value="27"  >27</option><option value="28"  >28</option><option value="29"  >29</option><option value="30"  >30</option><option value="31"  >31</option><option value="32"  >32</option><option value="33"  >33</option><option value="34"  >34</option><option value="35"  >35</option><option value="36"  >36</option><option value="37"  >37</option><option value="38"  >38</option><option value="39"  >39</option><option value="40"  >40</option><option value="41"  >41</option><option value="42"  >42</option><option value="43"  >43</option><option value="44"  >44</option><option value="45"  >45</option><option value="46"  >46</option><option value="47"  >47</option><option value="48"  >48</option><option value="49"  >49</option><option value="50"  >50</option><option value="51"  >51</option><option value="52"  >52</option><option value="53"  >53</option><option value="54"  >54</option><option value="55"  >55</option><option value="56"  >56</option><option value="57"  >57</option><option value="58"  >58</option><option value="59"  >59</option><option value="60"  >60</option><option value="61"  >61</option><option value="62"  >62</option><option value="63"  >63</option><option value="64"  >64</option><option value="65"  >65</option><option value="66"  >66</option><option value="67"  >67</option><option value="68"  >68</option><option value="69"  >69</option><option value="70"  >70</option><option value="71"  >71</option><option value="72"  >72</option><option value="73"  >73</option><option value="74"  >74</option><option value="75" >75</option> </select>
                  </div>
				  
				  <div class='two columns hz-textbox'><input type='text' name='city' id='field_17_contains' value='<?php echo $s_city; ?>' placeholder='City' required></div>		
				  
			<div class="two columns hz-submit">
				<button type="submit" name='search' class="small button radius"><i class="icon-search"></i></button>
			</div>
	</div>
</form>
</div>
</div>

<!-- BP Profile Search end members/bps-form-horizontal -->


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
		<?php
			if(isset($_GET['search'])){
				$s_gender = $_GET['gender'];
				$s_lfor = $_GET['l_for'];
				$s_agef = $_GET['age_from'];
				$s_ageto = $_GET['age_to'];
				$s_city = $_GET['city'];
				
				$nowtoday = date('Y-m-d');
				$balanceAgefrom =  $nowtoday - $s_agef;
				$balanceAgeto = $nowtoday - $s_ageto;
				
				$d1=strtotime("January 1 ".$balanceAgefrom);
				$d2=strtotime("January 1 ".$balanceAgeto);
				$baf = date("Y-m-d", $d1);
				$bat = date("Y-m-d", $d2);
		?>
<div id="buddypress" class="text-center">

		<div class="item-list-tabs" aria-label="Members directory main navigation" role="navigation">
			<ul style="list-style: none;">
				<li class="selected" id="members-all"><a href="#">Search Results 
				<span>
					<?php
								$sql1 = "SELECT * FROM members where gender='$s_lfor' and looking_for='$s_gender' and city='$s_city'"; 
								$rs_result1 =  $con->query($sql1); //run the query
								$count1 = 0;
								while($row = $rs_result1->fetch_assoc()) { 
												$countbday=$row['b_day'];
												$counttoday = date('Y-m-d');
												$countage = $counttoday - $countbday;
												
												if($countage >= $s_agef && $countage <= $s_ageto){
													$count1++;
												}
								}
								echo $count1;
								
							?>
				</span></a></li>

			</ul>
		</div><!-- .item-list-tabs -->
		<div id="members-dir-list" class="members dir-list">
			

	
	<div id="members-list" class="item-list search-list" aria-live="assertive" aria-relevant="all">
	
		<?php 
					$num_rec_per_page=15;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$start_from = ($page-1) * $num_rec_per_page; 
					$sql = "SELECT * FROM members where gender='$s_lfor' and looking_for='$s_gender' and city='$s_city' order by 1 asc LIMIT $start_from, $num_rec_per_page"; 
					$rs_result =  $con->query($sql); //run the query
					while($row = $rs_result->fetch_assoc()) { 
										$mmem_id=$row['id'];
												$mf_name=$row['f_name'];
												$mm_name=$row['m_name'];
												$ml_name=$row['l_name'];
												$meml=$row['email'];
												$musn=$row['username'];
												$mpsw=$row['password'];
												$mdj=$row['date_joined'];
												$mgender=$row['gender'];
												$ml_for=$row['looking_for'];
												$mbday=$row['b_day'];
												$mm_stat=$row['m_status'];
												$mcity=$row['city'];
												$mcountry=$row['country'];
												$mnat=$row['nationality'];
												$mreligion=$row['religion'];
												$ml_seen=$row['last-seen'];
												$mpic=$row['picture'];
												$muser_stat=$row['status'];
												
												if(!isset($_SESSION['mem_id'])){
											$add_Fr = "<a href='profile/index.php?uid=$mmem_id' class='small button radius secondary'><i
                    class='icon-user'></i> View Profile</a>";
										}else{						
											if($mmem_id == $mem_id){
												$add_Fr = "<a href='http://localhost:140/dating/account/profile/index.php' class='small button radius danger'><i
                    class='icon-user'></i> My Profile</a>";
											}else{
												$sql2 = "select * from friends where m_id='$mem_id' and friend_id='$mmem_id'"; 
												$res2=mysqli_query($con,$sql2);
												$count2 = mysqli_num_rows($res2); 
												if($count2 == 1){
													$add_Fr = "<a href='index.php?remove=$mmem_id' class='small button radius' style='background: indianred;'> UNFRIEND</a>";
												}elseif($count2 < 1){												
													$add_Fr = "<a href='index.php?add_id=$mmem_id' class='small button radius primary'><i class='icon-plus'></i> Add Friend</a>";
												}
											}
										}
												
												$today = date('Y-m-d');
												$age = $today - $mbday;
												
									if($age >= $s_agef && $age <= $s_ageto){	
										echo "
													<div class='four columns'>
			<div class='search-item odd'>
				<div class='avatar'>
					<a href='profile/index.php?uid=$mmem_id'>
						<img src='photos/$mpic' class=' user-45442-avatar avatar-94 photo' style='width: 94px; height: 94px;' alt='Profile picture of $mf_name $mm_name $ml_name' />					</a>
					<!-- <span class='online'></span>	-->			</div>

				<h5 class='author'><a href='profile/index.php?uid=$mmem_id'>$mf_name $mm_name $ml_name</a></h5>

				<div class='search-meta'><p class='date'>$age / $mgender / $mm_stat / $mcity</p></div>
				<div class='search-body'>
					
									</div>
				<div class='bp-member-dir-buttons'>
					        
							$add_Fr
		
					<div class='action'></div>
				</div>
			</div>
		</div>
												";
									}
}


?>

	
	</div>

	
	
<?php



$get_items="SELECT * FROM members where b_day between '$bat' and '$baf' and gender='$s_lfor' and looking_for='$s_gender' and city='$s_city'";
$run_items=mysqli_query($con,$get_items);
$count_items=mysqli_num_rows($run_items);
$total_pages = ceil($count_items / $num_rec_per_page); 

echo "		
						<div id='pag-bottom' class='pagination'>	
		<div class='pagination-links' id='member-dir-pag-bottom'>
			<a href='index.php?page=1&gender=$s_gender&l_for=$s_lfor&age_from=$s_agef&age_to=$s_ageto&city=$s_city&search=true' aria-current='page' class='page-numbers'>1</a>
							"; // Goto 1st page  

for ($i=2; $i<=$total_pages; $i++) { 
            echo "
				<a class='page-numbers' href='index.php?page=".$i."&gender=$s_gender&l_for=$s_lfor&age_from=$s_agef&age_to=$s_ageto&city=$s_city&search=true'>".$i."</a>
							"; 
}; 
echo "
						<a class='next page-numbers' href='index.php?page=$total_pages&gender=$s_gender&l_for=$s_lfor&age_from=$s_agef&age_to=$s_ageto&city=$s_city&search=true'>&rarr;</a>

		</div>

	</div>
							  "; // Goto last page
?>


		</div><!-- #members-dir-list -->
</div><!-- #buddypress -->
<?php
			}elseif(isset($_GET['user'])){
				
				$user_id = $_GET['user'];
				
				$sqlfriends = "SELECT * FROM members where id='$user_id'";
											$runfriends = mysqli_query($con, $sqlfriends);
											while($row = mysqli_fetch_array($runfriends)){
												$usr_id=$row['id'];
												$user_fn=$row['f_name'];
												$user_mn=$row['m_name'];
												$user_ln=$row['l_name'];	
											}
				if(!isset($_SESSION['mem_id'])){
										$fuuullName = $user_fn." ".$user_mn." ".$user_ln."'s";
										}else{						
											if($user_id == $mem_id){
												$fuuullName = "My";
											}else{
												$fuuullName = $user_fn." ".$user_mn." ".$user_ln."'s";
											}
										}
		?>
<div id="buddypress" class="text-center">

		<div class="item-list-tabs" aria-label="Members directory main navigation" role="navigation">
			<ul style="list-style: none;">
				<li class="selected" id="members-all"><a href="#"><?php echo $fuuullName; ?> Friends List 
				<span>
					<?php
								$sqlfrlist = "select * from friends where m_id='$user_id'"; 
												$resfrlist=mysqli_query($con,$sqlfrlist);
												$countfrlist = mysqli_num_rows($resfrlist);
												echo $countfrlist;
							?>
				</span></a></li>

			</ul>
		</div><!-- .item-list-tabs -->
		<div id="members-dir-list" class="members dir-list">
			

	
	<div id="members-list" class="item-list search-list" aria-live="assertive" aria-relevant="all">
	
		<?php 
					$num_rec_per_page=15;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$start_from = ($page-1) * $num_rec_per_page; 
					$sql = "SELECT * FROM friends where m_id='$user_id' order by 1 asc LIMIT $start_from, $num_rec_per_page"; 
					$rs_result =  $con->query($sql); //run the query
					while($row = $rs_result->fetch_assoc()) { 
						$friend_id=$row['id'];
						$fruser_id=$row['m_id'];
						$fr_id=$row['friend_id'];
						$friend_dj=$row['date_added'];
					
					
					$sqlgra = "SELECT * FROM members where id='$fr_id'";
												$rungra = mysqli_query($con, $sqlgra);
												while($row = mysqli_fetch_array($rungra)){
										$mmem_id=$row['id'];
												$mf_name=$row['f_name'];
												$mm_name=$row['m_name'];
												$ml_name=$row['l_name'];
												$meml=$row['email'];
												$musn=$row['username'];
												$mpsw=$row['password'];
												$mdj=$row['date_joined'];
												$mgender=$row['gender'];
												$ml_for=$row['looking_for'];
												$mbday=$row['b_day'];
												$mm_stat=$row['m_status'];
												$mcity=$row['city'];
												$mcountry=$row['country'];
												$mnat=$row['nationality'];
												$mreligion=$row['religion'];
												$ml_seen=$row['last-seen'];
												$mpic=$row['picture'];
												$muser_stat=$row['status'];
												
												$today = date('Y-m-d');
												$age = $today - $mbday;
										}
										
										if(!isset($_SESSION['mem_id'])){
											$add_Fr = "<a href='profile/index.php?uid=$mmem_id' class='small button radius secondary'><i
                    class='icon-user'></i> View Profile</a>";
										}else{						
											if($mmem_id == $mem_id){
												$add_Fr = "<a href='http://localhost:140/dating/account/profile/index.php' class='small button radius danger'><i
                    class='icon-user'></i> My Profile</a>";
											}else{
												$sql2 = "select * from friends where m_id='$mem_id' and friend_id='$mmem_id'"; 
												$res2=mysqli_query($con,$sql2);
												$count2 = mysqli_num_rows($res2); 
												if($count2 == 1){
													$add_Fr = "<a href='index.php?remove=$mmem_id' class='small button radius' style='background: indianred;'> UNFRIEND</a>";
												}elseif($count2 < 1){												
													$add_Fr = "<a href='index.php?add_id=$mmem_id' class='small button radius primary'><i class='icon-plus'></i> Add Friend</a>";
												}
											}
										}
										
										echo "
													<div class='four columns'>
			<div class='search-item odd'>
				<div class='avatar'>
					<a href='profile/index.php?uid=$mmem_id'>
						<img src='photos/$mpic' class=' user-45442-avatar avatar-94 photo' style='width: 94px; height: 94px;' alt='Profile picture of $mf_name $mm_name $ml_name' />					</a>
					<!-- <span class='online'></span>	-->			</div>

				<h5 class='author'><a href='profile/index.php?uid=$mmem_id'>$mf_name $mm_name $ml_name</a></h5>

				<div class='search-meta'><p class='date'>$age / $mgender / $mm_stat / $mcity</p></div>
				<div class='search-body'>
					
									</div>
				<div class='bp-member-dir-buttons'>
					        $add_Fr
		
					<div class='action'></div>
				</div>
			</div>
		</div>
												";
}


?>

	
	</div>

	
	
	<?php



$get_items="SELECT * FROM friends where m_id='$user_id'";
$run_items=mysqli_query($con,$get_items);
$count_items=mysqli_num_rows($run_items);
$total_pages = ceil($count_items / $num_rec_per_page); 

echo "		
						<div id='pag-bottom' class='pagination'>	
		<div class='pagination-links' id='member-dir-pag-bottom'>
			<a href='index.php?page=1&user=$user_id' aria-current='page' class='page-numbers'>1</a>
							"; // Goto 1st page  

for ($i=2; $i<=$total_pages; $i++) { 
            echo "
				<a class='page-numbers' href='index.php?page=".$i."&user=$user_id'>".$i."</a>
							"; 
}; 
echo "
						<a class='next page-numbers' href='index.php?page=$total_pages&user=$user_id'>&rarr;</a>

		</div>

	</div>
							  "; // Goto last page
?>



		</div><!-- #members-dir-list -->
		
</div><!-- #buddypress -->
<?php
			}elseif(isset($_GET['group'])){
				$group_id = $_GET['group'];
				
				$sqlgrp = "SELECT * FROM groups where id='$group_id'";
											$rungrp = mysqli_query($con, $sqlgrp);
											while($row = mysqli_fetch_array($rungrp)){
												$gr_id=$row['id'];
												$gr_admin=$row['g_admin'];
												$gr_name=$row['g_name'];
												$gr_desc=$row['g_desc'];
												$date_cr=$row['date_created'];
												$gr_stat=$row['status'];
											}
								
		?>
<div id="buddypress" class="text-center">

		<div class="item-list-tabs" aria-label="Members directory main navigation" role="navigation">
			<ul style="list-style: none;">
				<li class="selected" id="members-all"><a href="#"><?php echo $gr_name; ?> Members 
				<span>
					<?php
								$sqlgrm = "select * from group_members where g_id='$group_id'"; 
												$resgrm=mysqli_query($con,$sqlgrm);
												$countgrm = mysqli_num_rows($resgrm);
												echo $countgrm;
							?>
				</span></a></li>

			</ul>
		</div><!-- .item-list-tabs -->
		<div id="members-dir-list" class="members dir-list">
			

	
	<div id="members-list" class="item-list search-list" aria-live="assertive" aria-relevant="all">
	
		<?php 
					$num_rec_per_page=15;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$start_from = ($page-1) * $num_rec_per_page; 
					$sql = "SELECT * FROM group_members where g_id='$group_id' and status='1' order by 1 asc LIMIT $start_from, $num_rec_per_page"; 
					$rs_result =  $con->query($sql); //run the query
					while($row = $rs_result->fetch_assoc()) { 
						$grm_id=$row['id'];
						$grrp_id=$row['g_id'];
						$grpmem_id=$row['m_id'];
						$grm_dj=$row['date_joined'];
					
					
					$sqlgra = "SELECT * FROM members where id='$grpmem_id'";
												$rungra = mysqli_query($con, $sqlgra);
												while($row = mysqli_fetch_array($rungra)){
										$mmem_id=$row['id'];
												$mf_name=$row['f_name'];
												$mm_name=$row['m_name'];
												$ml_name=$row['l_name'];
												$meml=$row['email'];
												$musn=$row['username'];
												$mpsw=$row['password'];
												$mdj=$row['date_joined'];
												$mgender=$row['gender'];
												$ml_for=$row['looking_for'];
												$mbday=$row['b_day'];
												$mm_stat=$row['m_status'];
												$mcity=$row['city'];
												$mcountry=$row['country'];
												$mnat=$row['nationality'];
												$mreligion=$row['religion'];
												$ml_seen=$row['last-seen'];
												$mpic=$row['picture'];
												$muser_stat=$row['status'];
												
												$today = date('Y-m-d');
												$age = $today - $mbday;
										}
										
										if(!isset($_SESSION['mem_id'])){
											$add_Fr = "<a href='profile/index.php?uid=$mmem_id' class='small button radius secondary'><i
                    class='icon-user'></i> View Profile</a>";
										}else{						
											if($mmem_id == $mem_id){
												$add_Fr = "<a href='http://localhost:140/dating/account/profile/index.php' class='small button radius danger'><i
                    class='icon-user'></i> My Profile</a>";
											}else{
												$sql2 = "select * from friends where m_id='$mem_id' and friend_id='$mmem_id'"; 
												$res2=mysqli_query($con,$sql2);
												$count2 = mysqli_num_rows($res2); 
												if($count2 == 1){
													$add_Fr = "<a href='index.php?remove=$mmem_id' class='small button radius' style='background: indianred;'> UNFRIEND</a>";
												}elseif($count2 < 1){												
													$add_Fr = "<a href='index.php?add_id=$mmem_id' class='small button radius primary'><i class='icon-plus'></i> Add Friend</a>";
												}
											}
										}
										
										
										echo "
													<div class='four columns'>
			<div class='search-item odd'>
				<div class='avatar'>
					<a href='profile/index.php?uid=$mmem_id'>
						<img src='photos/$mpic' class=' user-45442-avatar avatar-94 photo' style='width: 94px; height: 94px;' alt='Profile picture of $mf_name $mm_name $ml_name' />					</a>
					<!-- <span class='online'></span>	-->			</div>

				<h5 class='author'><a href='profile/index.php?uid=$mmem_id'>$mf_name $mm_name $ml_name</a></h5>

				<div class='search-meta'><p class='date'>$age / $mgender / $mm_stat / $mcity</p></div>
				<div class='search-body'>
					
									</div>
				<div class='bp-member-dir-buttons'>
					        $add_Fr
		
					<div class='action'></div>
				</div>
			</div>
		</div>
												";
}


?>
	
	</div>

	
	
	<?php



$get_items="SELECT * FROM group_members where g_id='$group_id' and status='1'";
$run_items=mysqli_query($con,$get_items);
$count_items=mysqli_num_rows($run_items);
$total_pages = ceil($count_items / $num_rec_per_page); 

echo "		
						<div id='pag-bottom' class='pagination'>	
		<div class='pagination-links' id='member-dir-pag-bottom'>
			<a href='index.php?page=1&group=$group_id' aria-current='page' class='page-numbers'>1</a>
							"; // Goto 1st page  

for ($i=2; $i<=$total_pages; $i++) { 
            echo "
				<a class='page-numbers' href='index.php?page=".$i."&group=$group_id'>".$i."</a>
							"; 
}; 
echo "
						<a class='next page-numbers' href='index.php?page=$total_pages&group=$group_id'>&rarr;</a>

		</div>

	</div>
							  "; // Goto last page
?>


		</div><!-- #members-dir-list -->
</div><!-- #buddypress -->
<?php
			}else{
		?>
<div id="buddypress" class="text-center">

		<div class="item-list-tabs" aria-label="Members directory main navigation" role="navigation">
			<ul style="list-style: none;">
				<li class="selected" id="members-all"><a href="#">ALL MEMBERS 
				<span>
					<?php
								$sql1 = "select * from members where status='1'"; 
								$res1=mysqli_query($con,$sql1);
								$count1 = mysqli_num_rows($res1); 
								echo $count1;
							?>
				</span></a></li>

			</ul>
		</div><!-- .item-list-tabs -->
		<div id="members-dir-list" class="members dir-list">
			

	
	<div id="members-list" class="item-list search-list" aria-live="assertive" aria-relevant="all">
	
		<?php 
					$num_rec_per_page=15;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$start_from = ($page-1) * $num_rec_per_page; 
					$sql = "SELECT * FROM members where status='1' order by 1 asc LIMIT $start_from, $num_rec_per_page"; 
					$rs_result =  $con->query($sql); //run the query
					while($row = $rs_result->fetch_assoc()) { 
										$mmem_id=$row['id'];
												$mf_name=$row['f_name'];
												$mm_name=$row['m_name'];
												$ml_name=$row['l_name'];
												$meml=$row['email'];
												$musn=$row['username'];
												$mpsw=$row['password'];
												$mdj=$row['date_joined'];
												$mgender=$row['gender'];
												$ml_for=$row['looking_for'];
												$mbday=$row['b_day'];
												$mm_stat=$row['m_status'];
												$mcity=$row['city'];
												$mcountry=$row['country'];
												$mnat=$row['nationality'];
												$mreligion=$row['religion'];
												$ml_seen=$row['last-seen'];
												$mpic=$row['picture'];
												$muser_stat=$row['status'];
												
												$today = date('Y-m-d');
												$age = $today - $mbday;
										
										if(!isset($_SESSION['mem_id'])){
											$add_Fr = "<a href='profile/index.php?uid=$mmem_id' class='small button radius secondary'><i
                    class='icon-user'></i> View Profile</a>";
										}else{						
											if($mmem_id == $mem_id){
												$add_Fr = "<a href='http://localhost:140/dating/account/profile/index.php' class='small button radius danger'><i
                    class='icon-user'></i> My Profile</a>";
											}else{
												$sql2 = "select * from friends where m_id='$mem_id' and friend_id='$mmem_id'"; 
												$res2=mysqli_query($con,$sql2);
												$count2 = mysqli_num_rows($res2); 
												if($count2 == 1){
													$add_Fr = "<a href='index.php?remove=$mmem_id' class='small button radius' style='background: indianred;'> UNFRIEND</a>";
												}elseif($count2 < 1){												
													$add_Fr = "<a href='index.php?add_id=$mmem_id' class='small button radius primary'><i class='icon-plus'></i> Add Friend</a>";
												}
											}
										}
										
										
										
										echo "
													<div class='three columns'>
			<div class='search-item odd'>
				<div class='avatar'>
					<a href='profile/index.php?uid=$mmem_id'>
						<img src='photos/$mpic' class=' user-45442-avatar avatar-94 photo' style='width: 94px; height: 94px;' alt='Profile picture of $mf_name $mm_name $ml_name' />					</a>
					<!-- <span class='online'></span>	-->			</div>

				<h5 class='author'><a href='profile/index.php?uid=$mmem_id'>$mf_name $mm_name $ml_name</a></h5>

				<div class='search-meta'><p class='date'>$age / $mgender / $mm_stat / $mcity</p></div>
				<div class='search-body'>
					
									</div>
				<div class='bp-member-dir-buttons'>
					        $add_Fr
		
					<div class='action'></div>
				</div>
			</div>
		</div>
												";
}


?>
				
	</div>

	
	
	
<?php



$get_items="SELECT * FROM members where status='1'";
$run_items=mysqli_query($con,$get_items);
$count_items=mysqli_num_rows($run_items);
$total_pages = ceil($count_items / $num_rec_per_page); 

echo "		
						<div id='pag-bottom' class='pagination'>	
		<div class='pagination-links' id='member-dir-pag-bottom'>
			<a href='index.php?page=1' aria-current='page' class='page-numbers'>1</a>
							"; // Goto 1st page  

for ($i=2; $i<=$total_pages; $i++) { 
            echo "
				<a class='page-numbers' href='index.php?page=".$i."'>".$i."</a>
							"; 
}; 
echo "
						<a class='next page-numbers' href='index.php?page=$total_pages'>&rarr;</a>

		</div>

	</div>
							  "; // Goto last page
?>
		
		</div><!-- #members-dir-list -->

</div><!-- #buddypress -->
<?php
			}
?>


			</div><!--end article-content-->
		</div><!--end twelve-->
	</div><!--end row-->
	<!-- End  Article -->


            </div><!--end content-->
  
                        
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