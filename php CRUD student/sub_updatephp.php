<!DOCTYPE html>



<?php
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$id = $_GET['id'];
	$name = $conn->real_escape_string($_POST['subject_name']);
	$h_l = $conn->real_escape_string($_POST['subject_workload_lectures']);
    $h_u = $conn->real_escape_string($_POST['subject_workload_exercises']);
			
    $sql = "UPDATE subjects SET subject_name = '$name' , subject_workload_lectures = '$h_l' , subject_workload_exercises = '$h_u'  WHERE subject_id = '$id'";
    $conn->query($sql);
    header("Location: sub_grid.php");
    
?>
