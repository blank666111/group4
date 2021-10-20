<?php 
$gett = $_GET["q"];
include ('conn.php');
session_start();
if(!isset($_POST['submit'])) {



$result = mysqli_query($conn,"SELECT * FROM sumanswer where AssNum = '".$gett."'");

echo "<table> 
<tr>
<th>student</th>
<th>code</th>
<th>outputMark<th>
</tr>";

// start a table tag in the HTML
while($row = mysqli_fetch_array($result)){   

//echo "<tr><td>" . $row['EmailAddress'] . "</td></tr>"; 

//echo "<tr><td><pre ><code>". $row['CodeAnswer'] . "</code></pre></td></tr>";

echo "<tr>";
echo "<td>" . $row['EmailAddress'] . "</td>";
echo "<td>" . $row['CodeAnswer'] . "</td>";
echo "<td>" . $row['AtuoMark'] . "</td>";
echo "</tr>";

}

echo "</table>"; 


  
 



}
//showStudent.php
?>

