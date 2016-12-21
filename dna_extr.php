<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>DNA Extraction Details</title>
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

  <body>

    <form action="dna_extr_entry.php" method="post">
      <h1>DNA Extraction Details</h1>
      <fieldset>
        <legend><span class="number">1</span>Enter DNA Extraction Details</legend>
        <label for="sample_number">Sample Number:</label>
        <input type="text" id="sample_number" name="sample_number">

        <label for="barcode">Barcode:</label>
        <input type="text" id="barcode" name="barcode">
        <select name="barcode" id="">
            <option value=""></option>
        </select>

        <label for="f260_230">260/230:</label>
        <input type="text" id="f260_230" name="f260_230">

        <label for="f260_280">260/280:</label>
        <input type="text" id="f260_280" name="f260_280" />

        <label for="conc">Concentration:</label>
        <input type="text" id="conc" name="conc" />

        <label for="datepicker">Date of QC:</label>
        <input type="text" id="datepicker" name="doqc" />
      </fieldset>

      <button type="submit" name="submit" id="submit">Submit</button>
    </form>

  </body>
</html>
