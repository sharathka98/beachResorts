<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Agency Tour</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/agency.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<link rel="stylesheet" href="css/agencytour.css" type="text/css">
	<link rel="stylesheet" href="css/agencyhome.css" type="text/css">
</head>
<?php
	session_start();
	if(empty($_SESSION['username'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
	$Aname = $_GET['agencyname'];   
	$usernae = $_GET['username'];
	
	$conn=mysqli_connect("localhost","root","","traveldb");
    $s="SELECT Pid,cost,packagename,startdate,Places_to_visit,starting_place,ausername from travel_agency,travelpackage where Username=ausername and name='$Aname'";
	$result = mysqli_query($conn,$s);
	
	

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
						
							<h1><?php echo "$Aname" ?></h1>    
							
 							<ul id="agency">
							
								<?php
									while($row = mysqli_fetch_assoc($result) )
									{
										$P = $row['Pid'];
										
										echo "<li>";
											
											echo"<h2>". $row['packagename'] ."</h2>";
											echo " <p> From Place : ".$row['starting_place']."<br> Cost per person : ".$row['cost']."<br> Start date : ".$row['startdate']."". "<br>
											Places to visit:".$row['Places_to_visit']. "</p> ";
											echo "<a href='booking.php?pid=$P&username=$usernae' id='b' >"."BOOK"."</a>";
																	
										
										echo"</li>";
									}
									
									?>
								<li>
									
									
								
								</li>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
</body>
</html>