<?php
	// Start the session
	session_start();
	ob_start();

	if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
        header("Location: index.php");
    }
	// Include the header file at the beginning of the page
	// include_once '../includes/header.php';
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Initial Sample Information</title>
	  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i" rel="stylesheet">
      <link rel="stylesheet" href="css/main.css">
      <link rel="stylesheet" href="css/datepicker.css">
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#datepicker").datepicker({dateFormat : 'yy-mm-dd'});
        });
      </script>
  </head>

	<style type="text/css">
		ul, li {
			display: inline;
			cursor: pointer;
			position: relative;
			top: 8%;
		}
		div.common_header {
			margin-top: 10px;
			margin-bottom: 20px;
			position: relative;
			background-color: #660066;
			color: white;
			width: 69%;
			left: 16%;
			height: 30px;
			border-radius: 25px;
		}
		a:hover {
			color: #ffe6ff;
		}
	</style>

  <body>
	<div class="common_header">
		<ul>
			<li><a id="admin_panel">Admin Panel | </a></li>
			<li><a id="sample_info">Initial Sample Information | </a></li>
			<li><a id="dna_extr">DNA Extraction Details | </a></li>
			<li><a id="geno_qc">Genotyping QC Details | </a></li>
			<li><a id="client_record">Client Record Card | </a></li>
			<li><a id="gen_visualizations">Generate Visualizations | </a></li>
			<li><a id="retreive_barcodes">Retreive Barcodes | </a></li>
			<li><a id="search_parameters">Search | </a></li>
			<li><a id="logout">Sign Out</a></li>
		</ul>
	</div>
	<script type="text/javascript" src="javascript/header.js"></script>

    <form action="sample_entry.php" method="post">
      <h1>Sample Information Form</h1>
      <fieldset>
        <legend><span class="number">1</span>Your basic information</legend>
        <label for="name">Name:</label>
        <input type="text" id="name" name="user_name">

        <!-- <label id="for_mail">The email you entered has some problem.</label>  // was included for testing dynamic validation of email -->
        <label for="mail">Email:</label>
        <input type="email" id="mail" name="user_email">

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone">

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" />

        <label for="dor">Date of Receipt:</label>
        <input type="text" id="datepicker" name="date" />
      </fieldset>

      <fieldset>
        <legend><span class="number">2</span>Sample Details</legend>

      <label for="barcode">Barcode:</label>
      <input type="text" id="barcode" name="barcode" />

      <label for="job">Package name:</label>
      <br>
      <div class="big_div">
      <div class="class_one">
        <input type="checkbox" id="hundred" name="pkg_array[]" value="nutrition"><b>Nutrition</b><br>
        <input type="checkbox" id="health_gen" name="pkg_array[]" value="health"><b>Health Genomics</b><br>
        <input type="checkbox" id="fitness" name="pkg_array[]" value="fitness"><b>Fitness</b><br>
      </div>
      <div class="class_two">
        <input type="checkbox" id="acne" name="pkg_array[]" value="acne"><b>Acne</b><br>
        <input type="checkbox" id="pigmentation" name="pkg_array[]" value="pigmentation"><b>Pigmentation</b><br>
        <input type="checkbox" id="rad_skin" name="pkg_array[]" value="rad_skin"><b>Radiant Skin</b><br>
      </div>
      <div class="class_three">
        <input type="checkbox" id="cardio" name="pkg_array[]" value="cardio"><b>Cardio Panel</b><br>
        <input type="checkbox" id="comp" name="pkg_array[]" value="comp"><b>Comprehensive</b><br>
        <input type="checkbox" id="ind_drug" name="pkg_array[]" value="ind_drug"><b>Individual Drug</b><br>
        <input type="checkbox" id="clopi" name="pkg_array[]" value="clopi"><b>Clopi</b><br>
        <input type="checkbox" id="immuno" name="pkg_array[]" value="immuno"><b>Immunosuppresent</b><br>
      </div>
      <div class="class_four">
        <input type="checkbox" id="male_inf" name="pkg_array[]" value="male_inf"><b>Male Infertility</b><br>
        <input type="checkbox" id="ivf" name="pkg_array[]" value="ivf"><b>IVF</b><br>
      </div>
      </div>
      <br><br><br><br><br><br><br>;
      <div class="small_div">
      <div class="class_five">
        <!-- <input type="checkbox" id="others" onclick="dynInput(this);" /><b>Others</b><br>
        <p id="insertinputs"></p> -->
        <input type="checkbox" id="others" name="pkg_array[]" />
        <b>Others: </b>
        <p id="insertinputs" width="100%">
        <input type="text" name="others_package" style="width: 300px;"/>
		</p>
        <br>
      </div>
      </div>

      <!-- Use this code if the jQuery script below fails -->
      <!-- <script type="text/javascript">
        function dynInput(cbox) {
            if (cbox.checked) {
                var input = document.createElement("input");
                input.type = "text";
                input.name = "others_package";
                var div = document.createElement("div");
                div.id = "cbox.name";
                div.innerHTML = "Enter any other package of your choice:";
                div.appendChild(input);
                document.getElementById("insertinputs").appendChild(div);

            } else {
                document.getElementById(cbox.name).remove();
            }
        }
      </script> -->

      <script type="text/javascript">
      $(function () {
        $('#others').change(function () {
            $("p").toggle(this.checked);
        }).change();
      });
      </script>

      <br><br><br><br><br><br><br><br>

      <label for="source">Source name:</label>
      <select id="source" name="source">
        <option value="retail">Retail</option>
        <option value="channel_partner">Channel Partner</option>
        <option value="hospital">Hospital</option>
        <option value="xcode">XCode</option>
        <option value="corporate">Corporate</option>
      </select>

      <label for="ref">Reference:</label>
      <select id="ref" name="ref">
        <option style="color: #a1a1de;">Corporate----</option>
        <option value="hul">HUL</option>
        <option style="color: #a1a1de;">Hospital----</option>
        <option value="apollo_fert">Apollo Fertility</option>
        <option value="apollo_hosp">Apollo Hospital</option>
        <option value="Balaji_hosp">Balaji Hospital</option>
        <option value="be_well">Be Well</option>
        <option value="hira_hosp">Hiranandani Hospital</option>
        <option value="kav_hosp">Kauvery Hospital</option>
        <option value="mmm">MMM</option>
        <option value="pearl_sing">Pearl Singapore Fertility Clinic</option>
        <option value="shrushti">Shrushti Fertility</option>
        <option value="srmc">SRMC</option>
        <option value="venkateshwara">Venkateshwara Hospital</option>
        <option value="vhs">VHS</option>
        <option value="womens_center">Womens center</option>
        <option value="jan_fert">Jananam Fertility</option>
        <option style="color: #a1a1de;">Retail----</option>
        <option value="arjun">Arjun Ref</option>
        <option value="abdur">Abdur Ref</option>
        <option value="misbah">Misbah Ref</option>
        <option value="niyati">Niyati Ref</option>
        <option value="rafi">Rafi Ref</option>
        <option value="saleem">Saleem Ref</option>
        <option value="varsha">Varsha Ref</option>
        <option value="walk_in">Walk In</option>
        <option style="color: #a1a1de;">Channel Partners----</option>
        <option value="added_sport">Added Sport</option>
        <option value="asia_gen">Asia Genomics</option>
        <option value="bryce">Bryce</option>
        <option value="cods">CODS</option>
        <option value="dan">Dan</option>
        <option value="diasem">Diasem</option>
        <option value="ehf">EHF</option>
        <option value="gene_fit">Gene Fit</option>
        <option value="health_spring">HealthSpring</option>
        <option value="iayiam">I am Y I am</option>
        <option value="jan_ref">Janani Reference</option>
        <option value="kty">K T Yong</option>
        <option value="kamna">Kamna Ref</option>
        <option value="medall">Medall</option>
        <option value="miodrag">Miodrag</option>
        <option value="nmm">NM Medical</option>
        <option value="miodrag">Miodrag</option>
        <option value="right_living">Right Living</option>
        <option value="sufc">SUFC</option>
        <option value="super_fit">Super Fit</option>
        <option value="the_quad">The Quad</option>
        <option value="virtus">Virtus</option>
        <option value="ziyad">Ziyad</option>
      </select>

      </fieldset>
      <button type="submit" name="submit" id="submit">Submit</button>
    </form>

  </body>
</html>
