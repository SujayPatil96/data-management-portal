<?php
    // Start the session_start
    session_start();
    ob_start();

    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
    }

    // Grab the data sent from the filter_barcodes.php file
    // $barcodes_concat = $_SESSION["barcodes_sent"];

    // testing
    // print_r($barcodes_concat);
    // echo "<br>";

    // $barcodes_split = explode(" | ", $barcodes_concat);

    // testing
    // print_r($barcodes_split);

    // $_SESSION["barcodes_split"] = $barcodes_split;
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Search Parameters</title>
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

    <form action="search_results.php" method="post">
      <h1>Filter your Search</h1>
      <fieldset>
        <legend>Select or Enter the paramters you want to filter with respect to:</legend>
        <label for="name">Name:</label>
        <input type="text" id="name" name="user_name">

      <label for="dor">Date of Receipt:</label>
      <input type="text" id="datepicker" name="date" />

      <label for="barcode">Barcode:</label>
      <input type="text" id="barcode" name="barcode" />

      <label for="source">Source name:</label>
      <select id="source" name="source">
        <option value="empty">None</option>
        <option value="retail">Retail</option>
        <option value="channel_partner">Channel Partner</option>
        <option value="hospital">Hospital</option>
        <option value="xcode">XCode</option>
        <option value="corporate">Corporate</option>
      </select>

      <label for="ref">Reference:</label>
      <select id="ref" name="ref">
        <option value="">None</option>
        <option style="color: #a1a1de;">Corporate----</option>
        <option value="hul">HUL</option>
        <option style="color: #a1a1de;">Hospital----</option>
        <option value="apollo_fert">Apollo Fertility</option>
        <option value="apollo_hosp">Apollo Hospital</option>
        <option value="Balaji_hosp">Balaji Hospital</option>
        <option value="be_well">Be Well</option>
        <option value="hira_hosp">Hiranandani Hospital</option>
        <option value="kav_hosp">Kauvery Hospital</option>
        <option value="mmm">MMM</option>
        <option value="pearl_sing">Pearl Singapore Fertility Clinic</option>
        <option value="shrushti">Shrushti Fertility</option>
        <option value="srmc">SRMC</option>
        <option value="venkateshwara">Venkateshwara Hospital</option>
        <option value="vhs">VHS</option>
        <option value="womens_center">Womens center</option>
        <option value="jan_fert">Jananam Fertility</option>
        <option style="color: #a1a1de;">Retail----</option>
        <option value="arjun">Arjun Ref</option>
        <option value="abdur">Abdur Ref</option>
        <option value="misbah">Misbah Ref</option>
        <option value="niyati">Niyati Ref</option>
        <option value="rafi">Rafi Ref</option>
        <option value="saleem">Saleem Ref</option>
        <option value="varsha">Varsha Ref</option>
        <option value="walk_in">Walk In</option>
        <option style="color: #a1a1de;">Channel Partners----</option>
        <option value="added_sport">Added Sport</option>
        <option value="asia_gen">Asia Genomics</option>
        <option value="bryce">Bryce</option>
        <option value="cods">CODS</option>
        <option value="dan">Dan</option>
        <option value="diasem">Diasem</option>
        <option value="ehf">EHF</option>
        <option value="gene_fit">Gene Fit</option>
        <option value="health_spring">HealthSpring</option>
        <option value="iayiam">I am Y I am</option>
        <option value="jan_ref">Janani Reference</option>
        <option value="kty">K T Yong</option>
        <option value="kamna">Kamna Ref</option>
        <option value="medall">Medall</option>
        <option value="miodrag">Miodrag</option>
        <option value="nmm">NM Medical</option>
        <option value="miodrag">Miodrag</option>
        <option value="right_living">Right Living</option>
        <option value="sufc">SUFC</option>
        <option value="super_fit">Super Fit</option>
        <option value="the_quad">The Quad</option>
        <option value="virtus">Virtus</option>
        <option value="ziyad">Ziyad</option>
      </select>

      </fieldset>

      <button type="submit" name="submit" id="submit">Submit</button>
    </form>

  </body>
</html>
