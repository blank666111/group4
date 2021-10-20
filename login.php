
<?php
include ('conn.php');
session_start();
if(!isset($_POST['submit'])) {

//get data form frontend
$EmailAddress = ($_POST["EmailAddress"]);
//Encryption password
$EnterPwd = (md5($_POST["EnterPwd"]));
//save data to session_start();
$_SESSION['EmailAddress']=$EmailAddress;
//check email and password exist
$check_email = mysqli_query($conn,"SELECT id FROM tbl_userdetails WHERE EmailAddress = '$EmailAddress' AND EnterPwd = '$EnterPwd'  limit 1");
//check tutorcount exist
$TutorCount = mysqli_query($conn,"SELECT TutorCount FROM tbl_userdetails WHERE EmailAddress = '$EmailAddress' ");
	if(mysqli_num_rows($check_email) >0){
		$row = mysqli_fetch_assoc($TutorCount);
		$_SESSION['tbl_userdetails_TutorCount']=$row['TutorCount'];
		
		if($row['TutorCount']=='1'){
			//check data 
			//echo "<h1>".$row['TutorCount']."</h1>";
			//location to teacherMain.html
			header("Location: teacherMain.html");		
		}
		else{
			//location to studentMain.html
			header("Location: studentMain.html");
			//check data
			//echo "<h1>".$_SESSION['EmailAddress']."</h1>";
		}
	}
	else{
		echo"<script>alert('login failed');</script>";
	}	
}
?> 