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

        // Grab all the data coming after form submission
        $sample_number = $_POST["sample_number"];
        $barcode = $_POST["barcode"];
        $f260_230 = $_POST["f260_230"];
        $f260_280 = $_POST["f260_280"];
        $concentration = $_POST["conc"];
        $dos = $_POST["dos"];
        $doqc = $_POST["doqc"];


    // 3. Close connection to the database
	if (isset($connection)) { mysqli_close($connection); }
?>
