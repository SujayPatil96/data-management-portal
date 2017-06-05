<?php
	// Start the session
	session_start();
	ob_start();

	if (!isset($_SESSION['user'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<head>
	<title>Barcode Retreival Details</title>
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
        // Retreive those barcodes that are present in the initial sample table
        // but not present in the DNA Extraction table and the Genotyping QC table

        $query = "SELECT t1.barcode ";
        $query .= "FROM sample_info t1 ";
        $query .= "LEFT JOIN dna_extr t2 ON t2.barcode = t1.barcode ";
        $query .= "WHERE t2.barcode IS NULL";

        // Query the database to retreive those barcodes
        $result = mysqli_query($connection, $query);

        if ($result) {      // If the query has executed successfully

            // Output the table headers to the page
            echo "<table>";
            echo "<th>Barcodes left to be sent/delivered:</th>";

            // Run through all the records
			$barcodes = "";

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr><td>' . $row["barcode"] . '</td></tr>';
				$barcodes .= $row["barcode"] . " | ";
            }

            // Close the table
            echo "</table>";
			echo "<br>";
			// print_r($barcodes);		this is to get the barcodes concatenated with a "pipe" to make available across all pages

			$_SESSION["barcodes_sent"] = $barcodes;	// Use this SESSION variable to grab this data in the dna_extr.php file

            // Add borders to each cell in the table
            // Also add some custom styles
            echo "<link href=\"https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i\" rel=\"stylesheet\">";
            echo "<style type=\"text/css\">";
			echo "th, td { border-style: solid; border-color: black; font-family: Josefin Sans; }";
            echo "td { text-align: center; }";
			echo "</style>";
        } else {
            echo "No records remain left to be sent/delivered to the DNA Extraction Lab.";
        }
    }

    // 3. Close connection to the database
	if (isset($connection)) { mysqli_close($connection); }
?>
