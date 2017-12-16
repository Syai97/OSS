<?php
session_start();

if(isset($_POST['login'])){
    include ("config/db.php");
    include ("lib/func.php");

    $username = secure_input($con,$_POST['username']);
    $password = secure_input($con,$_POST['password']);

    $userid = null;

    //$password = md5($password);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $query = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($query) == 1) {
        
        $row = mysqli_fetch_array($query);
        $id = $row['username'];
        $userfullname = $row['userfullname'];
        $userid = $row['userid'];
        $ucid = $row['ucid'];
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
