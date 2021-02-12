
<!-- SUPPORT & NEWSLETTER SECTION ================================================ -->
<section>
  <div id="support">
    <div class="row">
      <div class="four columns">
        <div id="kleo_support_box-2" class="widgets clearfix widget_kleo_support_box"><div class="panel"><h5><i class="icon-question-sign"></i> Concerns or questions?</h5>
					<p>See our support area where you can view our contact details and can always reach out to us with your enquiries.</p>
					
		<!-- target="_blank" -->
					<a  class="small button radius secondary" href="http://localhost:140/dating/contact/index.php"><i
					class="icon-angle-right"></i> SEE SUPPORT AREA</a>
		</div></div>      </div>
      
      <div class="eight columns">
        <div id="kleo_mailchimp-2" class="widgets clearfix widget_kleo_mailchimp"><div class="panel"><h5><i class="icon-thumbs-up"></i> NEWSLETTER SIGNUP</h5><p>By subscribing to our mailing list you will always be updated with the latest news from us.</p>
		  <!--Newsletter form-->
		  
		  <?php
			if(isset($_POST['subNewsl'])){
							
							$nm = $_POST['yname'];
							$nl = $_POST['mc_email'];
							
							$scnl="SELECT * FROM email_subs WHERE email='$nl'";
							$resnl=mysqli_query($con,$scnl);
							$cuntnt = mysqli_num_rows($resnl); // if uname/pass correct it returns must be 1 row
									
							if($cuntnt < 1) 
							{
									$sqlnl="INSERT INTO email_subs(name, email)values('$nm','$nl')";
									$resultnl=mysqli_query($con,$sqlnl);
														
									if ($resultnl) {
																		
										//php mailer notification
										
										 echo "<script>alert('Thanks for Suscribing!')</script>";	
										 echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";		
										 
									} else {
										echo '<script>alert("Something went wrong, try again later")</script>';
										//$error = "<span style='color: darkred; font-weight: bold; font-size: 12px;'> - [Something went wrong, try again later]</span>";
									}
							}else {
										echo '<script>alert("Email address already suscribed!")</script>';
									}
					}
		?>
		  
		  <?php echo $newsletter_sec; ?>
		  
		  </div><!--end panel--></div>      </div>
    </div><!--end row-->
  </div><!--end support-->
</section>
<!--END SUPPORT & NEWSLETTER SECTION-->

<!-- FOOTER SECTION
================================================ -->
<footer>
  <div id="footer">
    <div class="row">
		<div class="twelve columns" style="text-align: center;">
			<p>Copyright &copy; <?php echo date("Y"); ?> BEMYSPOUSE. </p>      
		</div>
    </div>
  </div><!--end footer-->
</footer>
<!--END FOOTER SECTION-->


<?php include('log_reg_forget.php'); ?>

<p id="btnGoUp">Go up</p>

</div><!--end page-->  

