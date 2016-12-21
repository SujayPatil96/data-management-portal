<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Admin Panel</title>
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
        <li><a href="retreive_barcodes.php">Retreive Barcodes</a></li>
      </ul>
    </nav>

    <div id="content">
    <h1>Content</h1>

    <p>No content posted yet.</p>
    </div>
  </div>

    <!-- <script type="text/javascript">
        $(document).ready(function(){
        $('#navigation a, #fixedbar a').on('click', function(e) {
            e.preventDefault();
        });

        $(window).on('scroll',function() {
        var scrolltop = $(this).scrollTop();

        if(scrolltop >= 215) {
            $('#fixedbar').fadeIn(250);
        } else if (scrolltop <= 210) {
            $('#fixedbar').fadeOut(250);
        }
        });
        });
    </script> -->
</body>
</html>
