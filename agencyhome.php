<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Agency Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<link rel="stylesheet" href="css/agencyhome.css" type="text/css">
	
</head>
<style type="text/css">
#logout {
    background-color:#009970;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	
}
.button
{
	width:180px;
}

</style>
<?php
	session_start();
	//if session does not exist i.e. if not logged in or session does not exist then go to index page
	if(empty($_SESSION['Username'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    } 
	//storing the session variable

   $username = $_SESSION['Username'];
	//connect to database
	$conn=mysqli_connect("localhost","root","","traveldb");
	
	$name="";
	
	$sql = "CALL getAName('$username',@name)";
	$sql1 = "SELECT @name as name";
	$result=mysqli_query($conn,$sql);
	$result1 = mysqli_query($conn,$sql1);
	$row = mysqli_fetch_assoc($result1);
	
	
	
?>
<body>
	<div id="background">
		<div id="page">
			<div id="header">
				<div id="logo">
					<a href="index.html"><img src="travellogo.jpg" alt="LOGO" height="112" width="118"></a>
				</div>
				<div id="navigation"  style="background-size:260px 50px;"> <!-- to change the green navigation bar length -->
					<ul>
						<li class="selected">
							<a href="agencyhome.php">Home</a>   <!-- agency home page itself -->
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
						<div id="agency" class="body">
							<h1><?php echo $row['name']; ?></h1> 
							
							<br>
							<div id="userborder"> 
								<table>
									<tbody>
									
										<tr>
											<td><label>CLICK TO ADD A NEW PACKAGE<b>:</b></label></td>
											<td><a href="addpackage.php" class="button">ADD PACKAGE</a></td>
										</tr> 
										
									
										<tr>
											<td>CLICK TO VIEW ALL YOUR PACKAGES <b>:</b> </td>
											<td><a href="view_apackage.php" class="button">VIEW PACKAGES</a></td>
										</tr>
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>  
			</div>
		</div>
			
			
			
		
	</div>
</body>
</html>