<?php
	$countries = array("AF" => "Afghanistan",
    "AX" => "Åland Islands",
    "AL" => "Albania",
    "DZ" => "Algeria",
    "AS" => "American Samoa",
    "AD" => "Andorra",
    "AO" => "Angola",
    "AI" => "Anguilla",
    "AQ" => "Antarctica",
    "AG" => "Antigua and Barbuda",
    "AR" => "Argentina",
    "AM" => "Armenia",
    "AW" => "Aruba",
    "AU" => "Australia",
    "AT" => "Austria",
    "AZ" => "Azerbaijan",
    "BS" => "Bahamas",
    "BH" => "Bahrain",
    "BD" => "Bangladesh",
    "BB" => "Barbados",
    "BY" => "Belarus",
    "BE" => "Belgium",
    "BZ" => "Belize",
    "BJ" => "Benin",
    "BM" => "Bermuda",
    "BT" => "Bhutan",
    "BO" => "Bolivia",
    "BA" => "Bosnia and Herzegovina",
    "BW" => "Botswana",
    "BV" => "Bouvet Island",
    "BR" => "Brazil",
    "IO" => "British Indian Ocean Territory",
    "BN" => "Brunei Darussalam",
    "BG" => "Bulgaria",
    "BF" => "Burkina Faso",
    "BI" => "Burundi",
    "KH" => "Cambodia",
    "CM" => "Cameroon",
    "CA" => "Canada",
    "CV" => "Cape Verde",
    "KY" => "Cayman Islands",
    "CF" => "Central African Republic",
    "TD" => "Chad",
    "CL" => "Chile",
    "CN" => "China",
    "CX" => "Christmas Island",
    "CC" => "Cocos (Keeling) Islands",
    "CO" => "Colombia",
    "KM" => "Comoros",
    "CG" => "Congo",
    "CD" => "Congo, The Democratic Republic of The",
    "CK" => "Cook Islands",
    "CR" => "Costa Rica",
    "CI" => "Cote D'ivoire",
    "HR" => "Croatia",
    "CU" => "Cuba",
    "CY" => "Cyprus",
    "CZ" => "Czech Republic",
    "DK" => "Denmark",
    "DJ" => "Djibouti",
    "DM" => "Dominica",
    "DO" => "Dominican Republic",
    "EC" => "Ecuador",
    "EG" => "Egypt",
    "SV" => "El Salvador",
    "GQ" => "Equatorial Guinea",
    "ER" => "Eritrea",
    "EE" => "Estonia",
    "ET" => "Ethiopia",
    "FK" => "Falkland Islands (Malvinas)",
    "FO" => "Faroe Islands",
    "FJ" => "Fiji",
    "FI" => "Finland",
    "FR" => "France",
    "GF" => "French Guiana",
    "PF" => "French Polynesia",
    "TF" => "French Southern Territories",
    "GA" => "Gabon",
    "GM" => "Gambia",
    "GE" => "Georgia",
    "DE" => "Germany",
    "GH" => "Ghana",
    "GI" => "Gibraltar",
    "GR" => "Greece",
    "GL" => "Greenland",
    "GD" => "Grenada",
    "GP" => "Guadeloupe",
    "GU" => "Guam",
    "GT" => "Guatemala",
    "GG" => "Guernsey",
    "GN" => "Guinea",
    "GW" => "Guinea-bissau",
    "GY" => "Guyana",
    "HT" => "Haiti",
    "HM" => "Heard Island and Mcdonald Islands",
    "VA" => "Holy See (Vatican City State)",
    "HN" => "Honduras",
    "HK" => "Hong Kong",
    "HU" => "Hungary",
    "IS" => "Iceland",
    "IN" => "India",
    "ID" => "Indonesia",
    "IR" => "Iran, Islamic Republic of",
    "IQ" => "Iraq",
    "IE" => "Ireland",
    "IM" => "Isle of Man",
    "IL" => "Israel",
    "IT" => "Italy",
    "JM" => "Jamaica",
    "JP" => "Japan",
    "JE" => "Jersey",
    "JO" => "Jordan",
    "KZ" => "Kazakhstan",
    "KE" => "Kenya",
    "KI" => "Kiribati",
    "KP" => "Korea, Democratic People's Republic of",
    "KR" => "Korea, Republic of",
    "KW" => "Kuwait",
    "KG" => "Kyrgyzstan",
    "LA" => "Lao People's Democratic Republic",
    "LV" => "Latvia",
    "LB" => "Lebanon",
    "LS" => "Lesotho",
    "LR" => "Liberia",
    "LY" => "Libyan Arab Jamahiriya",
    "LI" => "Liechtenstein",
    "LT" => "Lithuania",
    "LU" => "Luxembourg",
    "MO" => "Macao",
    "MK" => "Macedonia, The Former Yugoslav Republic of",
    "MG" => "Madagascar",
    "MW" => "Malawi",
    "MY" => "Malaysia",
    "MV" => "Maldives",
    "ML" => "Mali",
    "MT" => "Malta",
    "MH" => "Marshall Islands",
    "MQ" => "Martinique",
    "MR" => "Mauritania",
    "MU" => "Mauritius",
    "YT" => "Mayotte",
    "MX" => "Mexico",
    "FM" => "Micronesia, Federated States of",
    "MD" => "Moldova, Republic of",
    "MC" => "Monaco",
    "MN" => "Mongolia",
    "ME" => "Montenegro",
    "MS" => "Montserrat",
    "MA" => "Morocco",
    "MZ" => "Mozambique",
    "MM" => "Myanmar",
    "NA" => "Namibia",
    "NR" => "Nauru",
    "NP" => "Nepal",
    "NL" => "Netherlands",
    "AN" => "Netherlands Antilles",
    "NC" => "New Caledonia",
    "NZ" => "New Zealand",
    "NI" => "Nicaragua",
    "NE" => "Niger",
    "NG" => "Nigeria",
    "NU" => "Niue",
    "NF" => "Norfolk Island",
    "MP" => "Northern Mariana Islands",
    "NO" => "Norway",
    "OM" => "Oman",
    "PK" => "Pakistan",
    "PW" => "Palau",
    "PS" => "Palestinian Territory, Occupied",
    "PA" => "Panama",
    "PG" => "Papua New Guinea",
    "PY" => "Paraguay",
    "PE" => "Peru",
    "PH" => "Philippines",
    "PN" => "Pitcairn",
    "PL" => "Poland",
    "PT" => "Portugal",
    "PR" => "Puerto Rico",
    "QA" => "Qatar",
    "RE" => "Reunion",
    "RO" => "Romania",
    "RU" => "Russian Federation",
    "RW" => "Rwanda",
    "SH" => "Saint Helena",
    "KN" => "Saint Kitts and Nevis",
    "LC" => "Saint Lucia",
    "PM" => "Saint Pierre and Miquelon",
    "VC" => "Saint Vincent and The Grenadines",
    "WS" => "Samoa",
    "SM" => "San Marino",
    "ST" => "Sao Tome and Principe",
    "SA" => "Saudi Arabia",
    "SN" => "Senegal",
    "RS" => "Serbia",
    "SC" => "Seychelles",
    "SL" => "Sierra Leone",
    "SG" => "Singapore",
    "SK" => "Slovakia",
    "SI" => "Slovenia",
    "SB" => "Solomon Islands",
    "SO" => "Somalia",
    "ZA" => "South Africa",
    "GS" => "South Georgia and The South Sandwich Islands",
    "ES" => "Spain",
    "LK" => "Sri Lanka",
    "SD" => "Sudan",
    "SR" => "Suriname",
    "SJ" => "Svalbard and Jan Mayen",
    "SZ" => "Swaziland",
    "SE" => "Sweden",
    "CH" => "Switzerland",
    "SY" => "Syrian Arab Republic",
    "TW" => "Taiwan, Province of China",
    "TJ" => "Tajikistan",
    "TZ" => "Tanzania, United Republic of",
    "TH" => "Thailand",
    "TL" => "Timor-leste",
    "TG" => "Togo",
    "TK" => "Tokelau",
    "TO" => "Tonga",
    "TT" => "Trinidad and Tobago",
    "TN" => "Tunisia",
    "TR" => "Turkey",
    "TM" => "Turkmenistan",
    "TC" => "Turks and Caicos Islands",
    "TV" => "Tuvalu",
    "UG" => "Uganda",
    "UA" => "Ukraine",
    "AE" => "United Arab Emirates",
    "GB" => "United Kingdom",
    "US" => "United States",
    "UM" => "United States Minor Outlying Islands",
    "UY" => "Uruguay",
    "UZ" => "Uzbekistan",
    "VU" => "Vanuatu",
    "VE" => "Venezuela",
    "VN" => "Viet Nam",
    "VG" => "Virgin Islands, British",
    "VI" => "Virgin Islands, U.S.",
    "WF" => "Wallis and Futuna",
    "EH" => "Western Sahara",
    "YE" => "Yemen",
    "ZM" => "Zambia",
    "ZW" => "Zimbabwe");
