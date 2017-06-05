<?php
	// Start the session
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<head>
	<title>Genotyping QC Details Confirmation</title>
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

        // Grab all the data coming after form submission
        $sample_number = $_POST["sample_number"];
        $barcode = $_POST["barcode"];
        $f260_230 = $_POST["f260_230"];
        $f260_280 = $_POST["f260_280"];
        $concentration = $_POST["conc"];
		// $dos = $_POST["dos"];
        $doqc = $_POST["doqc"];

		$query  = "INSERT INTO geno_qc (";
    	$query .= "sample_number, barcode, 260_230, 260_280, conc, doqc";
    	$query .= ") VALUES (";
    	$query .= "$sample_number, $barcode, '$f260_230', '$f260_280', '$concentration', '$doqc'";
    	$query .= ")";

		// 2. Query to the database
		$result = mysqli_query($connection, $query);

		if ($result) {
			// Success

			$retreive_geno = "SELECT sample_number, barcode, 260_230, 260_280, conc, doqc FROM geno_qc ";
			$geno_ret_success = mysqli_query($connection, $retreive_geno);

			if ($geno_ret_success) {
			echo "<table width='75%'>";
			echo "<thead><tr><th>Sample Number</th><th>Barcode</th><th>260_230</th><th>260_280</th>";
			echo "<th>Concentration</th><th>DOQC</th></tr>";

			$row = mysqli_fetch_array($geno_ret_success, MYSQLI_ASSOC);

			echo '<tr><td align="center">' . $row['sample_number'] . '</td><td align="left">' . $row['barcode'] . '</td>';
			echo '<td align="center">' . $row['260_230'] . '</td><td align="left">' . $row['260_280'] . '</td>';
			echo '<td align="center">' . $row['conc'] . '</td><td align="left">' . $row['doqc'] . '</td><tr>';
			echo "</table>";

			echo "<link href=\"https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i\" rel=\"stylesheet\">";
			echo "<style type=\"text/css\">";
			echo "th, td { border-style: solid; border-color: black; font-family: Josefin Sans; }";
			echo "td { text-align: center; }";
			echo "</style>";

			mysqli_free_result($geno_ret_success);
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
