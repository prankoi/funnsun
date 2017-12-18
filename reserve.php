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
  <!--Home Navigation Bar-->
	<nav>
		<div class="nav-wrapper cyan darken-4">
			<a href="#" class="brand-logo left"></a>
			<a href="#" data-activates="slide-menu" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="">Home</a></li>
				<li><a class="modal-trigger" href="#login">Log-In</a></li>
				<li><a>Rooms</a></li>
				<li><a href="">Events</a></li>
				<li><a href="">Reservation</a></li>
				<li><a href="">Promos</a></li>
				<li><a href="">Contact Us</a></li>
			</ul>
			<ul class="side-nav grey darken-3" id="slide-menu">
				<li><a class="yellow-text text-accent-4" href="">Home</a></li>
				<li><a class="modal-trigger yellow-text text-accent-4" href="#login">Log-In</a></li>
				<li><a class=" yellow-text text-accent-4">Rooms</a></li>
				<li><a class=" yellow-text text-accent-4" href="">Events</a></li>
				<li><a class=" yellow-text text-accent-4" href="">Reservation</a></li>
				<li><a class=" yellow-text text-accent-4" href="">Promos</a></li>
				<li><a class=" yellow-text text-accent-4" href="">Contact Us</a></li>
			</ul>
		</div>
	</nav>

</body>
</html>