<!--END POP-UP MODAL FORMS-->
  
		<!-- Memberships powered by Paid Memberships Pro v2.1.2.
 -->
			<script type="text/javascript">
	var ajaxurl = 'wp-admin/admin-ajax.html';
	jQuery('.facebook_connect').click(function(){
        var context = jQuery(this).closest("form");
        if (jQuery(".tos_register", context).length > 0)
        {
            if (! jQuery(".tos_register", context).is(":checked"))
            {
                alert('You must agree with the terms and conditions.');
                return false;
            }
        }

        // fix iOS Chrome
        if ( navigator.userAgent.match('CriOS') || navigator.userAgent.match(/Android/i) ) {
            window.open('https://www.facebook.com/dialog/oauth?client_id=132565730272019&redirect_uri=' + document.location.href + '&scope=email&response_type=token', '', null);
        } else {
            FB.login(function(FB_response){
                    if (FB_response.authResponse) {
                        fb_intialize(FB_response, '');
                    }
                },
                {
                    scope: 'email',
                    auth_type: 'rerequest',
                    return_scopes: true
                });
        }

	});

    if ( navigator.userAgent.match('CriOS') || navigator.userAgent.match(/Android/i) ) {
        jQuery("body").on("sq_fb.init", function () {
            var accToken = jQuery.getUrlVar('#access_token');
            if (accToken) {
                var fbArr = {scopes: "email"};
                fb_intialize(fbArr, accToken);
            }
        });
    }

    function fb_intialize(FB_response, token){
        FB.api( '/me', 'GET', {
                fields : 'id,email,name',
                access_token : token
            },
            function(FB_userdata){
                jQuery.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {"action": "fb_intialize", "FB_userdata": FB_userdata, "FB_response": FB_response},
                    success: function(user){
                        if( user.error ){
                            alert( user.error );
                        }
                        else if( user.loggedin ){
                            if( user.type === 'login' )
                            {
                                window.location.reload();
                            }
                            else if( user.type === 'register' )
                            {
                                window.location = user.url;
                            }
                        }
                    }
                });
            }
		);
	};
    jQuery.extend({
        getUrlVars: function(){
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        },
        getUrlVar: function(name){
            return jQuery.getUrlVars()[name];
        }
    });
	</script>
	<script type="text/javascript">
		jQuery(document).ready(function () {
			if (window.devicePixelRatio > 1) {
				var image = jQuery("#logo_img");
				imageName = '../sweetdatewp/wp-content/uploads/2013/06/logo_retina.png';
				//rename image
				image.attr('src', imageName);
			}
		});
	</script>
	    <script type="text/javascript">
        /* Buddpress Groups widget */
        jQuery(document).ready(function () {
            jQuery(".widgets div#groups-list-options a").on("click", function () {
                var a = this;
                jQuery(a).addClass("loading");
                jQuery(".widgets div#groups-list-options a").removeClass("selected");
                jQuery(this).addClass("selected");
                jQuery.post(
                    ajaxurl,
                    {
                        action: "widget_groups_list",
                        cookie: encodeURIComponent(document.cookie),
                        _wpnonce: jQuery("input#_wpnonce-groups").val(),
                        max_groups: jQuery("input#groups_widget_max").val(),
                        filter: jQuery(this).attr("id")
                    },
                    function (b) {
                        jQuery(a).removeClass("loading");
                        groups_wiget_response(b)
                    }
                );
                return false;
            })
        });

        function groups_wiget_response(a) {
            a = a.substr(0, a.length - 1);
            a = a.split("[[SPLIT]]");
            if (a[0] != "-1") {
                jQuery(".widgets ul#groups-list").fadeOut(200, function () {
                    jQuery(".widgets ul#groups-list").html(a[1]);
                    jQuery(".widgets ul#groups-list").fadeIn(200)
                })
            } else {
                jQuery(".widgets ul#groups-list").fadeOut(200, function () {
                    var b = "<p>" + a[1] + "</p>";
                    jQuery(".widgets ul#groups-list").html(b);
                    jQuery(".widgets ul#groups-list").fadeIn(200)
                })
            }
        }

        /* Buddpress Members widget */
        jQuery(document).ready(function () {
            jQuery(".widgets div#members-list-options a").on("click", function () {
                var a = this;
                jQuery(a).addClass("loading");
                jQuery(".widgets div#members-list-options a").removeClass("selected");
                jQuery(this).addClass("selected");
                jQuery.post(ajaxurl, {
                    action: "widget_members",
                    cookie: encodeURIComponent(document.cookie),
                    _wpnonce: jQuery("input#_wpnonce-members").val(),
                    "max-members": jQuery("input#members_widget_max").val(),
                    filter: jQuery(this).attr("id")
                }, function (b) {
                    jQuery(a).removeClass("loading");
                    member_wiget_response(b)
                });
                return false
            })
        });

        function member_wiget_response(a) {
            a = a.substr(0, a.length - 1);
            a = a.split("[[SPLIT]]");
            if (a[0] != "-1") {
                jQuery(".widgets ul#members-list").fadeOut(200, function () {
                    jQuery(".widgets ul#members-list").html(a[1]);
                    jQuery(".widgets ul#members-list").fadeIn(200)
                })
            } else {
                jQuery(".widgets ul#members-list").fadeOut(200, function () {
                    var b = "<p>" + a[1] + "</p>";
                    jQuery(".widgets ul#members-list").html(b);
                    jQuery(".widgets ul#members-list").fadeIn(200)
                })
            }
        }


    </script>
	    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.activity-content .activity-inner iframe').each(function () {
                if (!jQuery(this).parent().hasClass('flex-video')) {
                    jQuery(this).wrap('<div class="flex-video widescreen"></div>');
                }
            });
        });
    </script>

		<script type="text/javascript">
		var c = document.body.className;
		c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
		document.body.className = c;
	</script>
		
		<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/bbpress/templates/default/js/editor.js'></script>
