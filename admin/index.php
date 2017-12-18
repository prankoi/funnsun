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
	<title></title>

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
  </style>

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
          <a class="collapsible-header" href="rooms.php">Rooms<i class="material-icons">room</i></a>
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

  <style type="text/css">
		.fixed-action-btn {
		  float: right;
		  position: relative;
		  left: 0px;
		  bottom: 0px;
		} 	 	
  </style>


	<!--Modules-->
  <div class="row">
    <div class="col s3">
      <div class="card">
        <div class="card-image">
          <img src="img/customer.jpg">
            <div class="fixed-action-btn horizontal click-to-toggle">
					    <a class="btn-floating halfway-fab btn-large red">
					      <i class="material-icons">menu</i>
					    </a>
					    <ul>
					      <li><a class="btn-floating green tooltipped" data-position="bottom" data-delay="0" data-tooltip="Manage Accounts" href="customer.php"><i class="material-icons">account_circle</i></a></li>
					      <li><a class="btn-floating blue tooltipped" data-position="bottom" data-delay="0" data-tooltip="Add Account" href="add_customer.php"><i class="material-icons">add</i></a></li>
					    </ul>
					  </div>
        </div>
        <div class="card-content">
        	<span class="card-title">Customer</span>
          <p></p>
        </div>
      </div>
    </div>
    <div class="col s3">
      <div class="card">
        <div class="card-image">
          <img src="img/staff.png">
            <div class="fixed-action-btn horizontal click-to-toggle">
					    <a class="btn-floating halfway-fab btn-large red">
					      <i class="material-icons">menu</i>
					    </a>
					    <ul>
					      <li><a class="btn-floating green tooltipped" data-position="bottom" data-delay="0" data-tooltip="Manage Accounts" href="staff.php"><i class="material-icons">account_circle</i></a></li>
					      <li><a class="btn-floating blue tooltipped" data-position="bottom" data-delay="0" data-tooltip="Add Account" href="add_staff.php"><i class="material-icons">add</i></a></li>
					    </ul>
					  </div>
        </div>
        <div class="card-content">
        	<span class="card-title">Staff</span>
          <p></p>
        </div>
      </div>
    </div>
    <div class="col s3">
      <div class="card">
        <div class="card-image">
          <img src="img/room.png">
            <div class="fixed-action-btn horizontal click-to-toggle">
					    <a class="btn-floating halfway-fab btn-large red">
					      <i class="material-icons">menu</i>
					    </a>
					    <ul>
					      <li><a class="btn-floating green tooltipped" data-position="bottom" data-delay="0" data-tooltip="View Accounts" href="customer.php"><i class="material-icons">account_circle</i></a></li>
					      <li><a class="btn-floating blue tooltipped" data-position="bottom" data-delay="0" data-tooltip="Add An Account"><i class="material-icons">add</i></a></li>
					    </ul>
					  </div>
        </div>
        <div class="card-content">
        	<span class="card-title">Rooms</span>
          <p></p>
        </div>
      </div>
    </div>
    <div class="col s3">
      <div class="card">
        <div class="card-image">
          <img src="img/event.png">
            <div class="fixed-action-btn horizontal click-to-toggle">
					    <a class="btn-floating halfway-fab btn-large red">
					      <i class="material-icons">menu</i>
					    </a>
					    <ul>
					      <li><a class="btn-floating green tooltipped" data-position="bottom" data-delay="0" data-tooltip="View Accounts" href="customer.php"><i class="material-icons">account_circle</i></a></li>
					      <li><a class="btn-floating blue tooltipped" data-position="bottom" data-delay="0" data-tooltip="Add An Account"><i class="material-icons">add</i></a></li>
					    </ul>
					  </div>
        </div>
        <div class="card-content">
        	<span class="card-title">Events</span>
          <p></p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>