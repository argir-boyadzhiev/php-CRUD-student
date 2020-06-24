<!DOCTYPE html>



<?php
     
	 
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
    $user_name = $conn->real_escape_string($_POST['user_name']);
	
	$fname = $conn->real_escape_string($_POST['fname']);
	
	$lname = $conn->real_escape_string($_POST['lname']);
	
	$pass = $conn->real_escape_string($_POST['pass']);
	$pass1 = $conn->real_escape_string($_POST['pass1']);
	
	$email = $conn->real_escape_string($_POST['email']);
	
	$f_number = $conn->real_escape_string($_POST['f_number']);
	
	$kurs = $conn->real_escape_string($_POST['kurs']);
	
	$spec = $conn->real_escape_string($_POST['spec']);
	
	$forma = $conn->real_escape_string($_POST['forma']);
	
	
	if($pass == $pass1)
	{
		$passh = sha1($pass);
		$sql1 = "INSERT INTO users (user_name,user_fname,user_lname,user_email,user_password) VALUES('$user_name','$fname','$lname','$email','$passh')";
		$conn->query($sql1);
		
		$sql2 = "INSERT INTO students (student_course_id,student_speciality_id,student_fname,student_lname,student_email,student_fnumber,student_education_form) VALUES('$kurs','$spec','$fname','$lname','$email','$f_number','$forma')";
		
		$conn->query($sql2);
		
		header("Location: index.php");
	}
	else
	{
		header("Location: addstudent.php");
	}
   
	
    
        
    
?>