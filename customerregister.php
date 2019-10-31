<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Customer Register</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/registerstyle.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
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
			$name = $email= $username = $password = $phone = $address = "";
			$errors = array();

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			  if (empty($_POST["CRname"])) {
				$errors['nameErr'] = "Name is required";
			  } else {
				$name = test_input($_POST["CRname"]);
				// check if name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				  $errors['nameErr'] = "Only letters and white spaces are allowed";
				}
			  }
			  if (empty($_POST["CRusername"])) {
				$errors['usernameErr'] = "Username is required";
			  } else {
				$username = test_input($_POST["CRusername"]);
				if(strlen($username)<6 || strlen($username) >12)
				$errors['usernameErr'] = "Username should contain 6 to 12 characters";
				if(!preg_match("/^[a-zA-Z0-9_]*$/",$username))
				$errors['usernameErr']="username should be alphanumeric,underscore";
				}
			  
			  if (empty($_POST["CRpassword"])) {
				$errors['passwordErr'] = "Password is required";
			  } else {
				$password = test_input($_POST["CRpassword"]);
				if (strlen($password)<6 || strlen($password) >12) {
				  $errors['passwordErr']= "Passwordshould contain 6 to 12 characters";
				}
				if(!preg_match("/^[A-Za-z0-9_!\"#$%&'()*+,\-.\\:\/;=?@^_]+$/" ,$password))
					$errors['passwordErr']="Password not valid";
				
			  }
			  if (empty($_POST["CRemail"])) {
				$errors['emailErr1'] = "Email is required";
			  } else {
				$email = test_input($_POST["CRemail"]);
				// check if e-mail address is well-formed
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				  $errors['emailErr1'] = "Invalid email format";
				}
			  }
			  
			  
			
			  if (empty($_POST["CRphone"])) {
				$errors['phoneErr1'] = "Phone number is required";
			  } else {
				$phone = test_input($_POST["CRphone"]);
				// check if e-mail address is well-formed
				if(!preg_match("/^\d{10}$/",$phone))
				$errors['phoneErr1'] = "Enter valid phone number";
				
			  }
			  
			  if (!empty($_POST["CRaddress"])){
				  
					$address= test_input($_POST["CRaddress"]);
					
				}
			  
			}  

			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			
			
			if(isset($_POST["submit"]))
			{
				$conn = mysqli_connect("127.0.0.1","root","","traveldb");
				
				if(mysqli_connect_errno())
				
					echo "Failed to connect<br/>";
				
				//else
				//	echo "Successfully connected<br/>";
				
				 
				if(!$errors)    /*if no errors then insert into database */
				{
					/*check if username already exists in database*/
					$user = "SELECT username FROM customer WHERE username='$username'";
					$userresult=mysqli_query($conn,$user);
					$row_count = mysqli_num_rows($userresult);
					 
					/*if username already exists then do not insert into any tables*/
					if($row_count == 1)
					{
						$userexists = "username already exists";
					}
					else
					{
						/*insert into customer table*/
						$sql="INSERT INTO customer (username,password,Name,address,email,phone) VALUES ('$username','$password','$name','$address','$email','$phone')";
						$result=mysqli_query($conn,$sql);
						if($result){
							echo "<br>inserted<br>";
						}
						
					
						//start the session by storing his Cid and username
						session_start();
						$_SESSION['username']=$username;
						
						header("Location:customerhome.php");  /*now go to customer's homepage */
					}
				}
			
			}
			?>
			
			<div id="contents">
				<div class="box">
					<div>
						<div id="register" class="body" style="height:800px" >
							<h1>Customer Registration</h1>
							<br>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								<table>
									<tbody>
										<tr>
											<td><span class="error">* required fields </span></td>
											<td></td>
										</tr>
										<tr>
											<td>NAME:</td>
											<td><input type="text" name="CRname"class="txtfield"> *
										     <?php if(isset($errors['nameErr'])) echo $errors['nameErr'];?></td>
										</tr>
									
										<tr>
											<td>USERNAME:</td>
											<td><input type="text" name="CRusername" class="txtfield"> *
											  <?php if(isset($errors['usernameErr'])) echo $errors['usernameErr'] ;?>
											<?php if(isset($userexists)) echo $userexists; ?>
											</td>
										
										</tr>
										<tr>
											<td>PASSWORD:</td>
											<td><input type="password" name="CRpassword" class="txtfield"> * <?php if(isset($errors['passwordErr'])) echo $errors['passwordErr'];?></td>
								
										</tr>
						                <tr>
											<td>ADDRESS</td>
											<td><input type="text" name="CRaddress" class="txtfield"></td>

										</tr>
									
										<tr>
											<td>PHONE NUMBER:</td>
											<td><input type="text" name="CRphone" class="txtfield"> * <?php if(isset($errors['phoneErr1'])) echo $errors['phoneErr1'] ;?></td>
											
										</tr>
									
										
										<tr>
											<td>EMAIL-ID:</td>
											<td><input type="text" name="CRemail" class="txtfield">*<?php if(isset($errors['emailErr1'])) echo $errors['emailErr1'];?></td>
										
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
