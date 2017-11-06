<div class="container">
    <div class="row" style="padding-top: 50px">
        <div class="col-lg-12">
        <?php 
            if(isset($_GET['message'])){
                if($_GET['message'] == 'true'){
                    echo "
                    <div class='alert alert-success' align='center'>
                        Item Successfully Updated.
                    </div> 
                    ";
                }
                else{
                    echo "
                    <div class='alert alert-danger' align='center'>
                        There Is An Error In Processing Your Update Request.Please Contact User Support. 
                    </div> 
                    ";
                }
            }
        ?>
            <div class="card">
                <div class="card-block">
                    <h1 style="text-align: center"><i class="fa fa-bars"></i>&nbsp;Seller Menu</h1>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" style="background-color: rgb(180,255,236)">
                                <div class="card-block" align="center">
                                    <button class="btn btn-outline-primary btn-lg" data-toggle="collapse"
                                            data-target="#myAcc" aria-expanded="false" aria-controls="collapseExample">
                                        My Account
                                    </button>
                                    <button class="btn btn-outline-primary btn-lg" data-toggle="collapse"
                                            data-target="#myOrders" aria-expanded="false"
                                            aria-controls="collapseExample">Manage Orders
                                    </button>
                                    <button class="btn btn-outline-primary btn-lg" data-toggle="collapse"
                                            data-target="#myProduct" aria-expanded="false"
                                            aria-controls="collapseExample">Manage Product
                                    </button>
                                    <div class="collapse" id="myAcc" style="padding-top: 10px">
                                        <div class="card card-block">
                                            <?php
                                            $userid = $_SESSION['userid'];
                                            $sql = "SELECT * FROM users WHERE userid = $userid";

                                            $query = mysqli_query($con, $sql);
                                            $row = mysqli_fetch_array($query);
                                            $fullname = $row['userfullname'];
                                            $address = $row['useraddress'];
                                            $phone = $row['usertel'];

                                            echo " 
                                            <div class='col-lg-6'>
                                              <b>Name:</b>
                                            </div>
                                             <div class='col-lg-6'>
                                              $fullname
                                            </div>
                                            <div class='col-lg-6'>
                                              <b>Address:</b>
                                             </div>
                                             <div class='col-lg-6'>
                                                $address 
                                             </div>
                                             <div class='col-lg-6'>
                                               <b>Phone Number:</b> 
                                            </div>
                                            <div class='col-lg-6'>
                                                $phone
                                            </div>
                                            <br/>
                                            <div class='col-lg-6'>
                                                <button class='btn btn-info'>Update Account</button>
                                            </div>
                                      
                                            "
                                            ?>
                                        </div>
                                    </div>
                                    <div class="collapse" id="myOrders" style="padding-top: 10px">
                                        <div class="card card-block">
                                            <?php
                                                $userid = "1";
                                                $sqlCustOrders = "SELECT orders.ordersdate,orders.ordersid,orders.orderstatus,orders.paymentproof,ordersdetail.quantity as itemQuantity, item.itemname as itemName
                                                FROM orders 
                                                JOIN ordersdetail
                                                ON orders.ordersid = ordersdetail.detailid
                                                JOIN item
                                                ON ordersdetail.itemid = item.itemid
                                                JOIN users
                                                ON item.userid = users.userid
                                                WHERE users.userid = $userid";
                                                $queryCustOrders = mysqli_query($con, $sqlCustOrders);
                                                echo"<table class='table table-bordered table-responsive'>
                                                    <thead align='left'>
                                                    <tr>
                                                        <th>Order ID</th> 
                                                        <th>Order Date</th>
                                                        <th>Item Name</th>
                                                        <th>Quantity</th>
                                                        <th>Payment Status</th>
                                                        <th>View Receipt</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody>";
                                                while($row = mysqli_fetch_array($queryCustOrders)){
                                                    $ordersId = $row['ordersid'];
                                                    $ordersDate = $row['ordersdate'];
                                                    $orderStatus = $row['orderstatus'];
                                                    $orderReceipt = $row['paymentproof'];
                                                    $itemName = $row['itemName'];
                                                    $itemQuantity = $row['itemQuantity'];
                                                    echo"   <tr>
                                                            <td>$ordersId</td>
                                                            <td>$ordersDate</td>
                                                            <td>$itemName</td>
                                                            <td>$itemQuantity</td>
                                                            <td>$orderStatus</td>
                                                            <td>receipt</td>";
                                                    
                                                        
            
                                                }
                                                echo"
                                                        </tr>
                                                        </tbody>
                                                        </table>";

                                            ?>
                                        </div>
                                    </div>
                                    <div class="collapse" id="myProduct" style="padding-top: 10px">
                                        <div class="card card-block">
                                            <?php
                                                
                                                $sql2 = "SELECT * FROM item WHERE userid = $userid";
                                                $query2 = mysqli_query($con, $sql2);
                                            
                                                echo " 
                                                <form method='post' action='sellerMenu_ps.php'>
                                                    <table class='table table-hover'>
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Product Name</th>
                                                                <th>Price</th>
                                                                <th>Status</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                ";
                                                $index = 1;
                                                while($rowItem = mysqli_fetch_array($query2)){
                                                    $itemId = $rowItem['itemid'];
                                                    $itemName = $rowItem['itemname'];
                                                    $itemPrice = $rowItem['itemprice'];
                                                    $itemStatus = $rowItem['itemstatus'];
                                                    
                                                    echo 
                                                    " <tr>
                                                        <th scope='row'>$index</th>
                                                        <td>$itemName</td>
                                                        <td>
                                                            <input name='price' id='price-$itemId' class='form-control' value='$itemPrice' disabled>
                                                        </td>
                                                        
                                                    ";
                                                    if($itemStatus=="Available") {
                                                        echo "
                                                            <td>
                                                                <select class='custom-select mb-2 mr-sm-2 mb-sm-0' id='availability-$itemId' name='availability' disabled>
                                                                    <option value='Available' selected>Available</option>
                                                                    <option value='Unavailable'>Not Available</option>
                                                                </select>
                                                            </td>";
                                                    } else {
                                                        echo "
                                                            <td>
                                                                <select class='custom-select mb-2 mr-sm-2 mb-sm-0' id='availability-$itemId' name='availability' disabled>
                                                                    <option value='Available' >Available</option>
                                                                    <option value='Unavailable' selected>Not Available</option>
                                                                </select>
                                                            </td>
                                                        ";
                                                    }
                                                    
                                                           
                                                        echo "  
                                                                <td>
                                                                    <button type='button' class='btn btn-primary' id='editItemButton-$itemId' onClick={editItem($itemId)} >Edit</button>
                                                                    <button type='button' class='btn btn-danger' id='cancelEditItemButton-$itemId' onClick={cancelEditItem($itemId)} hidden>Cancel</button>
                                                                </td>
                                                            ";
                        
                                                    $index++;
                                                }
                                                
                                                echo "
                                                                </tr>   
                                                            </tbody>
                                                        </table>
                                                    <form>
                                                ";
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>