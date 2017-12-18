<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="ui/css/materialize.min.css"  media="screen,projection"/>
  <!--My CSS-->
  <link type="text/css" rel="stylesheet" href="ui/css/mycss.css"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="ui/js/materialize.min.js"></script>
  
	<?php 
		session_start();

		unset($_SESSION["staffID"]);
		session_unset();
		session_destroy();
		header("Location: ../index.php")
	?>
</body>
</html>