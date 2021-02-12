<?php include('../_inc/header.php'); ?>

				<!-- BREADCRUMBS SECTION
				================================================ -->
				<section>
					<div id="breadcrumbs-wrapp">
						<div class="row">
							<div class="nine columns">
								<ul class="breadcrumbs hide-for-small"><li><a href="../index.php" title="Sweet Date" rel="home" class="trail-begin">Home</a>  </li><li><span>About us</span></li></ul>							</div>

							
						</div><!--end row-->
					</div><!--end breadcrumbs-wrapp-->
				</section>
				<!--END BREADCRUMBS SECTION-->
				
<!-- MAIN SECTION
================================================ -->
<section>
    <div id="main">
        
                
        <div class="row">
            <div id="main-content" class="twelve columns">


                                
                        
<!-- Begin Article -->
<div class="row">

			<div class="twelve columns">
			<h2 class="article-title">About us</h2>
		</div><!--end twelve-->
	
	
	<div class="twelve columns">
		<div class="article-content">
			<div class="row"> <div class="four columns"> BEMYSPOUSE is a partnership service designed and dedicated to help Nigerian singles looking for long-term commitment. Our intelligent matchmaking delivers compatible partner suggestions in line with your personal search preferences. We verify all new profiles to ensure users have a smooth, safe, and enjoyable environment in which to meet other like-minded singles. We also allow you to browse through additional member profiles.</p>
<p>From verifying profiles to ensuring that your data is kept in the strictest of confidence, the team here at BEMYSPOUSE is dedicated to your satisfaction. And as always, our Customer Care team is available to answer any questions and assist you along your journey. </div> <div class="eight columns"><div class="article-media clearfix"><div class="blog-slider"> <div data-thumb="../wp-content/uploads/2013/06/blog_slider_00.jpg"><img src="../wp-content/uploads/2013/06/blog_slider_00.jpg" alt=""></div> <div data-thumb="../wp-content/uploads/2013/06/blog_slider_01.jpg"><img src="../wp-content/uploads/2013/06/blog_slider_01.jpg" alt=""></div> <div data-thumb="../wp-content/uploads/2013/06/blog_slider_02.jpg"><img src="../wp-content/uploads/2013/06/blog_slider_02.jpg" alt=""></div><div data-thumb="../wp-content/uploads/2013/06/blog_slider_03.jpg"><img src="../wp-content/uploads/2013/06/blog_slider_03.jpg" alt=""></div> </div></div></div> </div>
<hr />
<section  class="section "><div class="row"><div class="eight columns"><h3> Mission Statement </h3><p class="lead"> Our philosophy is to change the narratives and make the world a better place where  love rules. </p>Our single mission is to create a trusted platform where people can connect with soulmates that will love and cherish them forever without prejudice. We want to ensure a world where love is the language regardless of background, race or language.</div> <div class="four columns"><h3> Contact Us </h3>Would you like to contact a BEMYSPOUSE Customer Care representative? Or have questions regarding your account? Please, <a href="">click here</a>. </div></div></section>
		</div><!--end article-content-->
	</div><!--end twelve-->
</div><!--end row-->
<!-- End  Article -->






                
            </div><!--end twelve-->

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
		<div class="elementor-text-editor elementor-clearfix"><h2 style="text-align: center;">SUCCESS <span style="color: #f10049;">STORIES</span></h2></div>
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