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

        $name = $_POST["user_name"];
        $email = $_POST["user_email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $dor = $_POST["date"];

        // Validation to ensure that the date entered is in YYYY-MM-DD format
        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dor))
        {
            echo "Date Not Entered in Correct Format.";
			echo "<br>";
        }

        $barcode = $_POST["barcode"];
		if(isset($_POST["others_package"])) {
			$other = $_POST["others_package"];
		}
		// echo $other;

        $id = $_POST['pkg_array'];
		$package_checks = [];

		foreach ($id as $value) {
			if ($value) {
				$package_checks[$value] = 1;
			}
		}
		// print_r($package_checks);
		// echo "<br>";
        // $extract is the array that contains the values of each of the
        // checkboxes in the form of {number, value}
        // You can reference the elements using $extract[0],$extract[1]..

		// Query  to insert the checked boxes into the package table
		$packages="";
		$arraykeys = array_keys($package_checks); // implode(",", $package_checks);
		for ($i=0; $i < count($arraykeys); $i++) {
			$packages .= $arraykeys[$i];
			if($i < count($arraykeys) - 1) {
				$packages .= ", ";
			}
		}
		// print_r($packages);
		// echo "<br>";
		$values = implode(",", array_map(function($x) use ($connection) {
			return $x;
		}, $package_checks));

		if (!empty($other)) {
			$packages .= ', other';
			$values .=  "," . "'" . $other . "'";
		}

		// echo "Array keys <br>";
		// print_r($arraykeys);
		// echo "<br>";
		// echo "Values <br>";
		// print_r($values);
		// echo "<br>";
		// echo "Packages <br>";
		// print_r($packages);
		// echo "<br>";

		$query_package  = "INSERT INTO package (";
    	$query_package .= "barcode, $packages";
    	$query_package .= ") VALUES (";
    	$query_package .= "$barcode, $values";
    	$query_package .= ")";
        // echo $query_package;
		$result = mysqli_query($connection, $query_package);
		// echo "<br>";

        $source = $_POST["source"];
        $reference = $_POST["ref"];

        $query  = "INSERT INTO sample_info (";
    	$query .= "barcode, name, source, reference, dor, address, email, phone";
    	$query .= ") VALUES (";
    	$query .= "$barcode, '$name', '$source', '$reference', '$dor', '$address', '$email', '$phone'";
    	$query .= ")";
        // echo $query;
		// echo "<br>";
		// testing strategy -
		// static values for testing if data is entering into the database/table

        // 2. Query to the database
    	$result = mysqli_query($connection, $query);

        if ($result) {
    		// Success

			$retreive_sample = "SELECT barcode, name, source, reference, dor, address, email, phone FROM sample_info ";
			$retreive_sample .= "WHERE barcode LIKE $barcode";
			$sample_ret_success = mysqli_query($connection, $retreive_sample);

			if ($sample_ret_success) {
			echo "<table width='75%'>";
			echo "<thead><tr><th>Barcode</th><th>Name</th><th>Packages</th><th>Source</th>";
			echo "<th>Reference</th><th>DOR</th><th>Address</th><th>Email</th><th>Phone</th></tr>";

			$row = mysqli_fetch_array($sample_ret_success, MYSQLI_ASSOC);

			echo '<tr><td align="center">' . $row['barcode'] . '</td><td align="left">' . $row['name'] . '</td>';
			echo '<td align="center">';
			echo $packages;
			echo '</td>';
			echo '<td align="center">' . $row['source'] . '</td><td align="left">' . $row['reference'] . '</td>';
			echo '<td align="center">' . $row['dor'] . '</td><td align="left">' . $row['address'] . '</td>';
			echo '<td align="center">' . $row['email'] . '</td><td align="left">' . $row['phone'] . '</td></tr>';
			echo "</table>";

			echo "<link href=\"https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i\" rel=\"stylesheet\">";
            echo "<style type=\"text/css\">";
			echo "th, td { border-style: solid; border-color: black; font-family: Josefin Sans; }";
            echo "td { text-align: center; }";
			echo "</style>";

			mysqli_free_result($sample_ret_success);
    	} else {
    		// Failure
    		echo "Your query has failed.";
			printf("Errors: %s\n", mysqli_error($connection));
    		}
    	}
	}
    // 3. Close connection to the database
	if (isset($connection)) { mysqli_close($connection); }
?>
