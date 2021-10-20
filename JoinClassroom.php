<?php
include ('conn.php');
//collet data EmailAddress
session_start();
if(!isset($_POST['submit'])) {

//get data from frontend
$ClassroomCode = ($_POST["ClassroomCode"]);
$one = $_SESSION['EmailAddress'];
//put data in database
$check_email = mysqli_query($conn,"SELECT id FROM createclass WHERE ClassroomCode = '$ClassroomCode'  limit 1");
	//check data for saving to database
	if(mysqli_num_rows($check_email) >0){
		echo "<script>alert('welcome');</script>";
		header("Location: studentCodingRoom.html");
		//echo "<h1>".$_SESSION['EmailAddress']."</h1>";
	}

	else{

		echo "<script>alert('fail');</script>";
	}


}
?>