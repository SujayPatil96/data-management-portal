<?php
    // Start the session_start
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
    }

    // Grab the data sent from the filter_barcodes.php file
    $barcodes_concat = $_SESSION["barcodes_sent"];

    // testing
    // print_r($barcodes_concat);
    // echo "<br>";

    $barcodes_split = explode(" | ", $barcodes_concat);

    // testing
    // print_r($barcodes_split);

    $_SESSION["barcodes_split"] = $barcodes_split;
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Genotyping QC Details</title>
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

    <form action="geno_qc_entry.php" method="post">
      <h1>Genotyping QC Details</h1>
      <fieldset>
        <legend><span class="number">1</span>Genotyping QC Details</legend>
        <label for="sample_number">Sample Number:</label>
        <input type="text" id="sample_number" name="sample_number">

        <!-- <label for="barcode_man">Enter barcode manually:</label>
        <input type="text" id="barcode_man" name="barcode_man"> -->

        <label for="barcode">Barcodes that are yet to be delivered:</label>
        <select name="barcode" id="barcode">
            <?php
                session_start();    // Start the session to make the barcodes available

                foreach ($barcodes_split as $value) {
                    if (!empty($value)) {
                        echo "<option value=" . $value . ">" . $value . "</option>";
                    }
                }
            ?>
        </select>

        <label for="f260_230">260/230:</label>
        <input type="text" id="f260_230" name="f260_230">

        <label for="f260_280">260/280:</label>
        <input type="text" id="f260_280" name="f260_280" />

        <label for="conc">Concentration:</label>
        <input type="text" id="conc" name="conc" />

		<!-- <label for="datepicker">Date of Submission:</label>
		<input type="text" id="datepicker" name="dos" /> -->

        <label for="datepicker">Date of QC:</label>
        <input type="text" id="datepicker" name="doqc" />
      </fieldset>

      <button type="submit" name="submit" id="submit">Submit</button>
    </form>

  </body>
</html>
