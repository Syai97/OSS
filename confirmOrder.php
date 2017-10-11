<?php
session_start();
$_SESSION['payment'] = true;
include_once("config/db.php");
include_once("lib/func.php");
$userid = $_SESSION['userid'];
$ordersdate = date("Y-m-d h:i:s");

$sql = "INSERT INTO orders (ordersid, ordersdate, orderstatus, userid) VALUES (null, '$ordersdate', 'UnPaid', $userid)";
$query = mysqli_query($con, $sql);
$sql2 = "SELECT ordersid FROM orders WHERE userid = $userid AND ordersdate = '$ordersdate'";
$query2 = mysqli_query($con, $sql2);
$row = mysqli_fetch_array($query2);
$ordersid = $row['ordersid'];

if(isset($_SESSION["cart_products"])){
    foreach ($_SESSION["cart_products"] as $cart_itm) {
        $qty = $cart_itm["qty"];
        $itemid = $cart_itm["itemid"];

        $sql3 = "INSERT INTO ordersdetail (detailid, quantity, ordersid, itemid) VALUES 
                  (null, $qty, $ordersid, $itemid)";
        $query3 = mysqli_query($con, $sql3);
    }

    redirect("index.php?page=itemPayment&od=$ordersid");
}
?>