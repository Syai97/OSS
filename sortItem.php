<?php
  
  include_once ("config/db.php");

  $itemname = $_GET['search'];

  $sql = "SELECT * FROM item WHERE itemname LIKE '%$itemname%'";
  $query = mysqli_query($con, $sql);


  if(mysqli_num_rows($query)<1){
      echo "Sorry, the item you have searched does not exist.";
    }

  while($row = mysqli_fetch_array($query)){

    
    $itemid  = $row['itemid'];
    echo "<a href='index.php?page=itemInfo&itemId=$itemid'>";
    echo $row['itemname'];
    echo "</a><br>";
  }


?>