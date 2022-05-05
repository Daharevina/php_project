<?php 

	include('db.php');

	$id1= $_GET['id'];
	$sql="delete from student where id='$id1'";

	if(mysqli_query($con, $sql))
	{
	  echo "<script>location.replace('index.php')</script>";
	}


?>