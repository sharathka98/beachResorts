<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Customer Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<link rel="stylesheet" href="css/registerstyle.css" type="text/css">
	<link rel="stylesheet" href="css/userprofile.css" type="text/css">
	<link rel="stylesheet" href="css/agencyhome.css" type="text/css">
</head>
<?php
	session_start();
	if(empty($_SESSION['username'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
	$username = $_SESSION['username'];
	$conn=mysqli_connect("localhost","root","","traveldb");
	
	//writing subqueries
	$query = "SELECT Name,address,email,phone FROM customer where username='$username'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);

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
						<div id="profile" class="body">
							<h1>Your Profile</h1>
							<br>
							<div id="userborder">
								<table id="usertable">
									<tbody>
										<tr>
											<td><label>NAME:</label></td>
											<td><label><?php echo $row['Name'] ?></label></td>
										</tr> 
										<tr>
											<td style="text-decoration:underline;">YOUR ADDRESS</td>
											<td><?php echo $row['address'] ?></td>
										</tr>
									
									
										
										<tr>
											<td>PHONE NUMBER:</td>
											<td><?php echo $row['phone']?>
											</td>
										</tr>
										
										<tr>
											<td>EMAIL-ID:</td>
											<td><?php echo $row['email'] ?>
											</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
										<tr>
										<tr>
											<td>CLICK TO VIEW AGENCIES<b>:</b></td>
											<td>
											<button>
											<?php  
											
										echo"<h2>"."<a href='agencies.php?username=$username'>"."VIEW TOURAGENCIES"."</h2>"."</a>"; 
										     ?>
											 </button>
											 </td>
										<tr>
											<tr>
											<td>CLICK TO VIEW BOOKINGS<b>:</b></td>
											<td><a href="viewbookings.php" class="button">VIEW BOOKINGS</a></td>
										<tr>
										
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
?>