<?php 
	session_start();

	if(!isset($_SESSION["staffID"]))
	{
		header("Location: ../accessdenied.html");
		die();
	}

  $user_id = $_SESSION["staffID"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Room Types</title>
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
  <?php 
  	function logging_close(){
			echo "<script>
				$(document).ready(function(){
					$('#logout').modal('open');
				});
			</script>";

    include("connections.php");


		}
  ?>

  <style type="text/css">
    body {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      body {
        padding-left: 0;
      }
    }

    .small-font {
    	font-size: 15px !important;
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

	<!--Room Info Heading-->
	<nav style="height: 30px; line-height:  30px;">
		<div class="nav-wrapper blue darken-4">
			<div style="padding-left: 15px !important;">
				<a class="breadcrumb small-font" href="#!">ROOM TYPE INFORMATION</a>
			</div>
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
					<td>Room Type</td>
					<td>Availability</td>
					<td>Capacity</td>
					<td>Description</td>
					<td>Price</td>
					<td>Operations</td>
				</tr>
			</thead>

			<?php

				include("connections.php");

				$retrieve = "SELECT * FROM room_type";
				$view_query = mysqli_query($connections, $retrieve);

				while($row = mysqli_fetch_assoc($view_query))
				{
					$room_type_id = $row["roomTypeID"];
					$room_type_name = $row["roomTypeName"];
					$room_type_capacity = $row["roomTypeCapacity"];
					$room_type_desc = $row["roomTypeDesc"];
					$room_type_price = $row["roomTypePrice"];

					echo "<tbody>
									<tr>
										<td>$room_type_name</td>
										<td></td>
										<td>$room_type_capacity</td>
										<td>$room_type_desc</td>
										<td>$room_type_price</td>
										<td>
											<a class='waves-effect waves-light cyan darken-4 btn tooltipped modal-trigger' data-position='top' data-delay='0' data-tooltip='Edit Room Type' href='#$room_type_id'><i class='material-icons'>edit</i></a>
											<a class='waves-effect waves-light red btn tooltipped' data-position='top' data-delay='0' data-tooltip='Delete Room Type' href=''><i class='material-icons'>delete_forever</i></a>
											<a class='waves-effect waves-light green btn tooltipped' data-position='top' data-delay='0' data-tooltip='View Rooms' href='manage_rooms.php?id=$room_type_id'><i class='material-icons'>visibility</i></a>
											
											<!--Edit Rooms-->
										  <div id='$room_type_id' class='modal' style='width: 350px !important;'>
										    <div class='modal-content'>
													$room_type_id
										    </div>
										    <div class='modal-footer'>

										    </div>
										  </div>
										</td>
									</tr>
								</tbody>";
				}
			?>
		</table>
	</div>
</body>
</html>