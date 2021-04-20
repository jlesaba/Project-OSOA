<!DOCTYPE html>
<html>
	<head>
		<title>ACCOUNTING OFFICE</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	
		<header>
		</header>
	
		<div id="title">
			<p id="head">ACCOUNTING OFFICE</p>
		</div>
		
		<article>
			<?php
				error_reporting(0);
				include "constants.inc";
	
				//Create connection
				$conn = new mysqli($dbserver,$dbuser,$dbpass,"osoa");
	
				//Check connection
				if($conn->connect_error){
					echo "<p id='oops'>Oops. Seems like your computer is not ready.</p>";
					echo "<a href='install.php' id='oopsButton'><input type='button' value='Click here to install necessary files'>";
				}else{
					echo "Redirecting...";
					header('Location: '.'main.php');
				}
				echo "<br><br>";
				?>
		</article>	
	</body>
</html>
