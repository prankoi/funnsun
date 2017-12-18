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

	<!--JQuery Initialization-->
  <script>
    $(document).ready(function(){
    	// the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    	$('.modal').modal();
    	$('.dropdown-button').dropdown();
    	$('.carousel').carousel();
    	$('.carousel.carousel-slider').carousel({fullWidth: true});
    	$(".button-collapse").sideNav();
  	});
  </script>

  <!--Validation-->
	<?php

		function openLogin(){
			echo "<script>
				$(document).ready(function(){
					$('#login').modal('open');
				});
			</script>";
		}

		function logging(){
			echo "<script>
				$(document).ready(function(){
					$('#animation').modal('open');
				});
			</script>";
		}

		function loggingClose(){
			echo "<script>
				$(document).ready(function(){
					$('#animation').modal('close');
				});
			</script>";
		}

		$username = $password = "";
		$username_error = $password_error = "";


		//Log-In Validation
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["username"]))
			{
				$username_error = "Username is required.";
				openLogin();
			}
			else
			{
				$username = $_POST["username"];
			}		
		}

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["password"]))
			{
				$password_error = "Password is required.";
				openLogin();
			}
			else
			{
				$password = $_POST["password"];
			}		
		}


		if($username && $password)
		{
			include("connections.php");

			$check = "SELECT * FROM customer WHERE custUserName ='$username'";
			$check_customer = mysqli_query($connections, $check);
			$check_customer_row = mysqli_num_rows($check_customer);			

			if($check_customer_row > 0)
			{
				while($row = mysqli_fetch_assoc($check_customer))
				{
					$user_id = $row["custID"];
					$db_password = $row["custPassword"];
					$db_account_type = $row["accountType"];

					if($password == $db_password)
					{

						session_start();

						$_SESSION["custID"] = $user_id;
			
						logging();
						echo "<script>
										setTimeout(function () {
 											window.location.href='user/index.php';}, 5000);
 									</script>";
					}
					else
					{
						$password_error = "Password is incorrect.";
						openLogin();
						loggingClose();
					}
				}
			}

			else
			{
				$check = "SELECT * FROM staff WHERE staffUserName ='$username'";
				$check_staff = mysqli_query($connections, $check);
				$check_staff_row = mysqli_num_rows($check_staff);			

				if($check_staff_row > 0)
				{
					while($row = mysqli_fetch_assoc($check_staff))
					{
						$user_id = $row["staffID"];
						$db_password = $row["staffPassword"];
						$db_account_type = $row["accountType"];

						if($password == $db_password)
						{

							session_start();

							$_SESSION["staffID"] = $user_id;

							if($db_account_type == "admin")
							{
								logging();
								echo "<script>
												setTimeout(function () {
		 											window.location.href='admin/index.php';}, 5000);
		 									</script>";
							}

							elseif($db_account_type == "receptionist")
							{
								logging();
								echo "<script>
												setTimeout(function () {
		 											window.location.href='recept/index.php';}, 5000);
		 									</script>";
							}
							else
							{
								logging();
								echo "<script>
												setTimeout(function () {
		 											window.location.href='res_officer/index.php';}, 5000);
		 									</script>";
							}

						}
						else
						{
							$password_error = "Password is incorrect.";
							openLogin();
							loggingClose();
						}
					}
				}

				else
				{
					$username_error = "Invalid username.";
					openLogin();
					loggingClose();
				}
			}
		}
	?> 


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
				<li><a href="reserve.php">Reservation</a></li>
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

	<!--Carousel-->
  <div class="carousel carousel-slider center" data-indicators="true">
    <div class="carousel-item red white-text" href="#one!">
      <h2>First Panel</h2>
      <p class="white-text">This is your first panel</p>
    </div>
    <div class="carousel-item amber white-text" href="#two!">
      <h2>Second Panel</h2>
      <p class="white-text">This is your second panel</p>
    </div>
    <div class="carousel-item green white-text" href="#three!">
      <h2>Third Panel</h2>
      <p class="white-text">This is your third panel</p>
    </div>
    <div class="carousel-item blue white-text" href="#four!">
      <h2>Fourth Panel</h2>
      <p class="white-text">This is your fourth panel</p>
    </div>
  </div>

	<!--Log-In Form-->
	<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	  <div id="login" class="modal" style="width: 350px !important;">
	    <div class="modal-content">
	    	<h4>Sign-in</h4>
	    	<h6>with your FunNSun Account.</h6><br><br>
	    	<div class="input-field">
			    <input name="username" type="text" class="validate" value="<?php echo $username; ?>">
			    <label class="active" for="username">Username</label>
			    <span class="error"><?php echo $username_error; ?></span><br>
			  </div>
		  	<div class="input-field">
		    	<input name="password" type="password" class="validate">
		    	<label class="active" for="password">Password</label>
		    	<span class="error"><?php echo $password_error; ?></span><br>
		    </div>
		    <div style="font-size: 12px !important;">
		    	No account? Sign up <a class="blue-text text-darken-4 modal-trigger" href="register.php">here.</button>
		    </div>
	    </div>
	    <div class="modal-footer">
	      <button class="btn waves-effect waves-light modal-action modal-close" type="submit" name="action">Log-In</button>
	    </div>
	  </div>
	</form>

	<div id="animation" class="modal center-align" style="width: 130px !important">
		<div class="modal-content">
			<div class="preloader-wrapper active">
		    <div class="spinner-layer spinner-blue">
		      <div class="circle-clipper left">
		        <div class="circle"></div>
		      </div><div class="gap-patch">
		        <div class="circle"></div>
		      </div><div class="circle-clipper right">
		        <div class="circle"></div>
		      </div>
		    </div>
		   	<div class="spinner-layer spinner-red">
		      <div class="circle-clipper left">
		        <div class="circle"></div>
		      </div><div class="gap-patch">
		        <div class="circle"></div>
		      </div><div class="circle-clipper right">
		        <div class="circle"></div>
		      </div>
		    </div>
		   	<div class="spinner-layer spinner-yellow">
		      <div class="circle-clipper left">
		        <div class="circle"></div>
		      </div><div class="gap-patch">
		        <div class="circle"></div>
		      </div><div class="circle-clipper right">
		        <div class="circle"></div>
		      </div>
		    </div>
		   	<div class="spinner-layer spinner-green">
		      <div class="circle-clipper left">
		        <div class="circle"></div>
		      </div><div class="gap-patch">
		        <div class="circle"></div>
		      </div><div class="circle-clipper right">
		        <div class="circle"></div>
		      </div>
		    </div>
			</div>
			<div class="modal-footer">
				<p class="center">Logging In</p>
		  </div>
		</div>
	</div>
</body>
</html>