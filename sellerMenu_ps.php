<?php
    session_start();
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
    } else if(isset($_POST['addItem'])) {
        $userid = $_SESSION['userid'];
        $itemName=$_POST["addItemName"];
        $itemPrice=$_POST["addItemPrice"];
        $itemTempName = $_FILES['addItemPicture']['tmp_name'];
        $itemPictureName = $_FILES['addItemPicture']['name'];
        $imgType= $_FILES['addItemPicture']['type'];
        $ext = pathinfo($itemPictureName, PATHINFO_EXTENSION);
        $uniqueSaveName=time().uniqid(rand());
        $filepath="pics/".$uniqueSaveName.".".$ext;

        if(isset($itemTempName)){
            if(!empty($itemTempName)){
               $pictureUploadStatus = move_uploaded_file ( $itemTempName , $filepath );
               if($pictureUploadStatus) {
                    $sqlAddItem="INSERT INTO item(itemname,itemprice,itemstatus,userid) VALUES ('$itemName','$itemPrice','Available','$userid')";
                    $queryAddItem = mysqli_query($con,$sqlAddItem);
                    $itemId = mysqli_insert_id($con);
                    $sqlAddItemPicture = "INSERT INTO img(imgname, path, type, itemid) VALUES ('$uniqueSaveName','$filepath','$imgType','$itemId')";
                    $queryAddItemPicture = mysqli_query($con,$sqlAddItemPicture);

                    if($queryAddItem && $queryAddItemPicture){
                        header("Location: index.php?page=sellerMenu&message=true");
                    } else {
                        header("Location: index.php?page=sellerMenu&message=false");
                    }
               } else {
                   echo "fail to move/upload file no changes to database";
               }
            } else {
                echo "fail Item Picture aren't Set";
            }
        } else {
            echo "fail Item Picture aren't Set";
        }
    }
?>