<?php 
include ('conn.php');
session_start();
if(!isset($_POST['submit'])) {
// get data from frontend
$SubjectName = ($_POST["SubjectName"]);
$Email = ($_POST["Email"]);
$FinalMark = ($_POST["FinalMark"]);


// put data in database 
$sql = "INSERT INTO finalmark (SubjectName, EmailAddress , FinalMark) VALUES ('$SubjectName', '$Email', '$FinalMark')";
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