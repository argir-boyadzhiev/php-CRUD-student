<!DOCTYPE html>



<?php
     
	 
    require 'db_connection.php';
	$conn = OpenCon();
	 mysqli_set_charset($conn,"utf8");
	$imenakurs = $conn->real_escape_string($_POST['imenakurs']);
    
    $sql = "INSERT INTO courses (course_name) VALUES('$imenakurs')";

    $conn->query($sql);
   
	
    header("Location: kurs_grid.php");
        
    
?>