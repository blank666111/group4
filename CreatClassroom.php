<?php 
include ('conn.php');
session_start();
if(!isset($_POST['submit'])) {
// get data from frontend
$LectureName = ($_POST["LectureName"]);
$SubjectName = ($_POST["SubjectName"]);
$ClassroomName = ($_POST["ClassroomName"]);
$ClassStartDate = ($_POST["ClassStartDate"]);
$ClassTime = ($_POST["ClassTime"]);
$ClassroomCode = ($_POST["ClassroomCode"]);


// put data in database 
$sql = "INSERT INTO CreateClass (LectureName, SubjectName,ClassroomName,ClassStartDate, ClassTime, ClassroomCode) VALUES ('$LectureName', '$SubjectName', '$ClassroomName', '$ClassStartDate', '$ClassTime', '$ClassroomCode')";
        
        $result = mysqli_query($conn,$sql);
            if($result){
                echo "<script>alert('Class Create successfully');</script>";
                } 
            else{
            	echo"<script>alert('fialed');</script>";
            }
}
else{

    echo"<script>alert('fialed1111');</script>";
}
?>