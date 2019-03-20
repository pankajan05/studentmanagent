<?php
	include_once 'header.php';
?>

	<section class="main-container">
		<div class="main-wrapper">
			<h2>Signup</h2>
			<form class="sign" action="include/sign.inc.php" method="post">
				<input type="text" name="student_id" placeholder="student_id">
				<input type="text" name="user_name" placeholder="username">
				<input type="text" name="email" placeholder="e-mail">
				<input type="password" name="password" placeholder="password">
				<br><br><br>

				<input type="text" name="name" placeholder="student_name">
				<input type="text" name="fullname" placeholder="fullname">
				<input type="text" name="fathername" placeholder="father_name">
				<input type="text" name="mothername" placeholder="mother_name">
				<input type="text" name="fatherjob" placeholder="father_job">
				<input type="text" name="address" placeholder="address">
				<input type="text" name="dob" placeholder="date of birth">
				<input type="text" name="departmentid" placeholder="departmentid">
				<input type="text" name="phonenumber" placeholder="phonenumber">
				<br><br>

				<button type="submit" name="submit">Sign up</button>
				<br><br>
			</form>
		</div>
	</section>

<?php
	include_once 'footer.php';
?>	