?>
<!-- POP-UP MODAL FORMS
================================================ -->
<!--Login panel-->
<div id="login_panel" class="reveal-modal">
  <div class="row">
    <div class="twelve columns">
      <h5><i class="icon-user icon-large"></i> SIGN INTO YOUR ACCOUNT <span class="subheader right small-link"><a href="#" data-reveal-id="register_panel" class="radius secondary small button">CREATE NEW ACCOUNT</a></span></h5>
    </div>
      <form action="" method="post" class="clearfix">
      <div class="six columns">
        <input type="text" id="username" required name="user" class="inputbox" value="" placeholder="Username">
      </div>
      <div class="six columns">
        <input type="password" id="password" value="" required name="pwd" class="inputbox" placeholder="Password">
      </div>
      <p class="twelve columns">
        <small>
            <i class="icon-lock"></i>
            Your <a href="#" target="_blank">privacy</a> is important to us and we will never rent or sell your information.        </small>
          <div class="login-form-hook">
                      </div>
      </p>
      <div class="twelve columns">
        <button type="submit" name="log" class="radius secondary button"><i class="icon-unlock"></i> &nbsp;LOG IN</button>
	</div>
    </form>
    <div class="twelve columns"><hr>
      <ul class="inline-list">
        <li><small><a href="#" data-reveal-id="forgot_panel">FORGOT YOUR USERNAME OR PASSWORD?</a></small></li>
      </ul>
    </div>
  </div><!--end row-->
  <a href="#" class="close-reveal-modal">×</a>
