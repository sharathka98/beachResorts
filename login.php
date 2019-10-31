<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">  <!-- used to style the navigation bar -->
	<link rel="stylesheet" href="css/login.css" type="text/css"> <!-- used to style the login form -->
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<link rel="stylesheet" href="css/registerstyle.css" type="text/css">
	<style>
	#b{
    background-color: #009973; /* Green */
    border: none;
    color: white;
    padding: 8px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;

}
</style>

<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","traveldb");
	if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
    header('Content-Type: text/html; charset=utf-8'); 
	
	if(isset($_POST['asubmit']))
	{ 
		$ausername="";
		$apassword="";
		if(isset($_POST['ALusername'])) $ausername = $_POST['ALusername'] ;
		if(isset($_POST['ALpassword'])) $apassword = $_POST['ALpassword'] ;
		$submitted_username = ''; 
		echo "<br>user:$ausername";
        $query = " SELECT Username, password FROM travel_agency WHERE Username='$ausername'" ;   
        $result = mysqli_query($conn, $query);
        // Fetch all
        $row = mysqli_fetch_assoc($result);//if username exists in database then it returns row =1
		$rows =  mysqli_num_rows($result);
        $login_ok = false; 
		if($rows == 1)
		{ 
            if($apassword == $row['password']){
                $login_ok = true;
            } 
        } 
		if($login_ok == true)
		{ 
            $_SESSION['Username'] = $ausername;
			$sql1 = "SELECT Username FROM travel_agency WHERE Username = '$ausername'";
			$result1 = mysqli_query($conn,$sql1);
			$row1 = mysqli_fetch_assoc($result1);
			$aid = $row1['Username'];
			$_SESSION['Username']= $ausername;
            header("Location:agencyhome.php"); 
           

        } 
        else
		{ 
            print("Login Failed."); 
           
        } 
    } 
	else
	if(isset($_POST['csubmit']))
	{ 
		$cusername="";
		$cpassword="";
		if(isset($_POST['CLusername'])) $cusername = $_POST['CLusername'] ;
		if(isset($_POST['CLpassword'])) $cpassword = $_POST['CLpassword'] ;
        $query = " SELECT username, password FROM customer WHERE username='$cusername'" ;   
        $result = mysqli_query($conn, $query);
        // Fetch all
        $row = mysqli_fetch_assoc($result);//if username exists in database then it returns row =1
		$rows =  mysqli_num_rows($result);
        $login_ok = false; 
		if($rows == 1)
		{ 
            if($cpassword == $row['password']){
                $login_ok = true;
            } 
        } 
		if($login_ok == true)
		{ 
            $_SESSION['username'] = $cusername;
			$sql1 = "SELECT username FROM customer WHERE username = '$cusername'";
			$result1 = mysqli_query($conn,$sql1);
			$row1 = mysqli_fetch_assoc($result1);
			$cid = $row1['username'];
			$_SESSION['username']= $cusername;
            header("Location:customerhome.php"); 
           

        } 
        else
		{ 
            print("Login Failed."); 
           
        } 
    } 
	
	
?>
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
			<div id="contents">
				<div class="box">
					<div>
						<div id="login" class="body">
							<h1>Customer LOGIN</h1>
							<br>
							<form action="" method="post">
								<table>
									<tbody>
										<tr>
											<td>USERNAME:</td>
											<td><input type="text" name="CLusername" class="txtfield"></td>
										</tr>
										<tr>
											<td>PASSWORD:</td>
											<td><input type="password" name="CLpassword" class="txtfield"></td>
										</tr>
								
									    <tr>
											<td></td>
											<td><input type="submit" value="submit" name="csubmit" id="b"></td>
										</tr>
									</tbody>
								</table>
							</form>
							<!-- Travel agency registration -->
							<br><br><br><br><br>
							<h1>travel agency LOGIN</h1>
							<br>
							<form action="login.php" method="post">
								<table>
									<tbody>
										<tr>
											<td>USERNAME:</td>
											<td><input type="text" name="ALusername" class="txtfield"></td>
										</tr>
										<tr>
											<td>PASSWORD:</td>
											<td><input type="password" name="ALpassword" class="txtfield"></td>
										</tr>
								
									    <tr>
											<td></td>
											<td><input type="submit" value="submit" name="asubmit" id="b"></td>
										</tr>
										<tr>
										<td></td>
										<td><b></b></td>
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