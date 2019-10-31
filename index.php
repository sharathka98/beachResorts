<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Index page</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<style>
	.mySlides {
	display:none;
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
								<button class="dropbtn">Register</button>    <!-- uses index.css for styling -->
								<div class="dropdown-content">
								<a href="customerregister.php" >Customer</a>
								<a href="agentregister.php"> Agency</a>
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
				<div id="adbox">
					<img class="mySlides" src="frontpage.jpg" alt="Img" width="852" height="425">
					<img class="mySlides" src="tajmahal.jpg" alt="Img" width="852" height="425">
					<img class="mySlides" src="beach.jpg" alt="Img" width="852" height="425">
					<script type="text/javascript">
						var myIndex = 0;
						carousel();

						function carousel() {
							var i;
							var x = document.getElementsByClassName("mySlides");
							for (i = 0; i < x.length; i++) {
							   x[i].style.display = "none";  
							}
							myIndex++;
							if (myIndex > x.length) {myIndex = 1}    
							x[myIndex-1].style.display = "block";  
							setTimeout(carousel, 2000); // Change image every 2 seconds
						}
					</script>
					
					<h1>Enjoy your holidays with Us!</h1>
					<p>
						
					</p>
				</div>
				<div id="main">
					<div class="box">
						<div>
							<div>
								<h3>Latest Blog</h3>
								<ul>
									
									<li>
										<h4><a href="news.html"></a></h4>
										<span></span>
										<p>
											
										</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="testimonials" class="box">
						<div>
							<div>
								
								<p >
									“ Travel <br/>
									 as much as you can,<br/>
									 as far as you can,<br/>
									 as long as you can,<br/>
									 life is not meant to be lived in one place "<br/>
									
								</p>
							</div>
						</div>
					</div>
				</div>
				<div id="sidebar">
					<div class="section">
						<img src="hill.jpg" alt="Img" height="150" width="285"><
					</div>
					<div class="section">
						<img src="beach2.jpg" alt="Img" height="150" width="285">
					</div>
					<div class="section">
						<img src="wl1.jpg" alt="Img" height="150" width="285">
					</div>
				</div>
			</div>
		</div>
	
	</div>
</body>
</html>