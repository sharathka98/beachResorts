<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View Agency Tour Packages</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
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
table{
    border-collapse: collapse;
	width:100%;
}

table, td, th {
    border: 1px solid black;
}
th {height: 50px;}
td ,th{ padding: 15px; text-align: left;}
tr:hover {background-color: #f5f5f5}

	</style>
<?php
	session_start();
	//if session does not exist i.e. if not logged in or session does not exist then go to index page
	if(empty($_SESSION['Username'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
	
	
	$username = $_SESSION['Username'];
	
	$conn = mysqli_connect("localhost","root","","traveldb");

	//$sql = "SELECT Pid,Pname,fromplace,cost,duration FROM package p,package_place pp WHERE p.Pid = pp.Pid AND p.Aid='$aid' ";
	$sql = "SELECT * FROM travelpackage WHERE ausername='$username'";
	
	$result = mysqli_query($conn,$sql);
	
	
?>

</head>
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
							<a href="agencyhome.php">Home</a>
						</li>
						<li>
							<a href="agencylogout.php">Logout</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="contents">
				<div class="box">
					<div>
						<div id="register" class="body">
							<h1>PACKAGES</h1>
							<br>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								
									<?php
										echo "<table>";
										echo '<th>Package Id</th><th>Package Name</th><th>From Place</th><th>Places to Visit</th>
										<th>Duration</th>
										<th>Cost</th>';
										while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>".$row['Pid']."</td>";
										echo "<td>".$row['packagename']."</td>";
										echo "<td>".$row['starting_place']."</td>";
										echo "<td>".$row['Places_to_visit']."</td>";
										echo "<td>".$row['startdate']."</td>";
										//echo "<td>".$row['GROUP_CONCAT(s.startdate)']."</td>";
										echo "<td>".$row['cost']."</td>";
										echo "</tr>";
										}
										echo "</table>";
									?>
									
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
</body>
</html>