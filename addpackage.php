<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Package</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<link rel="stylesheet" href="css/registerstyle.css" type="text/css">
	<style>
	#b{
    background-color: #009973; /* Green */
    border: none;
    color: white;
    padding: 4px 4px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	
}

	</style>
	
<?php
	//if session does not exist i.e. if not logged in or session does not exist then go to index page
	session_start();
	if(empty($_SESSION['Username'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    } 
	
	
	$username = $_SESSION['Username'];
	if(isset($_POST['Pid'])) $pid = test_input($_POST['Pid']);
	if(isset($_POST['Pname'])) $pname = test_input($_POST['Pname']);
	if(isset($_POST['startplace'])) $startplace = test_input($_POST['startplace']);
	if(isset($_POST['Pcost'])) $pcost = test_input($_POST['Pcost']);
	if(isset($_POST['Pvisit'])) $visit = test_input($_POST['Pvisit']);
	if(isset($_POST['Pdate'])) $pdate = test_input($_POST['Pdate']);
	
	
	function test_input($data) 
	{
        $data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_POST['submit']))
	{
		//connect to database
		$conn=mysqli_connect("localhost","root","","traveldb");
		$username = $_SESSION['Username'];
		
		//insert into package table
		$sql = "INSERT INTO travelpackage (Pid,cost,packagename,startdate,Places_to_visit,starting_place,ausername) VALUES ('$pid', '$pcost', '$pname', '$pdate', '$visit','$startplace','$username')";
		$result = mysqli_query($conn,$sql);
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
							<h1>add package</h1>
							<br>
							<form action="" method="post">
								<table>
									<tbody>
										<tr>
											<td><span>All fields are required</span></td>
											<td></td>
										</tr>
										<tr>
											<td>PACKAGE ID:</td>
											<td><input type="text" name="Pid" class="txtfield"></td>
										</tr> 
										<tr>
											<td>PACKAGE NAME:</td>
											<td><input type="text" name="Pname"class="txtfield"></td>
										</tr>
										<tr>
											<td>STARTING PLACE:</td>
											<td><input type="text" name="startplace"class="txtfield"></td>
										</tr>
										<tr>
											<td>PLACES TO VISIT:</td>
											<td><input type="text" name="Pvisit" class="txtfield" placeholder="place to visit "></td>
										</tr>
									
									
										<tr>
											<td>COST<b>/</b>PERSON:</td>
											<td><input type="text" name="Pcost" class="txtfield"> </td>
										</tr>
										<tr>
											<td>START DATE:</td>
											<td><input type="text" name="Pdate"class="txtfield"></td>
										</tr>
						

									    <tr>
											<td></td>
											<!--<td><input type="submit" value="" class="btn"></td>-->
											<td><input type="submit" value="submit" name="submit" id="b"></td>
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