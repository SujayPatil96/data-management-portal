<?php
	// Start the session
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<head>
	<title>Search Results</title>
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

		// Collect all the values coming from the form
		$name = $_POST["user_name"];
		$dor = $_POST["date"];
		$barcode = $_POST["barcode"];
		$source = $_POST["source"];
		$reference = $_POST["ref"];

		$subquery = "";
		if(!empty($name)) {
			$subquery .= "name LIKE '$name'";
		}
		if (!empty($dor)) {
			if ($subquery != "") {
				$subquery .= " AND dor LIKE '$dor'";
			} else {
				$subquery .= "dor LIKE '$dor'";
			}
		}
		if (!empty($barcode)) {
			if ($subquery != "") {
				$subquery .= " AND barcode LIKE $barcode";
			} else {
				$subquery .= "barcode LIKE $barcode";
			}
		}
		if (!empty($source)) {
			if ($source == "empty") {
				$subquery .= "";
			} else if ($subquery != "") {
				$subquery .= " AND source LIKE '$source'";
			} else {
				$subquery .= "source LIKE '$source'";
			}
		}
		if (!empty($reference)) {
			if ($reference == "empty") {
				$subquery .= "";
			} else if ($subquery != "") {
				$subquery .= " AND reference LIKE '$reference'";
			} else {
				$subquery .= "reference LIKE '$reference'";
			}
		}

		$query  = "SELECT barcode, name, source, reference, dor, address, email, phone ";
		$query .= "FROM sample_info WHERE ";
		$query .= "$subquery";
		$result = mysqli_query($connection, $query);

		// Create the table headers
		echo "<table width='75%'>";
		echo "<thead><tr><th>Barcode</th><th>Name</th><th>Source</th><th>Reference</th>";
		echo "<th>DOR</th><th>Address</th><th>Email</th><th>Phone</th></tr>";

		// Output the values from the table onto the screen
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			
			echo '<tr><td align="center">' . $row['barcode'] . '</td><td align="left">' . $row['name'] . '</td>';
			echo '<td align="center">' . $row['source'] . '</td><td align="left">' . $row['reference'] . '</td>';
			echo '<td align="center">' . $row['dor'] . '</td><td align="left">' . $row['address'] . '</td>';
			echo '<td align="center">' . $row['email'] . '</td><td align="left">' . $row['phone'] . '</td></tr>';

		}
		// Close the table
		echo "</table>";

		// Add custom styles to the table
		echo "<link href=\"https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i\" rel=\"stylesheet\">";
		echo "<style type=\"text/css\">";
		echo "th, td { border-style: solid; border-color: black; font-family: Josefin Sans; }";
		echo "td { text-align: center; }";
		echo "</style>";
	} // end of the if condition checking if form has been properly submitted

    // 3. Close connection to the database
	if (isset($connection)) { mysqli_close($connection); }
?>
