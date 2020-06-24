<!DOCTYPE html>



<?php
     
	 
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$st_id=5;
	
    $st_name = $conn->real_escape_string($_POST['st_id']);
	
	$dis = $conn->real_escape_string($_POST['dis']);
	
	$h_l = $conn->real_escape_string($_POST['h_l']);
	
	$h_u = $conn->real_escape_string($_POST['h_u']);
	
	$ocen = $conn->real_escape_string($_POST['ocen']);
	
	$sql1 = "SELECT student_id , student_fname , student_lname FROM students";
	
	foreach($conn->query($sql1) as $row) 
		{
        if($row['student_fname'].' '.$row['student_lname'] == $st_name)
		{
			$st_id = $row['student_id'];
								break;
		}
        }
	
	
	$sql = "INSERT INTO students_assessments (sa_student_id,sa_subject_id,sa_workload_lectures,sa_workload_exercises,sa_assesment) VALUES(' $st_id','$dis','$h_l','$h_u','$ocen')";
	$conn->query($sql);
	
	header("Location: index.php");
	
   
	
    
        
    
?>