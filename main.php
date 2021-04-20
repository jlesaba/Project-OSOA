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
		
		<section>
			<aside>
				<form method="post" action="login.php">
					<h3 id="staff">STAFF'S LOGIN</h3>
					<input type="text" name="user" placeholder="Username" required><br>
					<input type="password" name="pass" placeholder="Password" required id="staffs"><br>
					<input type="submit" value="Login" id="button">
					<input type="reset" id="button"><br>
					<?php
						echo "<p class='day'>Today is " . date("F") . " " . date("d") . ", " . " " . date("Y") . "</p><br>"
					?>
				</form>
			</aside>
			
			<article id="articleMain">
				<form method="get" action="">
					<h3>STUDENT'S SEARCH</h3>
					ID Number: <input type="text" name="sid" required><br><br>
					<input type="submit" value="Search"><br><br>
				</form>
				<?php
				include "constants.inc";
				//Create connection
				$conn = new mysqli($dbhost,$dbuser,$dbpass,'osoa');
				
				if(!isset($_GET["sid"])){
					echo " ";
				}else{
					$id = $_GET["sid"];
					$sql="SELECT sid,lname,fname,mname,year,section,sy,tdebit,tcredit,otherdebit,othercredit FROM osoa_accounts WHERE sid = $id";
					$result=$conn->query($sql);
					echo "<table cellspacing=0 cellpadding=5 align=center border=1>";
					echo "<tr><th>STUDENT NUMBER</th><th>NAME</th><th>GRADE/YEAR</th><th>SECTION</th>";
					while($row=$result->fetch_assoc()){
						echo "<tr><td>".$row["sid"]."</td><td>".$row["lname"]." ".$row["fname"]." ".$row["mname"]."</td><td>".$row["year"]."</td><td>".$row["section"]."</td></tr>";
						echo "</table><br>";
						echo "<table cellspacing=0 cellpadding=5 align=center border=1>";
						echo "<tr><th>CATEGORY</th><th>DEBIT</th><th>CREDIT</th><th>BALANCE</th><th>AMOUNT DUE</th></tr>";
						$tbalance = $row["tdebit"] - $row["tcredit"];
						echo "<tr><td>TUITION</td><td>".number_format($row["tdebit"],2)."</td><td>".number_format($row["tcredit"],2)."</td><td>".number_format($tbalance,2)."</td><td>".number_format($tbalance,2)."</td></tr>";
						$obalance = $row["otherdebit"] - $row["othercredit"];
						echo "<tr><td>OTHER ACCOUNTS</td><td>".number_format($row["otherdebit"],2)."</td><td>".number_format($row["othercredit"],2)."</td><td>".number_format($obalance,2)."</td><td>".number_format($obalance,2)."</td></tr>";
						$total = $tbalance + $obalance;
						echo "<tr><th colspan=5>Total Amount Due: ".number_format($total,2)."</th></tr>";
						echo "</table><br>";
					}
					
				}			
				?>
			</article>
		</section>
		
		<footer id="footerMain">
		<p id="foot-left">DBTI - MAKATI</p>
		<p id="foot-right">All Rights Reserved 2014</p>
		<?php
			echo "<p id='home'><a href='main.php'>BACK TO HOME</a></p>";
		?>
		</footer>
		
	</body>
</html>