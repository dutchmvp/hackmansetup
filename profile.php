
<?php include 'header.php'; ?>

<table>
<tbody>
<?php 
   include 'database.php';

   $user = '4';
   $query="SELECT * FROM Contacts WHERE UserId = $user";
   $results = mysql_query($query);

   while ($row = mysql_fetch_assoc($results)) {
   	echo '<tr>';
  	echo '<td>'.$row['Handle'].'</td>';
  	echo '<td>'.$row['EmailAddress'].'</td>';
  	echo '</tr>';
	}

?>
</tbody>
</table>

<?php include 'footer.php'; ?>
