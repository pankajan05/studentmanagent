<?php include_once 'header.php'; ?>

<div class="main-wrapper">
	<h1>User Details</h1>

	</div>



<div class="container1">
	<h5>User Name:
		<form class="ged" action="include/update.inc.php" method="post">
			<input type="text" name="uname" placeholder="<?php  echo $_SESSION['uname']; ?>"><br>
			<button type="submit" name="buname">change</button>
		</form> 
	</h5>
	<h5>Student ID:
		<form class="ged" action="include/update.inc.php" method="post">
			<input type="text" name="student_id" placeholder="<?php  
			if(isset($_SESSION['admin']))
				echo $_SESSION['admin'];  
			else 
				echo $_SESSION['uid'];
	?>">
		</form>
	</h5>
	<h5>Email:
		<form class="ged" action="include/update.inc.php" method="post">
			<input type="text" name="email" placeholder="<?php  echo $_SESSION['email']; ?>"><br>
			<button type="submit" name="bemail">change</button>
		</form>
	</h5>
	<h5>Password:
		<form class="ged" action="include/update.inc.php" method="post">
			<input type="password" name="password" placeholder=" Enter new password"><br>
			<button type="submit" name="bpassword">change</button>
		</form>
	</h5>

</div>

<?php include_once 'footer.php'; ?>