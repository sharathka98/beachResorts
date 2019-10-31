<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Travel Agencies List</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/agency.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
</head>
<?php
	
	session_start();
	if(empty($_SESSION['username'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
	$usernae = $_GET['username'];
	$conn=mysqli_connect("localhost","root","","traveldb");
	


	$sql1= "SELECT name,address,email,phone from travel_agency";
	$result1 = mysqli_query($conn,$sql1);
	
?>
<body>
	<div id="background">
		<div id="page">
			<div id="header">
				<div id="logo">
					<a href="index.html"><img src="travellogo.jpg" alt="LOGO" height="112" width="118"></a>
				</div>
				<div id="navigation"  style="background-size:260px 50px;">
					<ul>
						<li class="selected">
							<a href="customerhome.php">Home</a>
						</li>
						<li>
							<a href="customerlogout.php">LOGOUT</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="contents">
				<div class="box">
					<div>
						<div class="body">
							<h1>Agencies</h1>
							<ul id="agency">
							
								<?php
									while($row = mysqli_fetch_assoc($result1) )
									{
										echo "<li>";
						
											$Aname= $row['name'];
											
											
											
											echo"<h2>"."<a href='agencytour.php?agencyname=$Aname&username=$usernae' >". $row['name'] ."</a>"."</h2>";
											
											echo " <p> Address :".$row['address']."</p> "; 
											echo"<p>EMAIL :".$row['email']."</p>";
											echo "<p>Phone:".$row['phone']."</p>";
										  //	echo "<p>Email ID:".$row['GROUP_CONCAT(e.Aemail)']."</p>"; 
										
										echo"</li>";
									}
									?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
</body>
</html>