<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
			<nav>
				<div class="main-wrapper">
					<?php
						if(isset($_SESSION['uid'])){
							echo '<ul>
					<li><a href="index.php"><h2><b>Home</b></h2></a></li>
					<li><a href="report.php"><h2><b>Achivement</b></h2></a></li>
					<li><a href="details.php"><h2><b>Details</b></h2></a></li>
                    <li><a href="events.php"><h2><b>Events</b></h2></a></li>
					<li><a href="about.php"><h2><b>About</b></h2></a></li>
				</ul>
				<div class="nav-login">
				<form action="include/logout.inc.php" method="post">
							<button type="submit" name="submit">log out</button>
							</form>';
						}else if(isset($_SESSION['admin'])){
							echo '<ul>
					<li><a href="index.php"><h2><b>Home</b></h2></a></li>
					<li><a href="database.php"><h2><b>Database</b></h2></a></li>
					<li><a href="enter.php"><h2><b>MarksEnter</b></h2></a></li>
					<li><a href="details.php"><h2><b>Details</b></h2></a></li>
                    <li><a href="eventedit.php"><h2><b>Events</b></h2></a></li>
					<li><a href="about.php"><h2><b>About</b></h2></a></li>
				</ul>
				<div class="nav-login">
				<form action="include/logout.inc.php" method="post">
							<button type="submit" name="submit">log out</button>
					</form>
					<a href="signup.php">Sign up</a>';
						}else{
							echo '
				<ul>
					<li><a href="index.php"><h2><b>Home</b></h2></a></li>
                    <li><a href="events.php"><h2><b>Events</b></h2></a></li>
					<li><a href="about.php"><h2><b>About</b></h2></a></li>
				</ul>
				<div class="nav-login">
				<form action="include/log.inc.php" method="post">
						<input type="text" name="username" placeholder="username/e-mail">
						<input type="password" name="password" placeholder="password">
						<button type="submit" name="submit">log  in</button>
					</form>';
						}
					?>
					
				</div>
			</div>
			
		</nav>
	</header>