<?php
/**
 * Created by PhpStorm.
 * User: Syaiful Fikri
 * Date: 23/9/2017
 * Time: 9:20 PM
 */
include('config/db.php');
include_once ("lib/func.php");

//print_r($_POST);die();
    if(isset($_POST['signup'])){
        $fullname = secure_input($con, $_POST['name']);
        $address = secure_input($con, $_POST['address']);
        $phonenum = secure_input($con, $_POST['phonenum']);
        $username = secure_input($con, $_POST['username']);
        //$password = md5($_POST['password']);
        $password = secure_input($con, $_POST['password']);
        $acctype = secure_input($con, $_POST['acctype']);

        $sql="INSERT INTO users (username, password, userfullname, usertel, useraddress, ucid) VALUES ('$username','$password','$fullname','$phonenum',' $address','$acctype')";
        $query = mysqli_query($con, $sql);

        if($query){
            header("Location: Login.php?message=true");
        }
    }
 ?>