<?php
	include("_inc/header.php");
	
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
	
	if(isset($_POST['reg_member'])){
			
			$fn = $_POST['fname'];
			$mn = $_POST['mname'];
			$ln = $_POST['lname'];
			$eml = $_POST['email'];
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
			$gen = $_POST['gender'];
			$lf = $_POST['l_for'];
			$bd = $_POST['bdate'];
			$ms = $_POST['m_stat'];
			$ct = $_POST['city'];
			$cn = $_POST['country'];
			$nat = $_POST['nation'];
			$rel = $_POST['religion'];
			
			$regdate = date("Y-m-d h:i:s");
			
			$ifile=$_FILES['profile']['name']; 
			$ifile_tmp1=$_FILES['profile']['tmp_name'];
			move_uploaded_file($ifile_tmp1,"../members/photos/$ifile");
				
				$qsql = "INSERT INTO members(f_name, m_name, l_name, email, username, password, date_joined, gender, looking_for, b_day, m_status, city, country, nationality, religion, picture) VALUES ('$fn','$mn','$ln','$eml','$uname','$pass','$regdate','$gen','$lf','$bd','$ms','$ct','$cn','$nat','$rel','$ifile')";
				$rqsql = mysqli_query($con, $qsql);
				
				if($rqsql){
					echo "<script>alert('Member added Successfully!')</script>";
					echo "<script>location.href = 'add_member.php';</script>";
				}else{
					echo "<script>alert('Error! Something went wrong...')</script>";
					echo "<script>document.ready(window.setTimeout(location.href = 'add_member.php',1000));</script>";
				}
			
			
		}
?>
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">ADD NEW MEMBER</h4>

                </div>

            </div>
                <div class="row">
				<div class="col-md-12">
                        <div class="panel panel-default col-md-12">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="panel-body col-md-6">
  <div class="form-group">
    <label for="exampleInputfn">First Name</label>
    <input type="text" name="fname" required class="form-control" id="exampleInputfn" placeholder="First Name" />
  </div>
  <div class="form-group">
    <label for="exampleInputmn">Middle Name</label>
    <input type="text" name="mname" class="form-control" id="exampleInputmn" placeholder="Middle Name" />
  </div>
  <div class="form-group">
    <label for="exampleInputln">Last Name</label>
    <input type="text" name="lname" required class="form-control" id="exampleInputln" placeholder="Last Name" />
  </div>
  <div class="form-group">
    <label for="exampleInputeml">Email</label>
    <input type="email" name="email" required class="form-control" id="exampleInputeml" placeholder="Email" />
  </div>
  <div class="form-group">
    <label for="exampleInputusn">Username</label>
    <input type="text" name="uname" required class="form-control" id="exampleInputusn" placeholder="Username" />
  </div>
  <div class="form-group">
    <label for="exampleInputpsw">Password</label>
    <input type="password" name="pass" required class="form-control" id="exampleInputpsw" placeholder="Password" />
  </div>
  <div class="form-group">
    <label for="exampleInputgender">Gender</label>
    <select name="gender" required class="form-control" id="exampleInputgender">
		<option></option>
		<option value="Man">Male</option>
		<option value="Woman">Female</option>
	</select>
  </div>
  <div class="form-group">
    <label for="exampleInputl_for">Looking for:</label>
    <select name="l_for" required class="form-control" id="exampleInputl_for">
		<option></option>
		<option value="Man">Male</option>
		<option value="Woman">Female</option>
	</select>
  </div>
                            </div>
							
                        <div class="panel-body col-md-6">

  <div class="form-group">
    <label for="exampleInputbdate">Birth Date:</label>
    <input type="date" name="bdate" required class="form-control" id="exampleInputbdate"/>
  </div>
						
  <div class="form-group">
    <label for="exampleInputm_stat">Marital Status</label>
    <select name="m_stat" required class="form-control" id="exampleInputm_stat">
		<option></option>
		<option value="married">Married</option>
		<option value="single">Single</option>
	</select>
  </div>
  <div class="form-group">
    <label for="exampleInputcity">City</label>
    <input type="text" name="city" required class="form-control" id="exampleInputcity"/>
  </div>
  <div class="form-group">
    <label for="exampleInputcountry">Country</label>
    <select name="country" required class="form-control" id="exampleInputcountry">
		<option></option>
		<?php
			foreach($countries as $key => $value) {
		?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
		<?php
			}
		?>
	</select>
  </div>
  <div class="form-group">
    <label for="exampleInputnationality">Nationality</label>
    <input type="text" name="nation" required class="form-control" id="exampleInputnationality"/>
  </div>
  <div class="form-group">
    <label for="exampleInputreligion">Religion</label>
    <input type="text" name="religion" required class="form-control" id="exampleInputreligion"/>
  </div>
  <div class="form-group">
    <label for="exampleInputprofile">Upload Profile Picture</label>
    <input type="file" name="profile" class="form-control" id="exampleInputprofile" />
  </div>
  
  <div class="form-group">
    
	<button type="submit" class="btn btn-default" name="reg_member" style="float: right; background: #B22222; color: white; border-radius: 4px;">ADD NEW MEMBER</button>
  </div>
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
</body>
</html>
