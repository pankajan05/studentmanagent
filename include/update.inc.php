<?php

include_once 'db.inc.php';


if(isset($_POST['buname'])){
	$uname = mysqli_real_escape_string($con,$_POST['uname']);

	if(empty($uname)){
		header("Location:../details.php?username=empty");
	exit();
	}else{
		if(!preg_match("/^[a-z A-Z]*$/",$uname)){
			header("Location:../details.php?username=invalid");
			exit();
		}else{
			$sql = "SELECT * FROM user_info WHERE user_name = '$uname'";
			$result = mysqli_query($con,$sql);
			$resultcheck = mysqli_num_rows($result);

			if($resultcheck > 0){
					header("Location:../details.php?userexist");
					exit();
			}else{
				session_start();
				$f = $_SESSION['uname'];
				$sql = "UPDATE user_info SET user_name = '$uname' WHERE user_name = '$f'";
				$result = mysqli_query($con,$sql);

				$_SESSION['uname'] = $uname;

				header("Location:../details.php?change=success");
				exit();
			}
		}
	}

}else if(isset($_POST['bemail'])){
	$email = mysqli_real_escape_string($con,$_POST['email']);

	if(empty($email)){
		header("Location:../details.php?email=empty");
		exit();
	}else{
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			header("Location:../details.php?email=invalid");
			exit();
		}else{
			$sql = "SELECT * FROM user_info WHERE email = '$email'";
			$result = mysqli_query($con,$sql);
			$resultcheck = mysqli_num_rows($result);

			if($resultcheck > 0){
					header("Location:../details.php?emailexist");
					exit();
			}else{
				session_start();
				$f = $_SESSION['email'];
				$sql = "UPDATE user_info SET email = '$email' WHERE email = '$f'";
				$result = mysqli_query($con,$sql);

				$_SESSION['email'] = $email;

				header("Location:../details.php?change=success");
				exit();
			}
		}
	}

}else if(isset($_POST['bpassword'])){
	$pass = mysqli_real_escape_string($con,$_POST['password']);

	if(empty($pass)){
		header("Location:../details.php?password=empty");
		exit();
	}else{
		$hash = password_hash($pass,PASSWORD_DEFAULT);

		session_start();
			$f = $_SESSION['uname'];
			$sql = "UPDATE user_info SET password = '$hash' WHERE user_name = '$f'";
			$result = mysqli_query($con,$sql);

			header("Location:../details.php?change=success");
			exit();
	}

}else{
	header("Location:../details.php");
	exit();
}

?>