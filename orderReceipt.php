<?php

include_once ("config/db.php");
include_once ("lib/func.php");

if(isset($_GET['od'])) {
    $ordersid = secure_input($con, $_GET['od']);
    $userid = $_SESSION['userid'];

    $sql = "SELECT u.userfullname, u.usertel, u.useraddress, o.ordersid, o.ordersdate FROM users u JOIN orders o ON u.userid = $userid
        WHERE o.ordersid = $ordersid";
    $query = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($query)) {
        $name = $row['userfullname'];
        $address = $row['useraddress'];
        $phone = $row['usertel'];
        $ordersdate = $row['ordersdate'];
    }

    $sql2 = "select * from ordersdetail where ordersid = $ordersid";
    $query2 = mysqli_query($con, $sql2);
    $od = str_pad($ordersid, 4, "00", STR_PAD_LEFT);


    echo "
<div class='container'>
<br/>
<div class='card' style='padding: 10px' id='print'>
  <h1 class='text-center'>Order #$od Receipt</h1>
<div class='row' style='padding-top: 2em'>
<div class='col-lg-6'>
    <table class='table table-bordered' >
        <tr>
            <td class=\"meta1 - head\">Name</td>
            <td>$name</td>
        </tr>
        <tr>
            <td class=\"meta1 - head\">Shipping Address</td>
            <td>$address</td>
        </tr>
        <tr>
            <td class=\"meta1 - head\">Phone Number</td>
            <td>$phone</td>
        </tr>

    </table>
</div>

<div class='col-lg-6'>
<table id=\"meta\" class='table table-bordered'>
    <tr>
        <td class=\"meta - head\">Order #</td>
        <td>$od</td>
    </tr>
    <tr>

        <td class=\"meta - head\">Date</td>
        <td>$ordersdate</td>
    </tr>

</table>
</div>
</div>


<div class='row' style='padding-top: 5em'>
<div class='col-lg-12'>
    <table id=\"items\" class='table table-bordered'>

        <tr>
            <th>Item</th>
            <th>Unit Cost</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>";
    $total = 0;
    while($row2= mysqli_fetch_array($query2)){
        $itemid = $row2['itemid'];
        $quantity = $row2['quantity'];
        $sql3 = "select itemname, itemprice from item where itemid = $itemid";
        $query3 = mysqli_query($con, $sql3);
        $row3 = mysqli_fetch_array($query3);
        $itemname = $row3['itemname'];
        $itemprice = $row3['itemprice'];
        $subtotal = $itemprice*$quantity;
        $total = ($total + $subtotal);

        echo "<tr>
                     <td>
                        $itemname
                     </td>
                     <td>
                        $itemprice
                     </td> 
                     <td>
                        $quantity
                     </td> 
                     <td>
                         RM $subtotal
                     </td> 
                   </tr>";
    }


    echo"
          <tr>
		      <td colspan=\"2\" class=\"blank\"> </td>
		      <td colspan=\"1\" class=\"total - line\">Amount Paid</td>
		      <td colspan=\"1\" class=\"total - value\">$total</td>
		  </tr>
    </table>
    </div>
    </div>

<button type=\"button\" class=\"btn btn-primary\" onclick=\"printPageArea('print')\">
          <i class=\"fa fa-print\"></i>&nbsp; Print
</button>
<button type=\"button\" class=\"btn btn-danger\" onclick=\"location.href = 'index.php?page=custMenu'\">
          <i class=\"fa fa-arrow-left\"></i>&nbsp;Back
</button>
</div>
<script type='text/javascript'>
function printPageArea(areaID){
    var printContent = document.getElementById(areaID);
    var WinPrint = window.open();
    WinPrint.document.write('<html><head>');
    WinPrint.document.write('<link rel=\"stylesheet\" href=\"css/bootstrap.css\">');
    WinPrint.document.write(' <link rel=\"stylesheet\" href=\"css/style.css\">');
    WinPrint.document.write('</head><body onload=\"print();close();\">');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.write('</body></html>');
    WinPrint.document.close();
}
</script>
";
}
?>

