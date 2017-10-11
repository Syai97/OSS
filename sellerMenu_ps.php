<?php

if(isset($_POST['editItem'])){

    $itemPrice = $_POST['price'];
    $itemAvailability=$_POST['availability'];
    $sql = "UPDATE item SET itemprice=$itemPrice , itemstatus=$itemAvailability WHERE itemid == LIMIT 1";
    $query = mysqli_query($con, $sql);
}
?>