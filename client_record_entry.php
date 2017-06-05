<?php
	// Start the session
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<head>
	<title>Client Record Confirmation</title>
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>

<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "process_flow");

    // 1. Create a database connection
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Test if connection succeeded
    if(mysqli_connect_errno()) {
        die("Database connection failed: " .
        mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }

    if (isset($_POST['submit'])) {
	    // Process the form

		// Collect all the data coming in from the client record card form
		// Collect the basic user information
        $full_name = $_POST["full_name"];
		$gender = $_POST["gender"];
		$dob = $_POST["dob"];
		$height = $_POST["height"];
		$weight = $_POST["weight"];
		$email = $_POST["user_email"];
		$mobile = $_POST["mobile"];
		$edu = $_POST["edu"];
		$address = $_POST["address"];
		$barcode = $_POST["barcode"];

		// Collect the answers to the questions
		$a1 = $_POST["q1"];
		$a2 = $_POST["q2"];
		$a3a = $_POST["q3a"];
		$a3b = $_POST["q3b"];

		// Capture other2, an answer to q5
		$other2 = $_POST["other2"];
		$a5 = $_POST["q5"];
		$a5 .= ", " . $other2;
		echo $a5;
		echo "<br>";

		$a6 = $_POST["q6"];
		$a7 = $_POST["q7"];

		// Capture other3, an answer to q8
		$other3 = $_POST["other3"];
		$a8 = $_POST["q8"];
		$a8 .= ", " . $other3;
		echo $a8;
		echo "<br>";

		$a9 = $_POST["q9"];
		$a10 = $_POST["q10"];
		$a11 = $_POST["q11"];
		$a12 = $_POST["q12"];
		$a13a = $_POST["q13a"];
		$a13b = $_POST["q13b"];
		$a14 = $_POST["q14"];

		// For q4, q15 and q16
		$a15 = "";
		$a16 = "";
		$a4 = "";
		$a15_arr_org = $_POST["diseases"];
		$a16_arr_org = $_POST["ind_diseases"];
		$a4_arr_org = $_POST["allergy"];
		$a15_arr_mod = [];
		$a16_arr_mod = [];
		$a4_arr_mod = [];
		$count1 = 0;
		$count2 = 0;
		$count3 = 0;
		foreach ($a15_arr_org as $value) {
			if ($value != "") {
				$a15_arr_mod[$count1] = $value;
				$count1++;
			}
		}
		foreach ($a16_arr_org as $value) {
			if ($value != "") {
				$a16_arr_mod[$count2] = $value;
				$count2++;
			}
		}
		foreach ($a4_arr_org as $value) {
			if ($value != "") {
				$a4_arr_mod[$count3] = $value;
				$count3++;
			}
		}

		print_r($a15_arr_mod);
		echo "<br>";

		print_r($a16_arr_mod);
		echo "<br>";

		print_r($a4_arr_mod);
		echo "<br>";

		$a15 = "";
		for ($i=0; $i < count($a15_arr_mod); $i++) {
			if ($i < count($a15_arr_mod) - 1) {
				$a15 .= $a15_arr_mod[$i] . ", ";
			} else {
				$a15 .= $a15_arr_mod[$i];
			}
		}

		$a16 = "";
		for ($i=0; $i < count($a16_arr_mod); $i++) {
			if ($i < count($a16_arr_mod) - 1) {
				$a16 .= $a16_arr_mod[$i] . ", ";
			} else {
				$a16 .= $a16_arr_mod[$i];
			}
		}

		$a4 = "";
		for ($i=0; $i < count($a4_arr_mod); $i++) {
			if ($i < count($a4_arr_mod) - 1) {
				$a4 .= $a4_arr_mod[$i] . ", ";
			} else {
				$a4 .= $a4_arr_mod[$i];
			}
		}

		echo $a15;
		echo "<br>";
		echo $a16;
		echo "<br>";
		echo $a4;
		echo "<br>";


		// Capture other4, an answer to q17a
		$other4 = $_POST["other4"];
		$a17a = $_POST["q17a"];
		$a5 .= ", " . $other4;
		echo $a5;
		echo "<br>";
		
		$a18 = $_POST["q17a"];
		$a19a = $_POST["q19a"];
		$a19b = $_POST["q19b"];
		$a19c = $_POST["q19c"];
		$a19d = $_POST["q19d"];
		$a19e = $_POST["q19e"];
		$a19f = $_POST["q19f"];
		$a19g = $_POST["q19g"];
		$a20a = $_POST["q20a"];
		$a20b = $_POST["q20b"];
		$a21a = $_POST["q21a"];
		$a21b = $_POST["q21b"];
		$a21c = $_POST["q21c"];
		$a21d = $_POST["q21d"];
		$a21e = $_POST["q21e"];

	}
    // 3. Close connection to the database
	if (isset($connection)) { mysqli_close($connection); }
?>