</div>
<!--end login panel-->

<!-- Register panel -->
    <div id="register_panel" class="reveal-modal">
	<div class="row">
		<div class="twelve columns">
			<h5><i class="icon-magic icon-large"></i> CREATE ACCOUNT				<span class="subheader right small-link">
					<a href="#" data-reveal-id="login_panel" class="radius secondary small button">
						ALREADY HAVE AN ACCOUNT?					</a>
				</span>
			</h5>
		</div>
		<form id="register_form" action="http://localhost:140/dating/index.php" method="post" enctype="multipart/form-data" >
			
				<div class="six columns">
					<input type="text" id="" name="fname" class="inputbox" required
					       placeholder="First Name">
				</div>
				<div class="six columns">
					<input type="text" id="" name="mname" class="inputbox" required
					       placeholder="Middle Name">
				</div>
				<div class="six columns">
					<input type="text" id="" name="lname" class="inputbox" required
					       placeholder="Last Name">
				</div>
				<div class="six columns">
					<input type="email" id="" name="y_email" class="inputbox" required
					       placeholder="Your email">
				</div>
				<div class="twelve columns">
					<input type="text" id="" name="uname" class="inputbox" required
					       placeholder="Username">
				</div>
				<div class="six columns">
					<input type="password" id="" name="pword" class="inputbox" required
					       placeholder="Desired password">
				</div>
				<div class="six columns">
					<input type="password" id="" name="c_pword" class="inputbox"
					       required placeholder="Confirm password">
				</div>
				<div class="six columns">
					<select id="" name="gender" style="padding: 5px;" class="form-control" required>
						<option>Gender</option>
						<option value="Man">Male</option>
						<option value="Woman">Female</option>
					</select>
				</div>
				<div class="six columns">
					<select id="" name="l_for" style="padding: 5px;" class="form-control" required>
						<option>Looking For</option>
						<option value="Man">Man</option>
						<option value="Woman">Woman</option>
					</select>
				</div>
				<div class="twelve columns">
					<label style="margin-top: 15px;">Date of Birth</label>
					<input type="date" id="" name="dob" class="inputbox"
					       required>
				</div>
				<div class="twelve columns">
					<select id="" name="m_status" style="padding: 5px; margin-bottom: 15px;" class="form-control" required>
						<option>Marital Status</option>
						<option value="single">Single</option>
						<option value="married">Married</option>
					</select>
				</div>
				<div class="twelve columns">
					<input type="text" id="" name="city" class="inputbox"
					       required placeholder="City">
				</div>
				<div class="twelve columns">
					<select id="" name="country" style="padding: 5px; margin-bottom: 15px;" class="form-control" required>
						<option>Country</option>
						<?php
							foreach($countries as $key => $value) {
						?>
						<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="six columns">
					<input type="text" id="" name="nation" class="inputbox"
					       required placeholder="Nationality">
				</div>
				<div class="six columns">
					<input type="text" id="" name="religion" class="inputbox"
					       required placeholder="Religion">
				</div>
				<div class="twelve columns" style="margin-bottom: 15px;">
					<label style="margin-top: 10px;">Upload Profile Photo</label>
					<input type="file" id="" name="pro_pic" class="inputbox"
					       required>
				</div>
			
			<div class="twelve columns">
							<p>
								<label>
									<input type="checkbox" name="agree" id="" class="tos_register" required >
									<small>
										I agree with the <a href="#" target="_blank"><strong>terms and conditions</strong></a>.									</small>
								</label>
							</p>
						
				<button type="submit" id="signup" name="registration_submit" class="radius alert button"><i class="icon-heart"></i>
					&nbsp;CREATE MY ACCOUNT
				</button>
			</div>
		</form>
	</div><!--end row-->
	<a href="#" class="close-reveal-modal">×</a>
</div>
<!-- end register panel -->

<!-- Forgot panel -->
<div id="forgot_panel" class="reveal-modal">
	  <div class="row">
		<div class="twelve columns">
		  <h5><i class="icon-lightbulb icon-large"></i> FORGOT YOUR DETAILS?</h5>
		</div>
		<form id="forgot_form" name="forgot_form" method="post" class="clearfix">
		<div class="twelve columns">
		  <input type="email" id="forgot-email" name="email" class="inputbox" placeholder="Email Address">
		  <button type="submit" id="recover" name="submit" class="radius secondary button">SEND MY DETAILS! &nbsp;<i class="icon-envelope"></i></button>
		  <div id="lost_result"></div>
		</div>
		</form>
		<div class="twelve columns"><hr>
		  <small><a href="#" data-reveal-id="login_panel" class="radius secondary label">Return to Login</a></small>
		</div>
	  <div class="login-form-hook">
			</div>
	  </div><!--end row-->
	  <a href="#" class="close-reveal-modal">×</a>
</div><!-- end forgot panel -->

<!-- end login register stuff -->