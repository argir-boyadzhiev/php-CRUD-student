<!DOCTYPE html>



<?php
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$id = $_GET['id'];
	$name = $conn->real_escape_string($_POST['course_name']);
	
    
			
    $sql = "DELETE FROM courses WHERE course_id = '$id'";
    $conn->query($sql);
    header("Location: kurs_grid.php");
    
?>
