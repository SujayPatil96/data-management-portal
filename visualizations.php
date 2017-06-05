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
	<title>Visualizations</title>
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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

        // $visual = $_POST["visual"];
		// print_r($visual);

        $query = "SELECT * FROM package";
        $result = mysqli_query($connection, $query);

		$query2 = "SELECT source FROM sample_info";
		$result2 = mysqli_query($connection, $query2);

		$nutrition_query = "SELECT nutrition FROM package ";
		$nutrition_query .= "WHERE nutrition = 1";
		$nutrition_result = mysqli_query($connection, $nutrition_query);

		$health_query = "SELECT health FROM package ";
		$health_query .= "WHERE health = 1";
		$health_result = mysqli_query($connection, $health_query);

		$fitness_query = "SELECT fitness FROM package ";
		$fitness_query .= "WHERE fitness = 1";
		$fitness_result = mysqli_query($connection, $fitness_query);

		$acne_query = "SELECT acne FROM package ";
		$acne_query .= "WHERE acne = 1";
		$acne_result = mysqli_query($connection, $acne_query);

		$pigmentation_query = "SELECT pigmentation FROM package ";
		$pigmentation_query .= "WHERE pigmentation = 1";
		$pigmentation_result = mysqli_query($connection, $pigmentation_query);

		$rad_skin_query = "SELECT rad_skin FROM package ";
		$rad_skin_query .= "WHERE rad_skin = 1";
		$rad_skin_result = mysqli_query($connection, $rad_skin_query);

		$cardio_query = "SELECT cardio FROM package ";
		$cardio_query .= "WHERE cardio = 1";
		$cardio_result = mysqli_query($connection, $cardio_query);

		$comp_query = "SELECT comp FROM package ";
		$comp_query .= "WHERE comp = 1";
		$comp_result = mysqli_query($connection, $comp_query);

		$ind_drug_query = "SELECT ind_drug FROM package ";
		$ind_drug_query .= "WHERE ind_drug = 1";
		$ind_drug_result = mysqli_query($connection, $ind_drug_query);

		$clopi_query = "SELECT clopi FROM package ";
		$clopi_query .= "WHERE clopi = 1";
		$clopi_result = mysqli_query($connection, $clopi_query);

		$male_inf_query = "SELECT male_inf FROM package ";
		$male_inf_query .= "WHERE male_inf = 1";
		$male_inf_result = mysqli_query($connection, $male_inf_query);

		$immuno_query = "SELECT immuno FROM package ";
		$immuno_query .= "WHERE immuno = 1";
		$immuno_result = mysqli_query($connection, $immuno_query);

		$ivf_query = "SELECT ivf FROM package ";
		$ivf_query .= "WHERE ivf = 1";
		$ivf_result = mysqli_query($connection, $ivf_query);

		$retail_query = "SELECT source FROM sample_info ";
		$retail_query .= "WHERE source LIKE 'retail'";
		$retail_result = mysqli_query($connection, $retail_query);

		$channel_partner_query = "SELECT source FROM sample_info ";
		$channel_partner_query .= "WHERE source LIKE 'channel_partner'";
		$channel_partner_result = mysqli_query($connection, $channel_partner_query);

		$hospital_query = "SELECT source FROM sample_info ";
		$hospital_query .= "WHERE source LIKE 'hospital'";
		$hospital_result = mysqli_query($connection, $hospital_query);

		$xcode_query = "SELECT source FROM sample_info ";
		$xcode_query .= "WHERE source LIKE 'xcode'";
		$xcode_result = mysqli_query($connection, $xcode_query);

		$corporate_query = "SELECT source FROM sample_info ";
		$corporate_query .= "WHERE source LIKE 'corporate'";
		$corporate_result = mysqli_query($connection, $corporate_query);


        if ($result) {
			echo "<h3>Table contaning Package data:</h3>";
            echo "<table width='75%'>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row["barcode"] . "</td>";
                echo "<td>" . $row["nutrition"] . "</td>";
                echo "<td>" . $row["health"] . "</td>";
                echo "<td>" . $row["fitness"] . "</td>";
                echo "<td>" . $row["acne"] . "</td>";
                echo "<td>" . $row["pigmentation"] . "</td>";
                echo "<td>" . $row["rad_skin"] . "</td>";
                echo "<td>" . $row["cardio"] . "</td>";
                echo "<td>" . $row["comp"] . "</td>";
                echo "<td>" . $row["ind_drug"] . "</td>";
                echo "<td>" . $row["clopi"] . "</td>";
                echo "<td>" . $row["male_inf"] . "</td>";
                echo "<td>" . $row["immuno"] . "</td>";
                echo "<td>" . $row["other"] . "</td>";
                echo "<td>" . $row["ivf"] . "</td>";
                echo "</tr>";

                // $package_array[] = $row;
            }

            echo "</table>";
			echo "<br>";

        if ($result2) {
			echo "<h3>Table contaning Source data:</h3>";
            echo "<table width='25%'>";
            while ($row = mysqli_fetch_array($result2)) {
                echo "<tr>";
                echo "<td>" . $row["source"] . "</td>";
				echo "</tr>";

                // $source_array[] = $row;
            }
		}

            echo "</table>";
			echo "<br>";


            // echo "<br>";
            // print_r(json_encode($package_array));
			//
            // $json_string = json_encode($package_array);     // JSON content

            // Write to a JSON file on the server called sampleData.json
            // $fp = fopen('sampleData.json', 'w');
            // fwrite($fp, json_encode($package_array, JSON_PRETTY_PRINT));
            // fclose($fp);

            echo "<link href=\"https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i\" rel=\"stylesheet\">";
            echo "<style type=\"text/css\">";
            echo "th, td { border-style: solid; border-color: black; font-family: Josefin Sans; }";
            echo "td { text-align: center; }";
            echo "</style>";
        }
    }

    // 3. Close connection to the database
	if (isset($connection)) { mysqli_close($connection); }
