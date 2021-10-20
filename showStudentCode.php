
<?php

include ('conn.php');
session_start();
if(!isset($_POST['submit'])) {
$EmailAddress = ($_POST["code"]);

$result = mysqli_query($conn,"SELECT CodeAnswer FROM sumanswer where EmialAddress =  $EmailAddress limit 1 ");


echo "<table> ";

// start a table tag in the HTML
$row = mysqli_fetch_array($result);
echo "<tr><td>" . $row['CodeAnswer'] . "</td></tr>";  



echo "</table>"; 




}
//showStudentCode.php




?>