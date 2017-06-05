<?php
	// Start the session
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Barcode Retreival</title>
	  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i" rel="stylesheet">
      <link rel="stylesheet" href="css/main.css">
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
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

    <form action="filter_barcodes.php" method="post">
      <h1>Filter Barcodes</h1>
      <fieldset>
        <legend>The Barcodes that are yet to be delivered to the DNA Extraction Lab and the
			Genotyping QC Lab:</legend>
        <button type="submit" name="submit" id="submit">Click here to retreive!</button>
      </fieldset>
    </form>
  </body>
</html>
