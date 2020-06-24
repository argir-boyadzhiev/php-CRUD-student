<!DOCTYPE html>



<?php
     
	 
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$imenaspecialnost = $conn->real_escape_string($_POST['imenaspecialnost']);
	
    $abreviatura = $conn->real_escape_string($_POST['abreviatura']);
	
    $sql = "INSERT INTO specialities (speciality_name_long,speciality_name_short) VALUES('$imenaspecialnost','$abreviatura')";

    $conn->query($sql);
   
	
    header("Location: spec_grid.php");
        
    
?>