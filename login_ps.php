<?php
session_start();

if(isset($_POST['login'])){
    include ("config/db.php");
    include ("lib/func.php");

    $username = secure_input($con, $_POST['username']);
    $password = secure_input($con, $_POST['password']);

    $userid = null;

    //$password = md5($password);

    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    $id = $row['username'];
    $userfullname = $row['userfullname'];
    $db_password = $row['password'];
    $userid = $row['userid'];
    $ucid = $row['ucid'];
    //header("Location: https://www.youtube.com/");
    if($password == $db_password) {
        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $username;
        $_SESSION['userfullname'] = $userfullname;
        $_SESSION['ucid'] = $ucid;
        header("Location: index.php?page=home");
        //echo "Logged In";
    }else{
        echo "<script>alert(\"Please Enter The Correct Password!\");location.href='Login.php';</script>";
    }
}
?>