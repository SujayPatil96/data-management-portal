<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Trigger Mail</title>
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
    #body {
        height: 200px;
    }
  </style>

    <form action="send_mail_confirm.php" method="post">
      <h1>To send a mail, click below!</h1>

      <label for="username">Please enter the sender's email address here:</label>
      <input type="text" id="username" name="username" />

      <label for="recepient">Please enter the recepient's email address here:</label>
      <input type="text" id="recepient" name="recepient" />

      <label for="subject">Please enter the subject of the mail here:</label>
      <input type="text" id="subject" name="subject" />

      <label for="body">Please enter the body of the mail here:</label>
      <textarea id="body" name="body"></textarea>

      <label for="password">Please enter your password here:</label>
      <input type="password" id="password" name="password" />

      <button type="submit" name="submit" id="submit">Submit</button>
    </form>

  </body>
</html>
