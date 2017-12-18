<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
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


	<script>
		$( document ).ready(function() {
			$('select').material_select();
			$('.modal').modal();
		});
	</script>
	
	<?php 
		function success()
		{
			echo "<script>
							$( document ).ready(function() {
								$('#animation').modal('open');
							});							
						</script>";
		}
	?>
	<!--Home Navigation Bar-->
	<nav>
		<div class="nav-wrapper cyan darken-4">
			<a href="#" class="brand-logo left"></a>
			<a href="#" data-activates="slide-menu" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="index.php">Home</a></li>
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




	<!--PHP Validation-->
	<?php 

		$first_name = $middle_name = $last_name = $address = $contact = $username = $new_email = $new_password = $cpassword = "";
		$first_name_error = $middle_name_error = $last_name_error = $address_error = $contact_error = $username_error = $new_email_error = $new_password_error = $cpassword_error = "";

//Registration Validation
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["first_name"]))
			{
				$first_name_error = "First name is required.";
			}
			else
			{
				$first_name = $_POST["first_name"];
			}		
		}

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["middle_name"]))
			{
				$middle_name_error = "Middle name is required.";
			}
			else
			{
				$middle_name = $_POST["middle_name"];
			}		
		}

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["last_name"]))
			{
				$last_name_error = "Last name is required.";
			}
			else
			{
				$last_name = $_POST["last_name"];
			}		
		}

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["address"]))
			{
				$address_error = "Address is required.";
			}
			else
			{
				$address = $_POST["address"];
			}		
		}

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["contact"]))
			{
				$contact_error = "Contact is required.";
			}
			else
			{
				$contact = $_POST["contact"];
			}		
		}

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["username"]))
			{
				$username_error = "Username is required.";
			}
			else
			{
				$username = $_POST["username"];
			}		
		}


		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["new_email"]))
			{
				$new_email_error = "Email is required.";
			}
			else
			{
				$new_email = $_POST["new_email"];
			}		
		}

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["new_password"]))
			{
				$new_password_error = "Password is required.";
			}
			else
			{
				$new_password = $_POST["new_password"];
			}		
		}
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["cpassword"]))
			{
				$cpassword_error = "Please confirm password.";
			}
			else
			{
				$cpassword = $_POST["cpassword"];
				if ($new_password != $cpassword)
				{
					$cpassword = "";
					$new_password_error = "Passwords do not match.";
					$cpassword_error = "Passwords do not match.";
				}
			}
		}

		if($first_name && $middle_name && $last_name && $address && $contact && $username && $new_email && $new_password && $cpassword)
		{
			include("connections.php");

			$check_email = "SELECT * FROM customer WHERE custEmail ='$new_email'";
			$check_username = "SELECT * FROM customer WHERE custUserName = '$username'";

			$check_new_email = mysqli_query($connections, $check_email);
			$check_new_username = mysqli_query($connections, $check_username);

			$check_new_email_row = mysqli_num_rows($check_new_email);	
			$check_new_username_row = mysqli_num_rows($check_new_username);

			if($check_new_email_row > 0 and $check_new_username_row > 0)
			{
				$username_error = "Username is already taken.";
				$new_email_error = "Email is associated with another account.";
			}

			elseif($check_new_username_row > 0)
			{
				$username_error = "Username is already taken.";
			}
			elseif($check_new_email_row > 0)
			{
				$new_email_error = "Email is already registered.";
			}
			else
			{
				$account_type = "customer";
				$insert = "INSERT INTO customer (custFirstName, custMiddleName, custLastName, custAddress, custContact, custUserName, custEmail, custPassword, accountType) VALUES ('$first_name', '$middle_name','$last_name', '$address', '$contact', '$username', '$new_email', '$new_password', '$account_type')";
				$add_customer = mysqli_query($connections, $insert);

				success();
				echo "<script>
								setTimeout(function () {
									window.location.href='index.php';}, 5000);
								</script>";
			}	
		}
	?>

	<!--Registration Form-->
	<form id="regform" method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="container" style="width: 50% !important;">
		<div class="row">
			<div class="row">
				<nav style="height: 30px; line-height:  30px;">
					<div class="nav-wrapper pink darken-4">
						<ul id="nav-mobile" class="left hide-on-med-and-down">
			        <li><a href="#!">CUSTOMER REGISTRATION</a></li>
			      </ul>
					</div>
				</nav>
			</div>
		</div>
		<div class="row">
	  	<div class="input-field col s8">
		    <input name="first_name" type="text" class="validate" value="<?php echo $first_name; ?>">
		    <label class="active" for="first_name">First Name</label>
		    <span class="error"><?php echo $first_name_error; ?></span><br>
		  </div>
	  	<div class="input-field col s4">
	    	<input name="username" type="text" class="validate" value="<?php echo $username; ?>">
	    	<label class="active" for="username">Username</label>
	    	<span class="error"><?php echo $username_error; ?></span><br>
	    </div>
		</div>
		<div class="row">
	  	<div class="input-field col s8">
		    <input name="middle_name" type="text" class="validate" value="<?php echo $middle_name; ?>">
		    <label class="active" for="middle_name">Middle Name</label>
		    <span class="error"><?php echo $middle_name_error; ?></span><br>
		  </div>
	  	<div class="input-field col s4">
	    	<input name="new_email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" class="validate" value="<?php echo $new_email; ?>">
	    	<label class="active" for="new_email">Email</label>
	    	<span class="error"><?php echo $new_email_error; ?></span><br>
	    </div>
		</div>
		<div class="row">
	  	<div class="input-field col s8">
		    <input name="last_name" type="text" class="validate" value="<?php echo $last_name; ?>">
		    <label class="active" for="last_name">Last Name</label>
		    <span class="error"><?php echo $last_name_error; ?></span><br>
		  </div>
	  	<div class="input-field col s4">
	    	<input name="new_password" type="password" class="validate" value="<?php echo $new_password; ?>">
	    	<label class="active" for="new_password">Password</label>
	    	<span class="error"><?php echo $new_password_error; ?></span><br>
	    </div>
		</div>
		<div class="row">
	  	<div class="input-field col s8">
		    <input name="address" type="text" class="validate" value="<?php echo $address; ?>">
		    <label class="active" for="address">Address</label>
		    <span class="error"><?php echo $address_error; ?></span><br>
		  </div>
	  	<div class="input-field col s4">
	    	<input name="cpassword" type="password" class="validate" value="<?php echo $cpassword; ?>">
	    	<label class="active" for="cpassword">Confirm Password</label>
	    	<span class="error"><?php echo $cpassword_error; ?></span><br>
	    </div>
	  </div>
		<div class="row">
	  	<div class="input-field col s4">
		    <input name="contact" type="number" class="validate" value="<?php echo $contact; ?>">
		    <label class="active" for="contact">Contact</label>
		    <span class="error"><?php echo $contact_error; ?></span><br>
		  </div>
	  </div>
		<div class="row right">
			<div class="col">
				<button class="btn waves-effect waves-light black modal-trigger" type="submit" name="register" href="regsuccess.php">Register</button>
			</div>
		</div>
	</form>

	<!--Success Message-->
	<div id="animation" class="modal center-align" style="width: 140px !important">
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
				<p class="center">
					Registered.<br>
					Redirecting...
				</p>
		  </div>
		</div>
	</div>
</body>
</html>