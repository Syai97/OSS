<?php
  include_once ("config/db.php");
  if(!isset($_SESSION['userid'])){
//    echo "<script>alert('Please Register As Customer To Buy Item.');</script>";
  }
  else {

      if(isset($_SESSION['payment']) && $_SESSION['payment'] == true){
          unset($_SESSION["cart_products"]);
      }

    if (isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"]) > 0) {
        $totalCart = count($_SESSION["cart_products"]);
        echo '<div class="cart-view-table-front card" id="view-cart">';
        echo '<h3 style="padding: 20px;"><i class="fa fa-shopping-cart"></i>&nbsp;Your Shopping Cart&nbsp;<span class="badge badge-pill badge-primary">'.$totalCart.'</span></h3>';
        echo '<form method="post" action="cart_update.php">';
        echo '<table class="table" width="100%" cellpadding="6" cellspacing="0">';
        echo '<tbody>';

        $total = 0;
        $b = 0;
        foreach ($_SESSION["cart_products"] as $cart_itm) {
            $itemname = $cart_itm["itemname"];
            $qty = $cart_itm["qty"];
            $itemprice = $cart_itm["itemprice"];
            $itemid = $cart_itm["itemid"];
            $bg_color = ($b++ % 2 == 1) ? 'odd' : 'even'; //zebra stripe
            echo '<tr class="' . $bg_color . '">';
            echo '<td>Quantity : <input type="text" size="2" maxlength="2" name="qty[' . $itemid . ']" value="' . $qty . '" style="width: 20%!important;"/></td>';
            echo '<td>' . $itemname . '</td>';
            echo '<td><input type="checkbox" name="remove_code[]" value="' . $itemid . '" /> Remove</td>';
            echo '</tr>';
            $subtotal = ($itemprice * $qty);
            $total = ($total + $subtotal);
        }
        echo '<td colspan="4">';
        echo '<p></p>';
        echo '<button class="btn btn-primary" type="submit"><i class="fa fa-arrow-circle-o-up"></i>&nbsp;Update</button>&nbsp;  <a href="index.php?page=viewCart" class="btn btn-success"><i class="fa fa-arrow-circle-o-right"></i>&nbsp;Checkout</a>';
        echo '</td>';
        echo '</tbody>';
        echo '</table>';

        $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
        echo '</form>';
        echo '</div>';

    }
}
?>
<!-- View Cart Box End -->
