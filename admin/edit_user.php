<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>

	<!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<?php 
		//Validation
		$name = $address = $email = $password = $cpassword = $account_type = "";
		$nameErr = $addressErr = $emailErr = $passwordErr = $cpasswordErr = $account_typeErr = "";

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["name"]))
			{
				$nameErr = "Name is required.";
			}
			else
			{
				$name = $_POST["name"];
			}		
		}

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["address"]))
			{
				$addressErr = "Address is required.";
			}
			else
			{
				$address = $_POST["address"];
			}		
		}

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["email"]))
			{
				$emailErr = "Email is required.";
			}
			else
			{
				$email = $_POST["email"];
			}		
		}
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["password"]))
			{
				$passwordErr = "Password is required.";
			}
			else
			{
				$password = $_POST["password"];
			}		
		}
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["cpassword"]))
			{
				$cpasswordErr = "Password confirmation is required.";
			}
			else
			{
				$cpassword = $_POST["cpassword"];
			}		
		}
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["account_type"]))
			{
				$account_typeErr = "Please select an account type.";
			}
			else
			{
				$account_type = $_POST["account_type"];
			}		
		}

	?>

	<?php
		include("connections.php");
		
		$user_id = $_REQUEST["id"];

		$retrieve_record = "SELECT * FROM mytbl WHERE id = $user_id";
		$get_record = mysqli_query($connections, $retrieve_record);

		while($row_edit = mysqli_fetch_assoc($get_record))
		{
			$db_name = $row_edit["name"];
			$db_address = $row_edit["address"];
			$db_email = $row_edit["email"];
			$db_password = $row_edit["password"];
			$db_account_type = $row_edit["account_type"];
		}
	?>

	<form method="POST" action="update.php">
		<div class="row">
	    <form class="col s9">
	      <div class="row">
	        <div class="input-field col s6">
	          <input name="new_name" type="text" class="validate" value="<?php echo $db_name ?>">
	          <label class="active" for="name">Name</label>
	          <span class="error"><?php echo $nameErr; ?></span>
	        </div>
	        <div class="input-field col s6">
	          <input name="new_address" type="text" class="validate" value="<?php echo $db_address ?>">
	          <label class="active" for="address">Address</label>
	          <span class="error"><?php echo $addressErr; ?></span>
	        </div>
	        <div class="input-field col s6">
	          <input name="new_email" type="text" class="validate" value="<?php echo $db_email ?>">
	          <label class="active" for="email">Email</label>
	          <span class="error"><?php echo $emailErr; ?></span>
	        </div>
	       	<div class="input-field col s6">
	          <input name="new_password" type="password" class="validate" value="<?php echo $db_password ?>">
	          <label class="active" for="password">Password</label>
	          <span class="error"><?php echo $passwordErr; ?></span>
	        </div>
	        <div class="input-field col s6">
	          <input name="new_cpassword" type="password" class="validate" value="<?php echo $db_password ?>">
	          <label class="active" for="cpassword">Confirm Password</label>
	          <span class="error"><?php echo $cpasswordErr; ?></span>
	        </div>
					<div class="input-field col s6">
				    <select name="new_account_type">
				      <option value="" disabled selected>Choose your option</option>
				      <option value="<?php echo $db_account_type ?>"></option>
				      <option value="staff">staff</option>
				      <option value="customer">customer</option>
				    </select>
				    <label>Account Type:</label>
				    <span class="error"><?php echo $account_typeErr; ?></span>
				  </div>
	      </div>
	      <div>
	      	<button class="btn waves-effect waves-light" type="submit" name="action" style="margin: 20px !important">Submit</button>
	      </div>
	    </form>
	  </div>
	</form>
</body>
</html>



