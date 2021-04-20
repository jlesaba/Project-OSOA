<!DOCTYPE html>
<html>
<head>
	<title>ACCOUNTING OFFICE:LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>	
	
	<header>
	</header>
	
	<div id="title">
		<p id="head">ACCOUNTING OFFICE</p>
	</div>
	
	<aside id="aside2">
		<?php
			echo "<br><p class='day'>Today is " . date("F") . " " . date("d") . ", " . " " . date("Y") . "</p><br>"
		?>
	</aside>
	
	<section>
		<article>
			<?php
				include "constants.inc";
	
				//Create connection
				$conn = new mysqli($dbhost,$dbuser,$dbpass,'osoa');
				$user = $_POST["user"];
				$pass = $_POST["pass"];
				$sql = "SELECT username,password FROM osoa_login";
				$result = $conn->query($sql);
				
				while($row=$result->fetch_assoc()){
					if ($row["username"] == $user && $row["password"] == $pass) {
						echo "
							<br><p id='lis'>Login successful</p><br>
							<a href='add.php' id='button2'><input type='button' value='Update Account'></a>
							<a href='paid.php' id='button2'><input type='button' value='Paid'></a>
						";
					}else{
						echo "
							ERROR: Wrong username/password<br>
							<a href='main.php'>Back to home</a>
						";
					}
				}
			?>
		</article>
	</section>
	
	<footer>
		<p id="foot-left">DBTI - MAKATI</p>
		<p id="foot-right">All Rights Reserved 2014</p>
		<?php
			echo "<p id='home'><a href='main.php'>LOGOUT</a></p>";
		?>
	</footer>
	
</body>
</html>