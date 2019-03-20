<?php

if(isset($_POST['submit'])){
	include_once 'db.inc.php';

	$student_id = mysqli_real_escape_string($con,$_POST['student_id']);
	$user_name = mysqli_real_escape_string($con,$_POST['user_name']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$fullname = mysqli_real_escape_string($con,$_POST['fullname']);
	$fathername = mysqli_real_escape_string($con,$_POST['fathername']);
	$mothername = mysqli_real_escape_string($con,$_POST['mothername']);
	$fatherjob = mysqli_real_escape_string($con,$_POST['fatherjob']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	$dob = mysqli_real_escape_string($con,$_POST['dob']);
	$departmentid = mysqli_real_escape_string($con,$_POST['departmentid']);
	$phonenumber = mysqli_real_escape_string($con,$_POST['phonenumber']);
	

	//error handler check for empty fields
	if(empty($student_id) || empty($user_name) || empty($password) || empty($email) || empty($name) || empty($fullname) || empty($fathername) || empty($mothername) || empty($fatherjob) || empty($address) || empty($dob) || empty($departmentid)){

		//$hash = password_hash($password,PASSWORD_DEFAULT);
		header("Location:../signup.php?signup=empty");
		exit();
	}else {
		if(!preg_match("/^[a-zA-Z]*$/",$user_name) || !preg_match("/^[a-zA-Z]*$/",$user_name) || !preg_match("/^[a-zA-Z]*$/",$name) || !preg_match("/^[a-zA-Z ]*$/",$fathername) || !preg_match("/^[a-zA-Z ]*$/",$fatherjob) || !preg_match("/^[a-zA-Z ]*$/",$mothername) || !preg_match("/^[a-zA-Z ]*$/",$fullname)){
		//check the character valid
			header("Location:../signup.php?signup=invalid");
			exit();
	}else {
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				header("Location:../signup.php?signup=invalidemail");
				exit();
			}else{

				$sql = "SELECT * FROM user_info WHERE user_name = '$user_name'";
				$result = mysqli_query($con,$sql);
				$resultcheck = mysqli_num_rows($result);
				

				$sql1 = "SELECT * FROM user_info WHERE email = '$email'";

				$result1 = mysqli_query($con,$sql1);
				$resultcheck1 = mysqli_num_rows($result1);

				$sql2 = "SELECT * FROM user_info WHERE user_name = '$user_name'";
				$result2 = mysqli_query($con,$sql2);
				$resultcheck2 = mysqli_num_rows($result2);

				if($resultcheck1 > 0){
					header("Location:../signup.php?signup=emailexist");
					exit();
				}
				if($resultcheck > 0){
					header("Location:../signup.php?signup=userexist");
					exit();
				}if($resultcheck2 > 0){
					header("Location:../signup.php?signup=studentidexist");
					exit();
				}else{
					//hashing password
					$hash = password_hash($password,PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO user_info VALUES ('$student_id','$user_name','$email','$hash');";
					$sql1 = "INSERT INTO student_detail VALUES ('$student_id','$name','$fullname','$fathername','$mothername','$fatherjob','$address','$dob','$departmentid','$phonenumber');";
					$result = mysqli_query($con,$sql);
					$result1 = mysqli_query($con,$sql1);

					header("Location:../signup.php?signup=success");
					exit();


				}
			}
		}
	}
}
else{
	header("Location:../signup.php");
	exit();
}

