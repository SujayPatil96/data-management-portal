<?php
	// Start the session
	session_start();
	ob_start();

	if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Client Record Card</title>
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

    <form action="client_record_entry.php" method="post">
      <h1>Client Record Card</h1>
      <fieldset>
        <legend><span class="number">1</span>Your basic information</legend>
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="full_name">

        <label for="gender">Gender:</label>
        <select name="gender">
            <option value="m">Male</option>
            <option value="f">Female</option>
        </select>

        <label for="dob">Date of Birth:</label>
        <input type="text" id="dob" name="dob">

        <label for="height">Height (in cm):</label>
        <input type="text" id="height" name="height">

        <label for="weight">Weight (in kg):</label>
        <input type="text" id="weight" name="weight">

        <label for="mail">Email:</label>
        <input type="email" id="mail" name="user_email">

        <label for="mobile">Mobile Number:</label>
        <input type="text" id="mobile" name="mobile">

        <label for="edu">Highest Educational Qualification:</label>
        <input type="text" id="edu" name="edu">

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" />

        <label for="barcode">Barcode:</label>
        <input type="text" id="barcode" name="barcode" />
      </fieldset>

      <fieldset>
        <legend><span class="number">2</span>Questions</legend>
            <label for="q1">Which of the following best describes your food pattern?</label>
            <select name="q1">
                <option value="veg">Vegetarian</option>
                <option value="ova">Ova-vegetarian</option>
                <option value="weekends">Only during weekends</option>
                <option value="occasionally">Occasionally - free time</option>
                <option value="rare">Very rare</option>
            </select>
            <label for="q2">Define your eating habit:</label>
            <select name="q2">
                <option value="proper_meal">Follow proper meal timings and stick to healthy food</option>
                <option value="always_healthy">Eat healthy food and stick to proper meal timings</option>
                <option value="sometimes_healthy">Sometimes eat healthy food, but don't stick to regular meal timings</option>
                <option value="rarely_healthy">Rarely follow a healthy diet</option>
            </select>
            <label for="q3a">Do you skip any of your meals?</label>
            <select name="q3a">
                <option value="no">No</option>
                <option value="sometimes">Yes, sometimes</option>
                <option value="always">Yes, always</option>
            </select>
            <label for="q3b">If yes, specify which meals you generally skip:</label>
            <select name="q3b">
                <option value="none">None</option>
                <option value="breakfast">Breakfast</option>
                <option value="lunch">Lunch</option>
                <option value="dinner">Dinner</option>
            </select>
            <label for="q4">Are you allergic/intolerant to any one of the following?</label>
            <select name="q4">
				<input type="checkbox" name="allergy[]" value="milk_products">Milk and milk products<br>
                <input type="checkbox" name="allergy[]" value="eggs">Eggs<br>
                <input type="checkbox" name="allergy[]" value="nuts">Nuts<br>
                <input type="checkbox" name="allergy[]" value="sea_food">Sea food<br>
            	<input type="checkbox" value="other" id="others1" />If yes, kindly specify:
                <p id="insertinputs1" width="100%">
                <input type="text" name="allergy[]" style="width: 300px;"/>
                </p>
                <script type="text/javascript">
                $(function () {
                  $('#others1').change(function () {
                      $("p#insertinputs1").toggle(this.checked);
                  }).change();
                });
                </script>
                <br><br>
            <label for="q5">Do you have any food dislikes?</label>
            <select name="q5">
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select>
            <input type="checkbox" value="other" id="others4" />If yes, kindly specify:
            <p id="insertinputs4" width="100%">
            <input type="text" name="other2" style="width: 300px;"/>
            </p>
            <script type="text/javascript">
            $(function () {
              $('#others4').change(function () {
                  $("p#insertinputs4").toggle(this.checked);
              }).change();
            });
            </script>
            <br><br>
            <label for="q6">How frequently do you dine in a restaurant?</label>
            <select name="q6">
                <option value="everyday">Everyday</option>
                <option value="three_four">3 - 4 days in a week</option>
                <option value="once_twice">Once or twice a week</option>
                <option value="fortnight">Fortnightly</option>
                <option value="once_month">Once a month</option>
                <option value="never">Never</option>
            </select>
            <label for="q7">How regularly do you exercise?</label>
            <select name="q7">
                <option value="daily">Daily</option>
                <option value="three_five">3 - 5 days in a week</option>
                <option value="weekends">Only during weekends</option>
                <option value="occasionally">Occasionally - free time</option>
                <option value="very_rare">Very rare to never</option>
            </select>
            <label for="q8">Which type of physical activity do you prefer?</label>
            <select name="q8">
                <option value="walking">Walking</option>
                <option value="aerobic">Aerobic activities</option>
                <option value="yoga">Yoga</option>
                <option value="fortnight">Exercising in the gym</option>
                <option value="none">If none, provide preference</option>
            </select>
            <input type="checkbox" value="other" id="others5" />If you have any other preference, kindly specify:
            <p id="insertinputs5" width="100%">
            <input type="text" name="other3" style="width: 300px;"/>
            </p>
            <script type="text/javascript">
            $(function () {
              $('#others5').change(function () {
                  $("p#insertinputs5").toggle(this.checked);
              }).change();
            });
            </script>
            <br><br>
            <label for="q9">How many hours do you sleep at night?</label>
            <select name="q9">
                <option value="less_four">&lt; 4 hours</option>
                <option value="four_to_five">4 - 5 hours</option>
                <option value="six_eight">6 - 8 hours</option>
                <option value="mre_eight">&gt; 8 hours</option>
            </select>
            <label for="q10">How would you describe your sleep?</label>
            <select name="q10">
                <option value="disturbed_most">Disturbed, most days</option>
                <option value="disturbed_stressed">Disturbed, when stressed</option>
                <option value="sound">Sound and refreshing</option>
                <option value="b_and_c">Both b and c</option>
            </select>
            <label for="q11">Which of the following will you assign yourself to?</label>
            <select name="q11">
                <option value="group_a">Group A - high strung</option>
                <option value="group_b">group B - easy going</option>
            </select>
            <label for="q12">How many cups of coffee or tea do you consume in a day?</label>
            <select name="q12">
                <option value="less_two">&lt; 2 cups</option>
                <option value="two_four">2 - 4 cups</option>
                <option value="more_four">&gt; 4 cups</option>
                <option value="dont_drink">I don't drink tea/coffee</option>
            </select>
            <label for="q13a">Which describes your smoking habit?</label>
            <select name="q13a">
                <option value="everyday">Smoke everyday</option>
                <option value="often">Smoke often</option>
                <option value="less_frequently">Smoke less frequently</option>
                <option value="occasionally">Some occasionally</option>
                <option value="prev_recent">Used to smoke previously, stopped recently</option>
                <option value="prev_years">Used to smoke previously, stopped years ago</option>
                <option value="dont_smoke">Don't smoke</option>
            </select>
            <label for="q13b">If yes, specify the number of packets:</label>
            <select name="q13b">
                <option value="none">None</option>
                <option value="more_thirty_one">&gt; 31</option>
                <option value="more_thirty_one">&gt; 31</option>
                <option value="twenty_one_thirty">21 - 30</option>
                <option value="eleven_twenty">11 - 20</option>
                <option value="three_ten">3 - 10</option>
                <option value="less_two">&lt; 2</option>
            </select>
            <label for="q14">Are you in the habit of chewing tobacco/pan?</label>
            <select name="q14">
                <option value="regularly">Yes, regularly</option>
                <option value="occasionally">Yes, occasionally</option>
                <option value="no">No</option>
            </select>
            <label for="q15">Family history of one or more diseases?</label>
                <input type="checkbox" name="diseases[]" value="diabetes">Diabetes</input type="checkbox"><br>
                <input type="checkbox" name="diseases[]" value="heart">Heart Disease</input type="checkbox"><br>
                <input type="checkbox" name="diseases[]" value="hypertension">Hypertension</input type="checkbox"><br>
                <input type="checkbox" name="diseases[]" value="none">None of the above</input type="checkbox"><br>
                <input type="checkbox" name="diseases[]" value="" id="others1">Any other, please specify
                <p id="insertinputs1" width="100%">
                <input type="text" name="diseases[]" style="width: 300px;"/>
                </p>
                <script type="text/javascript">
                $(function () {
                  $('#others1').change(function () {
                      $("p#insertinputs1").toggle(this.checked);
                  }).change();
                });
                </script>
            <br><br>
            <label for="q16">Are you suffering from one or more of the following diseases?</label>
                <input type="checkbox" name="ind_diseases[]" value="obesity">Obesity</input type="checkbox"><br>
                <input type="checkbox" name="ind_diseases[]" value="diabetes">Diabetes</input type="checkbox"><br>
                <input type="checkbox" name="ind_diseases[]" value="cholesterol">High blood cholesterol levels</input type="checkbox"><br>
                <input type="checkbox" name="ind_diseases[]" value="bp">High blood pressure</input type="checkbox"><br>
                <input type="checkbox" name="ind_diseases[]" value="heart">Heart Disease</input type="checkbox"><br>
                <input type="checkbox" name="ind_diseases[]" value="arthritis">Arthritis</input type="checkbox"><br>
                <input type="checkbox" name="ind_diseases[]" value="bone">Bone Disorders</input type="checkbox"><br>
                <input type="checkbox" name="ind_diseases[]" value="hormone">Hormonal Disorders</input type="checkbox"><br>
                <input type="checkbox" name="ind_diseases[]" value="respiratory">Respiratory Disorders</input type="checkbox"><br>
                <input type="checkbox" name="ind_diseases[]" value="none">None of the above</input type="checkbox"><br>
                <input type="checkbox" name="ind_diseases[]" value="other" id="others2">Any other, please specify<br>
                <p id="insertinputs2" width="100%">
                <input type="text" name="ind_diseases[]" style="width: 300px;"/>
                </p>
                <script type="text/javascript">
                $(function () {
                  $('#others2').change(function () {
                      $("p#insertinputs2").toggle(this.checked);
                  }).change();
                });
                </script>
                <br>
            <label for="q17a">Are you under any prescribed medication?</label>
            <select name="q17a">
                <option value="no">No</option>
                <option value="yes">Yes, please specify</option>
            </select>
            <input type="checkbox" value="other" id="others6">If yes, then please specify the medication:
            <p id="insertinputs6" width="100%">
            <input type="text" name="other4" style="width: 300px;"/>
            </p>
            <script type="text/javascript">
            $(function () {
              $('#others6').change(function () {
                  $("p#insertinputs6").toggle(this.checked);
              }).change();
            });
            </script>
            <br><br>
            <label for="q18">Do you go for periodic health checkups?</label>
            <select name="q18">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            <label for="q19a">How often do you consume these foods?</label>
            <label for="q19a">Fruits and vegetables:</label>
            <select name="q19a">
                <option value="everyday">Everyday</option>
                <option value="one_two">1 - 2 days/week</option>
                <option value="fifteen">Once in 15 days</option>
                <option value="montly">Monthy once</option>
                <option value="occasionally">Occassionally/never</option>
            </select>
            <label for="q19b">Milk and milk products/green tea:</label>
            <select name="q19b">
                <option value="everyday">Everyday</option>
                <option value="one_two">1 - 2 days/week</option>
                <option value="fifteen">Once in 15 days</option>
                <option value="montly">Monthy once</option>
                <option value="occasionally">Occassionally/never</option>
            </select>
            <label for="q19c">Processed/ready-to-eat foods:</label>
            <select name="q19c">
                <option value="everyday">Everyday</option>
                <option value="one_two">1 - 2 days/week</option>
                <option value="fifteen">Once in 15 days</option>
                <option value="montly">Monthy once</option>
                <option value="occasionally">Occassionally/never</option>
            </select>
            <label for="q19d">Fried snacks:</label>
            <select name="q19d">
                <option value="everyday">Everyday</option>
                <option value="one_two">1 - 2 days/week</option>
                <option value="fifteen">Once in 15 days</option>
                <option value="montly">Monthy once</option>
                <option value="occasionally">Occassionally/never</option>
            </select>
            <label for="q19e">Fast foods:</label>
            <select name="q19e">
                <option value="everyday">Everyday</option>
                <option value="one_two">1 - 2 days/week</option>
                <option value="fifteen">Once in 15 days</option>
                <option value="montly">Monthy once</option>
                <option value="occasionally">Occassionally/never</option>
            </select>
            <label for="q19f">Salt preserved foods:</label>
            <select name="q19f">
                <option value="everyday">Everyday</option>
                <option value="one_two">1 - 2 days/week</option>
                <option value="fifteen">Once in 15 days</option>
                <option value="montly">Monthy once</option>
                <option value="occasionally">Occassionally/never</option>
            </select>
            <label for="q19g">Soft drinks:</label>
            <select name="q19g">
                <option value="everyday">Everyday</option>
                <option value="one_two">1 - 2 days/week</option>
                <option value="fifteen">Once in 15 days</option>
                <option value="montly">Monthy once</option>
                <option value="occasionally">Occassionally/never</option>
            </select>
            <label for="q20">How frequently do you get stressed out?</label>
            <label for="q20a">Stress:</label>
            <select name="q20a">
                <option value="most">Most of the days</option>
                <option value="sometimes_workload">Sometimes - workload</option>
                <option value="sometimes_physical">Sometimes - mentionable physical strain</option>
                <option value="rare">Rare</option>
            </select>
            <label for="q20b">Tiredness:</label>
            <select name="q20b">
                <option value="most">Most of the days</option>
                <option value="sometimes_workload">Sometimes - workload</option>
                <option value="sometimes_physical">Sometimes - mentionable physical strain</option>
                <option value="rare">Rare</option>
            </select>
            <label for="q21">Alcohol consumption pattern:</label>
            <select name="q21">
                <option value="everyday">Drink everyday</option>
                <option value="weekends">Drink during weekends</option>
                <option value="occasionally">Drink occasionally</option>
                <option value="teetotaler">Teetotaler</option>
            </select>
            <label for="q21a">If yes, specify the quantity:</label>
            <label for="q21a">One:</label>
            <select name="q21a">
                <option value="champagne">Champagne</option>
                <option value="wine">Wine</option>
                <option value="beer">Beer</option>
                <option value="spirits">Spirits</option>
            </select>
            <label for="q21b">Two:</label>
            <select name="q21b">
                <option value="champagne">Champagne</option>
                <option value="wine">Wine</option>
                <option value="beer">Beer</option>
                <option value="spirits">Spirits</option>
            </select>
            <label for="q21c">Three:</label>
            <select name="q21c">
                <option value="champagne">Champagne</option>
                <option value="wine">Wine</option>
                <option value="beer">Beer</option>
                <option value="spirits">Spirits</option>
            </select>
            <label for="q21d">Four:</label>
            <select name="q21d">
                <option value="champagne">Champagne</option>
                <option value="wine">Wine</option>
                <option value="beer">Beer</option>
                <option value="spirits">Spirits</option>
            </select>
            <label for="q21e">Five:</label>
            <select name="q21e">
                <option value="champagne">Champagne</option>
                <option value="wine">Wine</option>
                <option value="beer">Beer</option>
                <option value="spirits">Spirits</option>
            </select>

      </fieldset>
      <button type="submit" name="submit" id="submit">Submit</button>
    </form>

  </body>
</html>
