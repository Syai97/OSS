<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>OSS</title>
</head>

<body>

<nav class="nav justify-content-center">
    <a class="nav-link active" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</a>
    <?php
      if(isset($_SESSION['username'])){
          $username = $_SESSION['userfullname'];
          if($_SESSION['ucid']==1){
              $page = 'sellerMenu';
          }
          else
              $page = 'custMenu';


          $totalCart = count($_SESSION["cart_products"]);
          echo " <a class=\"nav-link\" href=\"index.php?page=$page\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i>&nbsp;Welcome, $username</a>";
          echo "<a class=\"nav-link\" href=\"#\"><i class=\"fa fa-shopping-cart\"></i>&nbsp;View Cart&nbsp;<span class=\"badge badge-pill badge-danger\">$totalCart</span></a>";
          echo "<a class=\"nav-link\" href=\"logout.php\"><i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i>&nbsp;Log Out</a>";
      }
      else{
          echo "
            <a class=\"nav-link\" href=\"Login.php\"><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i>&nbsp;Log In</a>
            <a class=\"nav-link\" href=\"register.php\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i>&nbsp;Register</a>
          ";
      }
    ?>
    <a class="nav-link" href="#"><i class="fa fa-info-circle"></i>&nbsp;About</a>
</nav>
