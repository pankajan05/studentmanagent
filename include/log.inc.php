<?php

session_start();

if(isset($_POST['submit'])) {

	include 'db.inc.php';

	$uid = mysqli_real_escape_string($con,$_POST['username']);
	$pass = mysqli_real_escape_string($con,$_POST['password']);

	//Error handler

	if(empty($uid) || empty($pass)){
		header("Location:../index.php?login=empty");
		exit();
	}else{
		$sql="SELECT * FROM user_info WHERE user_name = '$uid'";
		$result = mysqli_query($con,$sql);
		$resultcheck = mysqli_num_rows($result);

		if($resultcheck <= 0){
					header("Location:../index.php?signup=usernotexist");
					exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){
				//De-hashing
				$hpass = password_verify($pass, $row['password']);
				$user = $row['user_name'];

				if($hpass == false ){
						header("Location:../index.php?signup=passworderror");
						exit();
					}else if($hpass == true && $user == 'admin'){
						//login users
						$_SESSION['admin'] = $row['student_id'];
						$_SESSION['uname'] = $row['user_name'];
						$_SESSION['email'] = $row['email'];

						header("Location:../index.php?signup=success");
						exit();
					}else{
						$_SESSION['uid'] = $row['student_id'];
						$_SESSION['uname'] = $row['user_name'];
						$_SESSION['email'] = $row['email'];

						header("Location:../index.php?signup=success");
						exit();
					}
				}	
			}
		}

}else{
	header("Location:../index.php?login=error");
	exit();
}

?>