<?php
	// Start the session
	session_start();
	ob_start();

	if (!isset($_SESSION['user'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Admin Panel</title>
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" media="all" href="css/admin_panel.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i" rel="stylesheet">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
  <nav id="fixedbar">
    <ul id="fixednav">
      <li><a href="sample_info.php">Sample Details</a></li>
      <li><a href="dna_extr.php">DNA Details</a></li>
      <li><a href="geno_qc.php">Genotyping Details</a></li>
    </ul>
  </nav>

  <div id="w">
    <img id="head_logo" src="images/xcode-logo.png" alt="xcode-logo" />

    <nav id="navigation">
      <ul>
        <li><a href="sample_info.php">Initial Sample Information</a></li>
        <li><a href="dna_extr.php">DNA Extraction Details</a></li>
        <li><a href="geno_qc.php">Genotyping QC Details</a></li>
        <li><a href="client_record.php">Client Record Card</a></li>
        <li><a href="gen_visualizations.php">Generate Visualizations</a></li>
        <li><a href="retreive_barcodes.php">Retreive Barcodes</a></li>
        <li><a href="search_parameters.php">Search</a></li>
        <li><a href="send_mail.php">Trigger Mail</a></li>
        <li><a href="logout.php?logout">Sign Out</a></li>
      </ul>
    </nav>

    <div id="content">
	<br>
    <h1>Brief Documentation.</h1>

	<ul>
	<li>
	    <p style="font-weight: bold;">Initial Sample Information</p>
		<p>By clicking on the 'Initial Sample Information' link above you will
		be redirected to a form which allows you to enter the initial details of the saliva
		sample, and it is to be maintained for internal reference only.</p>
	</li>
	<li>
		<p style="font-weight: bold;">DNA Extraction Details</p>
		<p>By clicking on the 'DNA Extraction Details' link above you will
		be redirected to a form, which is meant for the specified admin at the
		DNA Extraction lab. The other tabs on the panel won't be made visible to him.
		</p>
	</li>
	<li>
	    <p style="font-weight: bold;">Genotyping QC Details</p>
		<p>By clicking on the 'Genotyping QC Details' link above you will
		be redirected to a form, which is meant for the specified admin at the
		Genotyping QC lab. The other tabs on the panel won't be made visible to him.</p>
	</li>
	<li>
	    <p style="font-weight: bold;">Client Record Card</p>
		<p>By clicking on the 'Client Record Card' link above you will be able
		to view a form which links to the clients table in the database. You can
		make entries into the table and search for the necessary client records.
		</p>
	</li>
	<li>
	    <p style="font-weight: bold;">Generate Visualizations</p>
		<p>By clicking on the 'Retreive Barcodes' link above you will be able
		to generate pie charts showing which packages contribute to the most
		amount of revenue as given by the records in the respective tables.
		This module is available only for 'packages' and 'sources'.
		</p>
	</li>
	<li>
	    <p style="font-weight: bold;">Search</p>
		<p>Add any number of filters to your search and query the 'Intial Sample'
			table and retreive the associated data as well.
		</p>
	</li>
	<li>
	    <p style="font-weight: bold;">Retreive Barcodes</p>
		<p>By clicking on the 'Retreive Barcodes' link above you will be able
		to generate a table which contains the barcodes of those samples that are yet
		to be sent/delivered for DNA Extraction and Genotyping QC.
		</p>
	</li>
	</ul>
    </div>
</div>

    <!-- <script type="text/javascript">
        $(document).ready(function(){
        $('#navigation a, #fixedbar a').on('click', function(e) {
            e.preventDefault();
        });

        $(window).on('scroll',function() {
        var scrolltop = $(this).scrollTop();

        if(s
		crolltop >= 215) {
  </div>            $('#fixedbar').fadeIn(250);
    } else if (scrolltop <= 210) {
            $('#fixedbar').fadeOut(250);
        }
        });
        });
    </script> -->
</body>
</html>
