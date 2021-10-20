<?php
 
include ('conn.php');
if(!isset($_POST['submit'])) {
    
// get data form forntend
$AccountName =($_POST["AccountName"]);
$FirstName = ($_POST["FirstName"]);
$LastName = ($_POST["LastName"]);
$EmailAddress = ($_POST["EmailAddress"]);
//Encryption password
$EnterPwd = (md5($_POST["EnterPwd"]));
$re_EnterPwd = (md5($_POST["re_EnterPwd"]));
//Make value form check student or teacher
$Tutor_Code =($_POST["Tutor_Code"]);
$TutorCount=0;
   
//check email Uniqueness 
$check_email = mysqli_query($conn,"SELECT EmailAddress FROM tbl_userdetails WHERE EmailAddress='EmailAddress' limit 1");
    //make Code to judge user is teacher or student
    if($Tutor_Code="ABCD"){
        $TutorCount++;
        //check email Uniqueness
    if(mysqli_num_rows($check_email)>0){
        echo "<script>alert('Email already exists..');</script>";
        echo 'Click <a href="javascript:history.back(-1);"> to retry</a>';
    }

    else{
        //password must bigger then 6
        if(strlen($_POST['EnterPwd'])<6){
        echo "<script>alert('Password is too short.');</script>";
        echo 'Click <a href="javascript:history.back(-1);"> to retry</a>';
        }
        // confirm password is same
        else if($EnterPwd !== $re_EnterPwd){
        echo "<script>alert('passwrod did not match.');</script>";
        echo 'Click <a href="javascript:history.back(-1);"> to retry</a>';
        } 
        //put in the database
        else{
        $sql = "INSERT INTO tbl_userdetails (AccountName, FirstName, LastName, EmailAddress, EnterPwd, re_EnterPwd,TutorCount) VALUES ('$AccountName', '$FirstName', '$LastName', '$EmailAddress', '$EnterPwd', '$re_EnterPwd','$TutorCount')";
        $result = mysqli_query($conn,$sql);
            if($result){
                echo "<script>alert('successfully');</script>";
                echo 'Click <a href="javascript:history.back(-1);"> to retry</a>';
                } 
            }
        }
    }

}
//else erro
else{
    echo"444";
    echo 'Click <a href="javascript:history.back(-1);"> to retry</a>';
}
    

?>