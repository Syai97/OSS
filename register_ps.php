<?php
/**
 * Created by PhpStorm.
 * User: Syaiful Fikri
 * Date: 23/9/2017
 * Time: 9:20 PM
 */
include('config/db.php');
//print_r($_POST);die();
    if(isset($_POST['signup'])){
        $fullname = $_POST['name'];
        $address = $_POST['address'];
        $phonenum = $_POST['phonenum'];
        $username = $_POST['username'];
        //$password = md5($_POST['password']);
        $password = $_POST['password'];
        $acctype = $_POST['acctype'];

        $sql="INSERT INTO users (username, password, userfullname, usertel, useraddress, ucid) VALUES ('$username','$password','$fullname','$phonenum',' $address','$acctype')";
        $query = mysqli_query($con, $sql);

        if($query){
            header("Location: Login.php?message=true");
        }
    }
 ?>