<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Agent Register</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<link rel="stylesheet" href="css/booking.css" type="text/css">
	<link rel="stylesheet" href="css/agencyhome.css" type="text/css">
	
</head>
<?php
	session_start();
	if(empty($_SESSION['username'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
	$pid = $_GET['pid'];
	$username = $_GET['username'];
	$conn=mysqli_connect("localhost","root","","traveldb");
	

	$sql="INSERT INTO selects (cusername,spid,tusername) select '$username',Pid,Username FROM travelpackage,travel_agency where Username=ausername and Pid=$pid";
    $check="SELECT COUNT(*) FORM selects WHERE cusername='$username' and spid='$pid'";
		$f1="SELECT ausername FROM travelpackage WHERE Pid='$pid'";
		$rea=mysqli_query($conn,$f1);
		$raw=mysqli_fetch_assoc($rea);
		
	

	$check="SELECT COUNT(*) FORM selects WHERE spid='$pid'";
  if(mysqli_query($conn,$check)>=1){
		echo "U have already chosen this package";
	}
	else
	{
	
		
		if(mysqli_query($conn,$sql))
		{
			
		}
	}
	

?>
<body>
	<div id="background">
		<div id="page">
			<div id="header">
				<div id="logo">
					<a href="index.html"><img src="travellogo.jpg" alt="LOGO" height="112" width="118"></a>
				</div>
				<div id="navigation" style="background-size:260px 50px;">
					<ul>
						<li class="selected">
							<a href="customerhome.php?">Home</a>
						</li>
						<li>
							<a href="customerlogout.php">LOGOUT</a>
						</li>
					</ul>
				</div>
				<h1>BOOKED</h1>
			</div>
		
		</div>
	
	</div>
</body>
</html>