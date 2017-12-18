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
	<title>
		
	</title>
	<!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import Icons-->
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
    	  // Initialize collapse button
  		$(".button-collapse").sideNav();
  		// Initialize collapsible (uncomment the line below if you use the dropdown variation)
  		$('.collapsible').collapsible();

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

  <!--Admin Navigation Bar-->
	<nav>
		<div class="nav-wrapper black">
			<ul class="right hide-on-med-and-down">
				<li><a class="tooltipped" data-position="left" data-delay="0" data-tooltip="Logout" href="logout.php"><i class="material-icons">power_settings_new</i></a></li>
			</ul>
		</div>
	</nav>
	
	<!--CUstomer Info Heading-->
	<nav style="height: 30px; line-height:  30px;">
		<div class="nav-wrapper cyan darken-4">
			<ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="#!">CUSTOMER ACCOUNT INFORMATION</a></li>
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

	<!--View Records-->
	<div class="container" style="width: 90%;">
		<table class="highlight">
			<thead>
				<tr>
					<td>Name</td>
					<td>Address</td>
					<td>Username</td>
					<td>Email</td>
					<td>Password</td>
					<td>Operations</td>
				</tr>
			</thead>

			<?php

				include("connections.php");

				$retrieve = "SELECT * FROM customer";
				$view_query = mysqli_query($connections, $retrieve);

				while($row = mysqli_fetch_assoc($view_query))
				{
					$user_id = $row["custID"];
					$db_first_name = $row["custFirstName"];
					$db_middle_name = $row["custMiddleName"];
					$db_last_name = $row["custLastName"];
					$db_address = $row["custAddress"];
					$db_contact = $row["custContact"];
					$db_username = $row["custUserName"];
					$db_email = $row["custEmail"];
					$db_password = $row["custPassword"];

					echo "<tbody>
									<tr>
										<td>$db_first_name $db_middle_name $db_last_name</td>
										<td>$db_address</td>
										<td>$db_username</td>
										<td>$db_email</td>
										<td>$db_password</td>
										<td>
											<a class='waves-effect waves-light cyan darken-4 btn' href='edit_user.php?id=$user_id'><i class='material-icons'>edit</i></a>
											<a class='waves-effect waves-light red btn' href=''><i class='material-icons'>delete_forever</i></a>
										</td>
									</tr>
								</tbody>";
				}
			?>
		</table>
	</div>

<!--Add Customer Button-->
  <div class="fixed-action-btn tooltipped" data-position="left" data-delay="0" data-tooltip="Add Record">
    <a class="btn-floating btn-large red" href="add_customer.php">
      <i class="large material-icons">add</i>
    </a>
  </div>

</body>
</html>