<?php 
$gett = $_GET["q"];
include ('conn.php');
session_start();
if(!isset($_POST['submit'])) {

$one=$_SESSION['EmailAddress'];

//search data from finalmark
$result = mysqli_query($conn,"SELECT * FROM finalmark ");

echo "<table> 
<tr>
<th>SubjectName</th>

<th>FinalMark<th>
</tr>";

// start a table tag in the HTML
while($row = mysqli_fetch_array($result)){   
//check EmialAddress 
//echo "<tr><td>" . $row['EmailAddress'] . "</td></tr>"; 
//check CodeAnswe
//echo "<tr><td><pre ><code>". $row['CodeAnswer'] . "</code></pre></td></tr>";
//make table for SubjectName and FinalMark
echo "<tr>";
echo "<td>" . $row['SubjectName'] . "</td>";
echo "<td>" . $row['FinalMark'] . "</td>";
echo "</tr>";
}
echo "</table>"; 
}
//showMark.php
?>
