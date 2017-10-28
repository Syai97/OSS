<?php
include('config/db.php');
if(isset($_POST['editItem'])){
    //print_r($_POST);die();
    $itemPrice = $_POST['price'];
    $itemAvailability=$_POST['availability'];
    $itemId=$_POST['editItem'];
    $sqlEditItem = "UPDATE item SET itemprice=$itemPrice , itemstatus='$itemAvailability' WHERE itemid = $itemId LIMIT 1";
    $queryEditItem = mysqli_query($con, $sqlEditItem);

    if($queryEditItem){
        header("Location: index.php?page=sellerMenu&message=true");
    } else {
        header("Location: index.php?page=sellerMenu&message=false");
    }
}
?>