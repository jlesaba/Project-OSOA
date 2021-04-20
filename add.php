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
			<article id="articleAdd">
				<form method="post" action=" ">
					<input type="text" maxlength="6" placeholder="STUDENT NUMBER" name="number" required id="addRecord">
				<br>
				
				
					
					<br>
				
					<table align="center">
						<tr>
							<th>CATEGORY</th>
							<th>DEBIT</th>
						</tr>
						
						<tr>
							<td>Tuition</td>
							<td><input type="text" max="100000" name="tdebit" id="tdebit" required></td>
						</tr>
					
						<tr>
							<td>Other Accounts</td>
							<td><input type="text" max="100000" min="0" name="odebit" id="odebit"></td>
						</tr>
					</table><br>
					
					
					<input type="submit">
					<input type="reset">
				</form>
				<?php
					include "constants.inc";
				
					//Create connection
					$conn = new mysqli($dbhost,$dbuser,$dbpass,'osoa');
				
					if(!isset($_POST["number"]) || !isset($_POST["tdebit"]) || !isset($_POST["odebit"])){
						echo "";
					}else{
						$id = $_POST["number"];
						$tdebit = $_POST["tdebit"];
						$odebit = $_POST["odebit"];
						
						//$sql = "SELECT sid,tdebit,odebit,due FROM osoa_accounts WHERE sid = $id";
						//$result = $conn->query($sql);
						
						
							$updtDeb = "UPDATE osoa_accounts SET tdebit = $tdebit WHERE sid = $id";
							$updoDeb = "UPDATE osoa_accounts SET otherdebit = $odebit WHERE sid = $id";
							if($conn->query($updtDeb) === TRUE && $conn->query($updoDeb) === TRUE){
								echo "<br>Records successfully updated";
							}else{
								echo "ERROR: ". $conn->error;
							}
					}
					
				?>
			</article>
		</section>
		
		<footer id="footerAdd">
			<p id="foot-left">DBTI - MAKATI</p>
			<p id="foot-right">All Rights Reserved 2014</p>
			<?php
				echo "<p id='home'><a href='main.php'>LOGOUT</a></p>";
			?>
		</footer>
		
	</body>
</html>