<?php include('../_inc/header.php'); ?>


				<!-- BREADCRUMBS SECTION
				================================================ -->
				<section>
					<div id="breadcrumbs-wrapp">
						<div class="row">
							<div class="nine columns">
								<ul class="breadcrumbs hide-for-small"><li><a href="../index.php" title="Sweet Date" rel="home" class="trail-begin">Home</a>  </li><li><span>Contact</span></li></ul>							</div>

							
						</div><!--end row-->
					</div><!--end breadcrumbs-wrapp-->
				</section>
				<!--END BREADCRUMBS SECTION-->
	
	<section>
		<!--	<div id="gmap" class="map"></div>	-->
	</section>



	<!-- MAIN SECTION
	================================================ -->
	<section>
		<div id="main">

			
			<div class="row">
				<div id="main-content" class="twelve columns">


		<?php
	if(isset($_POST['sendMess'])){
		$y_name = $_POST['name'];
		$y_email = $_POST['email'];
		$y_sub = $_POST['subject'];
		$y_mess = $_POST['message'];
		
		$qsql = "INSERT INTO contacts(name, email, subject, message) VALUES ('$y_name','$y_email','$y_sub','$y_mess')";
				$rqsql = mysqli_query($con, $qsql);
				
				if($rqsql){
					echo "<script>alert('Message sent Successfully!')</script>";
					echo "<script>location.href = 'index.php';</script>";
				}else{
					echo "<script>alert('An Error occurred! Try again later...')</script>";
					echo "<script>document.ready(window.setTimeout(location.href = 'index.php',1000));</script>";
				}
	}
?>								
						
<!-- Begin Article -->
<div class="row">

	
	
	<div class="twelve columns">
		<div class="article-content">
			<div class="row"> <div class="six columns">
<h4> Main Office </h4>
<p><strong>Address:</strong><br />
No. 41 Aderinto street, Ogba, Ikeja, Lagos, Nigeria.</p>
<p><strong>Email: </strong><br />
<a href="mailto:wecare@BEMYSPOUSE.com">wecare@BEMYSPOUSE.com</a></p>
<p><strong>Phone: </strong><br />
(+234) 08068747922 </p>
</div>
<div class="six columns">
<h4> Drop us a line </h4>
<div role="form" class="" id="">

<form action="" method="post" class="">
<p>Your Name (required)<br />
    <input type="text" name="name" value="" size="40" class="" required /> </p>
<p>Your Email (required)<br />
    <input type="email" name="email" value="" size="40" class="" required /> </p>
<p>Subject<br />
    <input type="text" name="subject" value="" size="40" class="" /> </p>
<p>Your Message<br />
    <textarea name="message" cols="40" rows="10" class="" required ></textarea> </p>
<p><button type="submit" name="sendMess" class="wpcf7-submit">Get In Touch</button></p>
</form></div> </div>

<?php
	if(isset($_SESSION['mem_id'])){
		
		if(isset($_POST['subTesti'])){
			
			$fffuln = $f_name." ".$m_name." ".$l_name;
			$jd = $_POST['jdesc'];
			$com = $_POST['cpany'];
			$tes = $_POST['testimonial'];
			
				$qsql = "INSERT INTO testimonials(fullname, job_desc, company, testimony) VALUES ('$fffuln','$jd','$com','$tes')";
				$rqsql = mysqli_query($con, $qsql);
			
			if($rqsql){
				echo "<script>alert('Testimonial submitted succesfully!')</script>";
				echo "<script>location.href = 'index.php#testimonial';</script>";
			}else{
				echo "<script>alert('Error! Something went wrong!')</script>";
			}
				
				
			
			
		}
		
?>
		<div class="twelve columns" id="testimonial" style="padding-top: 50px;">
			<h4> Write a review about us! &#128512; </h4>
			<div role="form" class="" id="">
				<form action="" method="post" class="">
					<p>Job description (Optional)<br />
						<input type="text" name="jdesc" value="" size="40" class="" /> </p>
					<p>Company (Optional)<br />
						<input type="text" name="cpany" value="" size="40" class="" /> </p>
					<p>Review<br />
						<textarea name="testimonial" cols="40" rows="10" class="" required ></textarea> </p>
					<p><button type="submit" name="subTesti" class="wpcf7-submit">Submit !</button></p>
				</form>
			</div> 

		</div>
<?php
	}
?>



</div>
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