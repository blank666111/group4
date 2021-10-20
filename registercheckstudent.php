<?php
 
include ('conn.php');
if(!isset($_POST['submit'])) {
    
//get data form forntend  
$AccountName =($_POST["AccountName"]);
$FirstName = ($_POST["FirstName"]);
$LastName = ($_POST["LastName"]);
$EmailAddress = ($_POST["EmailAddress"]);
$EnterPwd = (md5($_POST["EnterPwd"]));
$re_EnterPwd = (md5($_POST["re_EnterPwd"]));

    

$check_email = mysqli_query($conn,"SELECT EmailAddress FROM tbl_userdetails WHERE EmailAddress='EmailAddress' limit 1");

 if(mysqli_num_rows($check_email)>0){
        echo "<script>alert('Email already exists..');</script>";
    }

    else{
        if(strlen($_POST['EnterPwd'])<6){
        echo "<script>alert('Password is too short.');</script>";
        }else if($EnterPwd !== $re_EnterPwd){
        echo "<script>alert('passwrod did not match.');</script>";
        } else{
        $sql = "INSERT INTO tbl_userdetails (AccountName, FirstName, LastName, EmailAddress, EnterPwd, re_EnterPwd) VALUES ('$AccountName', '$FirstName', '$LastName', '$EmailAddress', '$EnterPwd', '$re_EnterPwd')";
        $result = mysqli_query($conn,$sql);
            if($result){
                echo "<script>alert('successfully');</script>";
                echo 'Click <a href="javascript:history.back(-1);"> to retry</a>';
                } 
            }
        }

}
else{
    echo"111";
    echo 'Click <a href="javascript:history.back(-1);"> to retry</a>';
}
    