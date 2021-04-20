<!DOCTYPE html>
<html>
	<head>
		<title>ACCOUNTING OFFICE:ADD AN ACCOUNT</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
	</head>
	<body>
	
		<header>
		</header>
		
		<div id="title">
			<p id="head">ACCOUNTING OFFICE:ADD AN ACCOUNT</p>
		</div>
		
		<aside id="aside2">
			<?php
				echo "<br><p class='day'>Today is " . date("F") . " " . date("d") . ", " . " " . date("Y") . "</p><br>"
			?>
		</aside>
		
		<section>
			<article>
				<form method="post" action=" "><br><br>
					<input type="text" name="sid" placeholder="ID Number" required><br><br>
					<input type="text" name="tender" placeholder="Total Amt. Tendered" required><br><br>
					<input type="submit">
				</form>
				
				<?php
					include "constants.inc";
					
					//Create connection
					$conn = new mysqli($dbhost,$dbuser,$dbpass,'osoa');
				
					if(!isset($_POST["sid"]) || !isset($_POST["tender"])){
						echo " ";
					}else{
						$id = $_POST["sid"];
						$tend = $_POST["tender"];
						$sql = "SELECT sid,tcredit,othercredit FROM osoa_accounts WHERE sid = $id";
						$result = $conn->query($sql);
						
							while($row=$result->fetch_assoc()){
								$ttend = $row["tcredit"] + (0.22 * $tend);
								$otend = $row["othercredit"] + (0.78 * $tend);
								$new = "UPDATE osoa_accounts SET tcredit = $ttend WHERE sid = $id";
								$upd = "UPDATE osoa_accounts SET othercredit = $otend WHERE sid = $id";
						
							if ($conn->query($new) === TRUE && $conn->query($upd) === TRUE) {
								echo "<br>Record updated successfully";
							} else {
								echo "Error updating record: " . $conn->error;
							}

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