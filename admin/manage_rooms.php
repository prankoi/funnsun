<?php 
	session_start();

	if(!isset($_SESSION["staffID"]))
	{
		header("Location: ../accessdenied.html");
		die();
	}

  $user_id = $_SESSION["staffID"];

	include("connections.php");

	$room_type_id = $_REQUEST["id"];

	$retrieve_room_type = "SELECT * FROM room_type WHERE roomTypeID = $room_type_id";
	$view_room_type = mysqli_query($connections, $retrieve_room_type);

	$row_type = mysqli_fetch_assoc($view_room_type);
	$room_type_name = $row_type["roomTypeName"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Rooms</title>
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
				<a class="breadcrumb small-font" href="rooms.php">ROOM TYPE INFORMATION</a>
        <a class="breadcrumb small-font" href="#!.php"><?php echo "$room_type_name"; ?></a>
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

  <!---View Records-->
	<div class="container" style="width: 90%;">
		<table class="highlight">
			<thead>
				<tr>
					<td>Room Name</td>
					<td>Status</td>
					<td>Occupants</td>
					<td>Room Type</td>
					<td>Operations</td>
				</tr>
			</thead>

			<?php

				include("connections.php");

				$room_type_id = $_REQUEST["id"];

				$retrieve_room_type = "SELECT * FROM room_type WHERE roomTypeID = $room_type_id";
				$view_room_type = mysqli_query($connections, $retrieve_room_type);

				$row_type = mysqli_fetch_assoc($view_room_type);
				$room_type_name = $row_type["roomTypeName"];


				$retrieve_room = "SELECT * FROM room WHERE roomTypeID = $room_type_id";
				$view_room = mysqli_query($connections, $retrieve_room);

				while($row_name = mysqli_fetch_assoc($view_room))
				{
					$room_name = $row_name["roomName"];
					$room_status = $row_name["roomStatus"];

					echo "<tbody>
									<tr>
										<td>$room_name</td>
										<td>$room_status</td>
										<td></td>
										<td>$room_type_name</td>
										<td>
											<a class='waves-effect waves-light cyan darken-4 btn tooltipped modal-trigger' data-position='top' data-delay='0' data-tooltip='Edit Room' href='#!'><i class='material-icons'>edit</i></a>
											<a class='waves-effect waves-light red btn tooltipped' data-position='top' data-delay='0' data-tooltip='Delete Room' href='#!'><i class='material-icons'>delete_forever</i></a>
										</td>
									</tr>
								</tbody>";
				}
			?>
		</table>
	</div>

	<!--Add Room Button-->
  <div class="fixed-action-btn tooltipped" data-position="left" data-delay="0" data-tooltip="Add Room">
    <a class="btn-floating btn-large red modal-trigger" href="#add_room">
      <i class="large material-icons">add</i>
    </a>
  </div>

	<!--Add Room Form-->
  <div id='add_room' class='modal' style='width: 350px !important;'>
    <div class='modal-content'>
			
    </div>
    <div class='modal-footer'>

    </div>
  </div>
</body>
</html>