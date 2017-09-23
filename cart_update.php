<?php
session_start();
include("config/db.php");
$_SESSION['payment'] = false;
if(!isset($_SESSION['userid'])){
    echo"
<link rel=\"stylesheet\" href=\"boot/css/bootstrap.min.css\">

<div class=\"row\" style=\"padding-bottom: 10px; padding-top: 10px\">
									<div class=\"col-md-4 col-md-offset-4\" align=\"center\">
									<div class=\"alert alert-danger alert-dismissable\" id=\"mydiv\">
									<strong>Please Log In First!</strong>
									<br/><br/>
									<a href='Login.php'><p>Click Here To Login.</p></a>
									</div>
									</div>
          </div>";
}
else {
    $category = $_SESSION['ucid'];
    if ($category == 1) {
        header("Location: index.php");
    }
    else {
//add product to session or create new one
        if (isset($_POST['type']) && $_POST['type'] == 'add' && $_POST['qty'] > 0) {
            foreach ($_POST as $key => $value) { //add all post vars to new_product array
                $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
            }
            //remove unecessary vars
            unset($new_product['type']);
            unset($new_product['return_url']);

            //we need to get product name and price from database.
            $itemid = $_POST['itemid'];
            $query = "SELECT itemname, itemprice FROM item WHERE itemid=$itemid";
            $result = mysqli_query($con, $query);


            while ($row = mysqli_fetch_array($result)) {
                $itemname = $row['itemname'];
                $itemprice = $row['itemprice'];

                //fetch product name, price from db and add to new_product array
                $new_product['itemname'] = $itemname;
                $new_product['itemprice'] = $itemprice;

                if (isset($_SESSION["cart_products"])) {  //if session var already exist
                    if (isset($_SESSION["cart_products"][$new_product['itemid']])) //check item exist in products array
                    {
                        unset($_SESSION["cart_products"][$new_product['itemid']]); //unset old array item
                    }
                }
                $_SESSION["cart_products"][$new_product['itemid']] = $new_product; //update or create product session with new item
            }
        }

//update or remove items
        if (isset($_POST['qty']) || isset($_POST['remove_code'])) {
            //update item quantity in product session
            if (isset($_POST["qty"]) && is_array($_POST["qty"])) {
                foreach ($_POST["qty"] as $key => $value) {
                    if (is_numeric($value)) {
                        $_SESSION["cart_products"][$key]["qty"] = $value;
                    }
                }
            }
            //remove an item from product session
            if (isset($_POST["remove_code"]) && is_array($_POST["remove_code"])) {
                foreach ($_POST["remove_code"] as $key) {
                    unset($_SESSION["cart_products"][$key]);
                }
            }

            if (isset($_POST['qty'])) {
                foreach ($_POST['qty'] as $key => $value) {
                    if ($value == 0) {
                        unset($_SESSION["cart_products"][$key]);
                    }
                }
            }
        }

//back to return url
        $return_url = (isset($_POST["return_url"])) ? urldecode($_POST["return_url"]) : ''; //return url
        header('Location:' . $return_url);
    }
}
?>