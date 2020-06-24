<!DOCTYPE html>



<?php
     
	 
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$imenadisciplina = $conn->real_escape_string($_POST['imenadisciplina']);
	
    $horariuml = $conn->real_escape_string($_POST['horariuml']);
	$horariumu = $conn->real_escape_string($_POST['horariumu']);
    $sql = "INSERT INTO subjects (subject_name,subject_workload_lectures,subject_workload_exercises) VALUES('$imenadisciplina','$horariuml','$horariumu')";

    $conn->query($sql);
   
	
    header("Location: sub_grid.php");
        
    
?>