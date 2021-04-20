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
		
		<article id="articleInstall">
		<?php
			echo "<br>Installing necessary files...<br><br>";
	
			include "constants.inc";
			//Create connection
			$conn = new mysqli($dbhost,$dbuser,$dbpass);
	
			//Check connection
			if($conn->connect_error){
				die("ERROR: ". $conn->connect_error);
			}else{
				echo "Connection successful.";
			}
			echo "<br><br>";
	
			//Create database
			$sql = "CREATE DATABASE osoa";
			if ($conn->query($sql) === TRUE) {
				echo "OSOA Database created successfully";
			}else {
				echo $conn->error;
			}
			echo "<br><br>";
	
			//New connection
			$conn = new mysqli($dbhost,$dbuser,$dbpass,"osoa");
	
			//Create login table
			$sql = "CREATE TABLE osoa_login (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL, position VARCHAR(20) NOT NULL)";
			if ($conn->query($sql) === TRUE) {
				echo "Login table created successfully";
			}else{
				echo "Error creating table: " . $conn->error;
			}
			echo "<br><br>";
	
			//Create web master login
			$sql = "INSERT INTO osoa_login (id, username, password, position) VALUES ('000000', 'root', 'alpine', 'Programmer')";
			if ($conn->query($sql) === TRUE) {
				echo "Web master login created successfully";
			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			echo "<br><br>";
	
			//Create accounts table
			$sql = "CREATE TABLE osoa_accounts (sid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, lname VARCHAR(25) NOT NULL, fname VARCHAR(25) NOT NULL, mname VARCHAR(25) NOT NULL, year INT(2) NOT NULL, section INT(1) NOT NULL, sy VARCHAR(10) NOT NULL, tdebit DOUBLE NOT NULL, tcredit DOUBLE NOT NULL, otherdebit DOUBLE NOT NULL, othercredit DOUBLE NOT NULL)";
			if ($conn->query($sql) === TRUE) {
				echo "Accounts table created successfully<br><br>";
				echo "Installation done. You're good to go. <br><a href='main.php' id='gotoButton'><input type='button' value='Go to main page'></a>";
			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
	
			$conn->close();
		?>
		</article>
	</body>
</html>