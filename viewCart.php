<div class="container">
    <div class="row" style="padding-top: 50px">
        <div class="col-lg-12">
            <div class="card">
                <h2 align="center" style="padding: 20px"><i class="fa fa-shopping-cart"></i>&nbsp;View Cart</h2>
                <form method="post" action="cart_update.php">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Quantity</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!isset($_SESSION['userid'])) {
                        echo "<div class='alert alert-danger'>Please Login Or Register To Buy Item.<a href='Login.php'>Click Here</a></div>";
                    } else {
                        if (count($_SESSION["cart_products"]) == 0) {
                            header("Location: index.php");
                        } else {
                            if (isset($_SESSION["cart_products"])) //check session var
                            {
                                $total = 0; //set initial total value
                                $b = 0; //var for zebra stripe table
                                foreach ($_SESSION["cart_products"] as $cart_itm) {
                                    //set variables to use in content below
                                    $itemname = $cart_itm['itemname'];
                                    $qty = $cart_itm['qty'];
                                    $itemprice = $cart_itm['itemprice'];
                                    $itemid = $cart_itm['itemid'];
                                    $subtotal = ($itemprice * $qty); //calculate Price x Qty
                                    $currency = 'RM';
                                    $bg_color = ($b++ % 2 == 1) ? 'odd' : 'even'; //class for zebra stripe
                                    echo '<tr class="' . $bg_color . '">';
                                    echo '<td><input type="text" size="2" maxlength="2" name="qty[' . $itemid . ']" value="' . $qty . '" /></td>';
                                    echo '<td>' . $itemname . '</td>';
                                    echo '<td>' . $currency . $itemprice . '</td>';
                                    echo '<td>' . $currency . $subtotal . '</td>';
                                    echo '<td><input type="checkbox" name="remove_code[]" value="' . $itemid . '" /></td>';
                                    echo '</tr>';
                                    $total = ($total + $subtotal); //add subtotal to total var
                                }
                                $shipping_cost = 2.00;
                                $grand_total = $total + $shipping_cost; //grand total including shipping cost
                                $shipping_cost = ($shipping_cost) ? 'Shipping Cost : ' . $currency . sprintf("%01.2f", $shipping_cost) . '<br />' : '';
                            }
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost; ?>Amount Payable : <?php echo $currency . sprintf("%01.2f", $grand_total); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <button class="btn btn-danger" type="button" onclick="location.href = 'index.php';">Back
                            </button>
                            <a href="index.php" class="btn btn-primary">Add More Items</a>
                            <button class="btn btn-success" type="submit">Update</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                    <?php
                    $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                    echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
                    ?>
                </form>
                <div align="right" style="padding: 10px">
                    <form name="insertItem" method="post" action="confirmOrder.php">
                      <button class="btn btn-primary" type="submit">Confirm Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

