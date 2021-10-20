<?php
include ('conn.php');
session_start();
if(!isset($_POST['submit'])) {

//get data form forntend
$CodeAnswer = ($_POST["CodeAnswer"]);
$OutputAnswer = ($_POST["OutputAnswer"]);
$one=$_SESSION['EmailAddress'];
$AssNum=($_POST["AssNum"]);
//atuo mark
$AtuoMark=50;
//Extract the correct answer
$True1 = mysqli_query($conn,"SELECT Answer FROM uploadquestion WHERE AssessmentNum='$AssNum'");
$row = mysqli_fetch_array($True1);
//test
//echo "<h1>". $row['Answer'] ."</h1>";
//atuo mark
if($row['Answer']==$_POST["OutputAnswer"]){
    //echo "<script>alert('100');</script>";
    $AtuoMark=100;
}
else{
    //echo "<script>alert('0');</script>";
    $AtuoMark=0;
}

//put in database
$sql = "INSERT INTO sumanswer (EmailAddress,CodeAnswer, OutputAnswer,AssNum,AtuoMark) VALUES ('$one','$CodeAnswer', '$OutputAnswer','$AssNum','$AtuoMark')";

$result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('successfully');</script>"; 
        echo 'Click <a href="javascript:history.back(-1);"> to retry</a>';

    } 
    else{
      	echo"<script>alert('fialed');</script>";
        echo 'Click <a href="javascript:history.back(-1);"> to retry</a>';

    }



}
?>