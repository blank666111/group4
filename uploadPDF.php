<?php
include ('conn.php');
if(!isset($_POST['submit'])) {
//get data form frontend
$Subject=($_POST["Subject"]);
$AssessmentNum=($_POST["AssessmentNum"]);
$Answer=($_POST["Answer"]);
$filename = ($_FILES['uploaded_file']['name']);
$filetype = ($_FILES['uploaded_file']['type']);
$bin_data = ($_FILES  ['uploaded_file']['tmp_name']);
$filesize = ($_FILES['uploaded_file']['size']);

//make pdf type
$fp = fopen($bin_data, 'r');
$content = fread($fp, filesize($bin_data));
$content = addslashes($content);
fclose($fp);


//put in database
$sql="INSERT INTO uploadquestion (Subject, AssessmentNum, bin_data, filename, filesize, filetype, Answer) VALUES ('$Subject', '$AssessmentNum', '$content', '$filename', '$filesize', '$filetype','$Answer')"; 
//connect database
$result = mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('successfully');</script>";
    echo 'Click <a href="javascript:history.back(-1);"> to retry</a>';

} 
else{
    echo "<script>alert('failed');</script>";
    echo 'Click <a href="javascript:history.back(-1);"> to retry</a>';

}

}


?>