?>
<!DOCTYPE html>
<html>
  <head>
	  <style type="text/css">
	  	html, body, div {
	  		font-family: Josefin Sans, sans-serif;
	  	}
	  </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i" rel="stylesheet">
    <script type="text/javascript">
	  google.charts.load('current', {'packages':['corechart', 'controls']});
      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);

	  // Set a callback to run when the Google Visualization API is loaded.
	  google.charts.setOnLoadCallback(drawDashboard1);
	  google.charts.setOnLoadCallback(drawDashboard2);

      function drawChart1() {

		// Create the data table
        var data = google.visualization.arrayToDataTable([
			['Package', 'Count'],
			['nutrition', <?php echo $nutrition_result->num_rows; ?>],
			['health', <?php echo $health_result->num_rows; ?>],
			['fitness', <?php echo $fitness_result->num_rows; ?>],
			['acne', <?php echo $acne_result->num_rows; ?>],
			['pigmentation', <?php echo $pigmentation_result->num_rows; ?>],
			['rad_skin', <?php echo $rad_skin_result->num_rows; ?>],
			['cardio', <?php echo $cardio_result->num_rows; ?>],
			['comp', <?php echo $comp_result->num_rows; ?>],
			['ind_drug', <?php echo $ind_drug_result->num_rows; ?>],
			['clopi', <?php echo $clopi_result->num_rows; ?>],
			['male_inf', <?php echo $male_inf_result->num_rows; ?>],
			['immuno', <?php echo $immuno_result->num_rows; ?>],
			['ivf', <?php echo $ivf_result->num_rows; ?>]
        ]);

        var options = {
        	title: 'Visualization of package data',
			fontName: 'Josefin Sans',
			fontSize: 20
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
			['Source', 'Count'],
			['retail', <?php echo $retail_result->num_rows; ?>],
			['channel_partner', <?php echo $channel_partner_result->num_rows; ?>],
			['hospital', <?php echo $hospital_result->num_rows; ?>],
			['xcode', <?php echo $xcode_result->num_rows; ?>],
			['corporate', <?php echo $corporate_result->num_rows; ?>],
        ]);

        var options = {
        	title: 'Visualization of source data',
			fontName: 'Josefin Sans',
			fontSize: 20
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
	  function drawDashboard1() {

		// Create our data table.
		var data3 = google.visualization.arrayToDataTable([
			['Package', 'Count'],
			['nutrition', <?php echo $nutrition_result->num_rows; ?>],
			['health', <?php echo $health_result->num_rows; ?>],
			['fitness', <?php echo $fitness_result->num_rows; ?>],
			['acne', <?php echo $acne_result->num_rows; ?>],
			['pigmentation', <?php echo $pigmentation_result->num_rows; ?>],
			['rad_skin', <?php echo $rad_skin_result->num_rows; ?>],
			['cardio', <?php echo $cardio_result->num_rows; ?>],
			['comp', <?php echo $comp_result->num_rows; ?>],
			['ind_drug', <?php echo $ind_drug_result->num_rows; ?>],
			['clopi', <?php echo $clopi_result->num_rows; ?>],
			['male_inf', <?php echo $male_inf_result->num_rows; ?>],
			['immuno', <?php echo $immuno_result->num_rows; ?>],
			['ivf', <?php echo $ivf_result->num_rows; ?>]
        ]);

		// Create a dashboard.
		var dashboard = new google.visualization.Dashboard(
			document.getElementById('dashboard_div1'));

		// Create a range slider, passing some options
		var countRangeSlider = new google.visualization.ControlWrapper({
		  'controlType': 'NumberRangeFilter',
		  'containerId': 'filter_div1',
		  'options': {
			'filterColumnLabel': 'Count',
			'fontName': 'Josefin Sans',
			'fontSize': 20
		  }
		});

		// Create a pie chart, passing some options
		var pieChart = new google.visualization.ChartWrapper({
		  'chartType': 'PieChart',
		  'containerId': 'chart_div1',
		  'options': {
			'pieSliceText': 'value',
			'legend': 'right',
			'fontName': 'Josefin Sans',
			'fontSize': 20,
			'title': 'Filter the packages based on the count'
		  }
		});

		// Establish dependencies, declaring that 'filter' drives 'pieChart',
		// so that the pie chart will only display entries that are let through
		// given the chosen slider range.
		dashboard.bind(countRangeSlider, pieChart);

		// Draw the dashboard.
		dashboard.draw(data3);
	  }

	  function drawDashboard2() {

		// Create our data table.
		var data3 = google.visualization.arrayToDataTable([
			['Source', 'Count'],
			['retail', <?php echo $retail_result->num_rows; ?>],
			['channel_partner', <?php echo $channel_partner_result->num_rows; ?>],
			['hospital', <?php echo $hospital_result->num_rows; ?>],
			['xcode', <?php echo $xcode_result->num_rows; ?>],
			['corporate', <?php echo $corporate_result->num_rows; ?>],
        ]);

		// Create a dashboard.
		var dashboard = new google.visualization.Dashboard(
			document.getElementById('dashboard_div2'));

		// Create a range slider, passing some options
		var countRangeSlider = new google.visualization.ControlWrapper({
		  'controlType': 'NumberRangeFilter',
		  'containerId': 'filter_div2',
		  'options': {
			'filterColumnLabel': 'Count',
			'fontName': 'Josefin Sans',
			'fontSize': 20
		  }
		});

		// Create a pie chart, passing some options
		var pieChart = new google.visualization.ChartWrapper({
		  'chartType': 'PieChart',
		  'containerId': 'chart_div2',
		  'options': {
			'pieSliceText': 'value',
			'legend': 'right',
			'fontName': 'Josefin Sans',
			'fontSize': 20,
			'title': 'Filter the sources based on the count'
		  }
		});

		// Establish dependencies, declaring that 'filter' drives 'pieChart',
		// so that the pie chart will only display entries that are let through
		// given the chosen slider range.
		dashboard.bind(countRangeSlider, pieChart);

		// Draw the dashboard.
		dashboard.draw(data3);
	  }
    </script>
  </head>
  <body>
	<div id="dashboard_div1" style="width: 900px; height: 500px; position: relative; left: 25%;">
	<div id="filter_div1"></div>
	<div id="chart_div1" style="width: 900px; height: 500px;"></div>
	</div>
	<br>
	<div id="dashboard_div2" style="width: 900px; height: 500px; position: relative; left: 25%;">
	<div id="filter_div2"></div>
	<div id="chart_div2" style="width: 900px; height: 500px;"></div>
	</div>
	<br>
    <div id="piechart1" style="width: 900px; height: 500px; position: relative; left: 25%;"></div>
    <div id="piechart2" style="width: 900px; height: 500px; position: relative; left: 25%;"></div>
  </body>
</html>
