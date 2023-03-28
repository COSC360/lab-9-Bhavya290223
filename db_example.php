<?php
require "header.php";
//good connection, so do you thing
$sql = "SELECT * FROM users;";

$results = mysqli_query($connection, $sql);

//and fetch requsults
while ($row = mysqli_fetch_assoc($results))
{
  echo $row['username']." ".$row['firstName']." ".$row['lastName']." ".$row['email']." ".$row['password']."<br/>";
}

mysqli_free_result($results);
mysqli_close($connection);
?>
</html>
