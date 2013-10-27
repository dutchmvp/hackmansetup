<?php
$con=mysqli_connect("109.109.137.143","root","uA8GTi23xD","tfu");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM RecipeTriggers WHERE printed='N'");

while($row = mysqli_fetch_array($result))
  {
  echo $row['Nickname'] . " " . $row['MessageText'];
  echo "<br>";
  }

mysqli_close($con);
?>