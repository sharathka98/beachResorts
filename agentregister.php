<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Agent Register</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<link rel="stylesheet" href="css/registerstyle.css" type="text/css">
	<style>
	.button {
    background-color:#009970;
	width:100px;
    border: none;
    color: white;
    padding: 8px 6px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
	</style>
	
</head>
<body>
	<div id="background">
		<div id="page">
			<div id="header">
				<div id="logo">
					<a href="index.html"><img src="travellogo.jpg" alt="LOGO" height="112" width="118"></a>
				</div>
				<div id="navigation">
					<ul>
						<li class="selected">
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="about.php">About</a>
						</li>
						<li>
							<div class="dropdown" >
								<button class="dropbtn">Register</button>
								<div class="dropdown-content">
								<a href="customerregister.php" >Customer</a>
								<a href="agentregister.php">Travel Agency</a>
								</div>
							</div>
						</li>
						<li>
							<a href="login.php">Login</a>
						</li>
						
					</ul>
				</div>
			</div>
			<!-- php code begins -->
			<?php
			// define variables and set to empty values
			//$agencynameErr = $agentnameErr = $emailErr1 =$emailErr2= $usernameErr = $passwordErr = $phoneErr1=$phoneErr2=$pincodeErr="";
			$agencyname = $email = $username = $password = $phone = $address = "";
			$errors = array();
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				if (empty($_POST["agencyname"])) {
				$error['agencynameErr'] = "Name is required";
			  } else {
				$agencyname = test_input($_POST["agencyname"]);
				// check if name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$agencyname)) {
				  $error['agencynameErr'] = "Only letters and white spaces are allowed";
				}
			  }
	
			  if (empty($_POST["ARusername"])) {
				$error['usernameErr'] = "Username is required";
			  } else {
				$username = test_input($_POST["ARusername"]);
				if(strlen($username)<6 || strlen($username) >12)
				$error['usernameErr'] = "Username should contain 6 to 12 characters";
				if(!preg_match("/^[a-zA-Z0-9_]*$/",$username))
				$error['usernameErr'] = "username should be alphanumeric,underscore";
				}
			  
			  if (empty($_POST["ARpassword"])) {
				$error['passwordErr'] = "Password is required";
			  } else {
				$password = test_input($_POST["ARpassword"]);
				// check if e-mail address is well-formed
				if (strlen($password)<6 || strlen($password) >12) {
				  $error['passwordErr'] = "Passwordshould contain 6 to 12 characters";
				}
				if(!preg_match("/^[A-Za-z0-9_!\"#$%&'()*+,\-.\\:\/;=?@^_]+$/" ,$password))
					$error['passwordErr'] = "Password not valid";
				
			  }
			  if (empty($_POST["ARemail"])) {
				$error['emailErr1'] = "Email is required";
			  } else {
				$email = test_input($_POST["ARemail"]);
				// check if e-mail address is well-formed
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				  $error['emailErr1'] = "Invalid email format";
				}
			  }
					
			  
			  if (empty($_POST["ARphone"])) {
				$error['phoneErr1'] = "Phone number is required";
			  } else {
				$phone = test_input($_POST["ARphone"]);
				// check if e-mail address is well-formed
				if(!preg_match("/^\w{10}$/",$phone1))
				$error['phoneErr1'] = "Enter valid phone number";
				
			  }
			  
			if (empty($_POST["ARaddress"])) {
				$error['addressErr']="address is required";
			} else {
              $address=test_input($_POST["ARaddress"]);
			}			  
			} 
   
			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			/*check if submit button is pressed to prevent empty records being inserted */
			if(isset($_POST["submit"]))
			{
				$conn=mysqli_connect("localhost","root","","traveldb");
				
				if(mysqli_connect_errno())
				
					echo "Failed to connect<br/>";
				
				else
					echo "Successfully connected<br/>";
				
				
				if(!$errors)    /*if no errors only then insert into database */
				{
					/*check if username already exists in database*/
					$user = "SELECT Username FROM travel_agency WHERE Username='$username'";
					$userresult=mysqli_query($conn,$user);
					$row_count = mysqli_num_rows($userresult);
					 
					/*if username already exists then do not insert into any tables*/
					if($row_count == 1)
					{
						$userexists = "username already exists";
					}
					else
					{
						/*insert into travel_agency table*/
						$sql="INSERT INTO travel_agency (Username,password,name,address,email,phone) VALUES ('$username','$password','$agencyname','$address','$email','$phone')";
						$result=mysqli_query($conn,$sql);
						if($result){
							echo "<br>inserted<br>";
						}
						
						
			    			
						//start the session by storing his Aid and username
						session_start();
						$_SESSION['Username']=$username;
						
						
						
						header("Location:agencyhome.php");  /*now go to agency's homepage */
					}
				}
			}
			?>
			<div id="contents">
				<div class="box">
					<div>
						<div id="register" class="body">
							<h1>Travel Agency Registration</h1>
							<br>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								<table>
									<tbody>
	   								<!--	<tr>
											<td><span class="error">* required fields </span></td>
											<td></td>
										</tr> -->
										<tr>
											<td>AGENCY NAME<b>:</b></td>
											<td><input type="text" name="agencyname"class="txtfield"> <span class="error"> 
											 <?php if(isset($errors['agencynameErr']))echo $errors['agencynameErr'];?></td>
										</tr>
									
										<tr>
											<td>USERNAME<b>:</b></td>
											<td><input type="text" name="ARusername" class="txtfield"> <span class="error">
											 <?php if(isset($errors['usernameErr'])) echo $errors['usernameErr'];?>
											<?php if(isset($userexists)) echo $userexists; ?></td>
										</tr>
										<tr>
											<td>PASSWORD<b>:</b></td>
											<td><input type="password" name="ARpassword" class="txtfield"> <span class="error">
											 <?php if(isset($errors['passwordErr']))echo $errors['passwordErr'];?></td>
										</tr>
										<tr>
											<td>ADDRESS<b>:</b></td>
											<td><input type="text" name="ARaddress" class="txtfield"> <span class="error">
											<?php if(isset($errors['addressErr'])) echo $errors['addressErr'];?> </td>

										</tr>
									
										
										<tr>
											<td>PHONE NUMBER<b>:</b></td>
											<td><input type="text" name="ARphone" class="txtfield" maxlength="10">   <?php if(isset($errors['phoneErr1'])) echo $errors['phoneErr1'];?></td>
										</tr>
										
										
										<tr>
											<td>EMAIL-ID<b>:</b></td>
											<td><input type="text" name="ARemail" class="txtfield">  <?php if(isset($errors['emailErr1'])) echo $errors['emailErr1'];?></td>
										</tr>  
										  
									    <tr>
											<td></td>
											<td><input type="submit" value="submit" name="submit" class="button"></td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</body>
</html>