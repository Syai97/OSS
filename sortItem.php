<?php
  
  include_once ("config/db.php");
  include_once('lib/func.php');

  $itemname = secure_input($con, $_GET['search']);

  $sql = "SELECT * FROM item WHERE itemname LIKE '%$itemname%'";
  $query = mysqli_query($con, $sql);

  while($row = mysqli_fetch_array($query)){
    $itemid  = $row['itemid'];
     echo "<a href='index.php?page=itemInfo&itemId=$itemid'>";
     echo $row['itemname'];
     echo "</a><br>";
  }


?>