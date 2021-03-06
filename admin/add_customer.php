<?php 
	session_start();

	if(!isset($_SESSION["staffID"]))
	{
		header("Location: ../accessdenied.html");
		die();
	}
?>
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
	<!--Sweet Alert-->
  <script src="swal/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="swal/dist/sweetalert2.css"/>

	<!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="ui/js/materialize.min.js"></script>

	<!--JQueries-->
  <script>
    $(document).ready(function(){
    	// the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    	$('.modal').modal();
    	$('.dropdown-button').dropdown();
    	$('select').material_select();
  	});
  </script>

	  <style type="text/css">
    body {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      body {
        padding-left: 0;
      }
    }
  </style>

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

  <!--Admin Navigation Bar-->
	<nav>
		<div class="nav-wrapper black">
			<ul class="right hide-on-med-and-down">
				<li><a class="tooltipped" data-position="left" data-delay="0" data-tooltip="Logout" href="logout.php"><i class="material-icons">power_settings_new</i></a></li>
			</ul>
		</div>
	</nav>
	
	<!--Admin Side Navbar-->
	<ul class="side-nav fixed">
    <li><div class="user-view">
      <div class="background">
        <img src="img/adminwall.jpg">
      </div>
      <a href="#!user"><img class="circle" src="img/admin_icon.png"></a>
      <a href="#!name"><span class="white-text name">admin</span></a>
      <a href="#!email"><span class="white-text email"></span></a>
    </div></li>
  <!--Sidenav Links-->
    <li>
      <ul class="collapsible collapsible-accordion">
        <li>
          <a class="collapsible-header" href="index.php">Home<i class="material-icons">home</i></a>
        </li>
      </ul>
    </li>
    <li>
      <ul class="collapsible collapsible-accordion">
        <li>
          <a class="collapsible-header">Accounts<i class="material-icons">people</i></a>
          <div class="collapsible-body">
            <ul>
              <li><a href="customer.php">Customer</a></li>
              <li><a href="staff.php">Staff</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <li>
      <ul class="collapsible collapsible-accordion">
        <li>
          <a class="collapsible-header" href="index.php">Rooms<i class="material-icons">room</i></a>
        </li>
      </ul>
    </li>
    <li>
      <ul class="collapsible collapsible-accordion">
        <li>
          <a class="collapsible-header" href="index.php">Events<i class="material-icons">event</i></a>
        </li>
      </ul>
    </li>
    <li><div class="divider"></div></li>
    <li>
      <ul class="collapsible collapsible-accordion">
        <li>
          <a class="collapsible-header" href="index.php">Reservation<i class="material-icons">list</i></a>
        </li>
      </ul>
    </li>
    <li>
      <ul class="collapsible collapsible-accordion">
        <li>
          <a class="collapsible-header" href="index.php">Reports<i class="material-icons">description</i></a>
        </li>
      </ul>
    </li>
  </ul>

	<!--CUstomer Reg Heading-->
	<nav style="height: 30px; line-height:  30px;">
		<div class="nav-wrapper cyan darken-4">
			<ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="#!">CUSTOMER REGISTRATION</a></li>
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
					$new_password = "";
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
                  window.location.href='customer.php';}, 5000);
                </script>";

			}	
		}
	?>

	<!--Registration Form-->
	<form id="regform" method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="container" style="width: 90% !important;">
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
				<button class="btn waves-effect waves-light black modal-trigger" type="submit" name="register">Register</button>
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