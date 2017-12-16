<?php
session_start();
include_once ("config/db.php");
include_once ("lib/func.php");

if(isset($_POST['payProof'])){
    $username = $_SESSION['username'];
    $ordersid = secure_input($con, $_POST['ordersid']);
    $temp = $_FILES['payment']['tmp_name'];
    $pay_Proof = $_FILES['payment']['name'];
    $ext = pathinfo($pay_Proof, PATHINFO_EXTENSION);
    $pay_Proof = "paymentFor$username";
    $filePath = "payment/".$pay_Proof."_$ordersid".'.'.$ext;



    move_uploaded_file($temp, $filePath);
    $sql = "UPDATE orders SET paymentproof = '$filePath' WHERE ordersid = $ordersid";
    $query = mysqli_query($con, $sql);
    if($query){
        $sql4 = "UPDATE orders SET orderstatus = 'Paid' WHERE ordersid = $ordersid";
        $query4 = mysqli_query($con, $sql4);
        echo $rLink = 'index.php?page=custMenu&paySuccess=1&od='.$ordersid;

        redirect($rLink);
    }
    else
        redirect('index.php?page=custMenu&paySuccess=2');
}

?>