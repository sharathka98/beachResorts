 <?php 
	$conn = mysqli_connect("localhost","root","","traveldb");
	// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    header('Content-Type: text/html; charset=utf-8'); 
    session_start(); 
	//unsetting all the session variable whule logging out 
    unset($_SESSION['username']);

	
	
	//after logging out redirect to index page
    header("Location: index.php"); 
    die("Redirecting to: index.php");
?>