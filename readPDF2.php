<?php
include ('conn.php');
if(!isset($_POST['submit'])) {
//test
//$id = 25;


$query = ("SELECT * FROM uploadquestion WHERE AssessmentNum = 'Exercise 2'");
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
//echo var_dump($row);
$show =$row['bin_data'];
$filename=$row['filename'];
$filetype=$row['filetype'];
$size=$row['filesize'];
/*list($pdf,$filetype,$size)=array($row['bin_data'],$row['filetype'],$row['filesize']);*/
//echo isset($row['bin_data']);


$ext =explode('/', $filetype);
$name= $filename;

header("Content-type:$filetype");
header("Content-length:$size");
header("Content-Disposition:attachment;filename=$name");
print ($show);
exit;


/*list($name,$type,$size,$content)=mysqli_fetch_array($result);
header("Conetnt-Disposition:attachment;filename=$name");
header("Conetnt-length: $size");
header("content-type: $type");
echo $content;*/

}
?>