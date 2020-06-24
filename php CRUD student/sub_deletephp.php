<!DOCTYPE html>



<?php
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$id = $_GET['id'];
	
    
			
    $sql = "DELETE FROM subjects WHERE subject_id = '$id'";
    $conn->query($sql);
    header("Location: sub_grid.php");
    
?>