<script type='text/javascript' src='http://localhost:140/dating/wp-includes/js/comment-reply.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"https:\/\/seventhqueen.com\/demo\/sweetdatewp-modern\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};
/* ]]> */
</script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/contact-form-7/includes/js/scripts.js'></script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/demo\/sweetdatewp-modern\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/demo\/sweetdatewp-modern\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"https:\/\/seventhqueen.com\/demo\/sweetdatewp-modern\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js'></script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/demo\/sweetdatewp-modern\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/demo\/sweetdatewp-modern\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/demo\/sweetdatewp-modern\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/demo\/sweetdatewp-modern\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_093a7654558e2d3cd22a857bb43d8668","fragment_name":"wc_fragments_093a7654558e2d3cd22a857bb43d8668","request_timeout":"5000"};
/* ]]> */
</script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var foundTranslated = {"back":"Back"};
/* ]]> */
</script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/themes/sweetdate/assets/scripts/foundation.min.js'></script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/themes/sweetdate/assets/scripts/scripts.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var kleoFramework = {"blank_img":"https:\/\/seventhqueen.com\/demo\/sweetdatewp-modern\/wp-content\/themes\/sweetdate\/assets\/images\/blank.png","ajaxurl":"https:\/\/seventhqueen.com\/demo\/sweetdatewp-modern\/wp-admin\/admin-ajax.php","mainColor":"#743349","bpMatchBg":"","bpMatchFg":"","tosAlert":"You must agree with the terms and conditions.","loadingmessage":"<i class=\"icon icon-refresh icon-spin\"><\/i> Sending info, please wait...","totalMembers":"2153"};
/* ]]> */
</script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/themes/sweetdate/assets/scripts/app.js'></script>
<script type='text/javascript' src='../../../platform.twitter.com/widgets.js'></script>
<script type='text/javascript' src='http://localhost:140/dating/wp-includes/js/wp-embed.min.js'></script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/elementor/assets/js/frontend-modules.min.js'></script>
<script type='text/javascript' src='http://localhost:140/dating/wp-includes/js/jquery/ui/position.min.js'></script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/elementor/assets/lib/dialog/dialog.min.js'></script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js'></script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/elementor/assets/lib/swiper/swiper.min.js'></script>
<script type='text/javascript'>
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"version":"2.7.4","urls":{"assets":"https:\/\/seventhqueen.com\/demo\/sweetdatewp-modern\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"general":{"elementor_global_image_lightbox":"yes","elementor_enable_lightbox_in_editor":"yes"}},"post":{"id":1788,"title":"Home Modern 3.0","excerpt":""}};
</script>
<script type='text/javascript' src='http://localhost:140/dating/wp-content/plugins/elementor/assets/js/frontend.min.js'></script>
</body>

<!-- Mirrored from seventhqueen.com/demo/sweetdatewp-modern/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 07:19:50 GMT -->
</html>
