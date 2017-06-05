<!DOCTYPE html>
<head>
	<title>Visualizations</title>
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

        $id = $_POST['pkg_array'];
		$package_checks = [];

		foreach ($id as $value) {
			if ($value) {
				$package_checks[$value] = 1;
			}
		}

		// Query  to insert the checked boxes into the package table
		$packages="";
		$arraykeys = array_keys($package_checks); // implode(",", $package_checks);
		for ($i=0; $i < count($arraykeys); $i++) {
			$packages .= $arraykeys[$i];
			if($i < count($arraykeys) - 1) {
				$packages .= ", ";
			}
		}

		$values = implode(",", array_map(function($x) use ($connection) {
			return $x;
		}, $package_checks));

		if (!empty($other)) {
			$packages .= ', other';
			$values .=  "," . "'" . $other . "'";
		}

        $source = $_POST["source"];
        $reference = $_POST["ref"];

		$retreive_sample = "SELECT barcode, name, source, reference, dor, address, email, phone FROM sample_info";
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

        $keys = "";
        $package_wheres = "";
        $count = 0;
        print_r($package_checks);
        echo "<br>";
        foreach ($package_checks as $key => $value) {
            echo $key . "=>" . $value;
            echo "<br>";
            if ($count == count($package_checks) - 1) {
                $keys .= $key . " ";
                $package_wheres .= $key . " ";

            } else {
                $keys .= $key . ", ";
                $package_wheres .= $key . " OR ";
            }
            $count++;
        }

        // Template query for querying the package table
        $package_query = "SELECT " . $keys . "FROM package ";
        $package_query .= "WHERE " . $package_wheres . " LIKE 1";
        echo $package_query;
        echo "<br>";

        $result = mysqli_query($connection, $package_query);
        print_r($result);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            print_r($row);
            echo "<br>";
            $row_dup[] = $row;
        }
        echo "hey";
        echo "<br>";
        print_r($result->current_field);
        echo "<br>";
        echo "hey";
        echo "<br>";
        // $row_dup = mysqli_fetch_array($result);
        print_r($row_dup);
        echo "<br>";

        for ($i=0; $i < count($row_dup); $i++) {
            for ($j=0; $j < count($arraykeys); $j++) {
                $x = $arraykeys[$j];
                if(${$x} == ""){
                    ${$x} = $row_dup[$i]["$x"];
                } else {
                    ${$x} += $row_dup[$i]["$x"];
                }
            }
            echo ${$arraykeys[$j]};
        }


    }   // end of if which checks if the form has been submitted
    // 3. Close connection to the database
	if (isset($connection)) { mysqli_close($connection); }
?>
