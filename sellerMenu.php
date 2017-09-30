<div class="container">
    <div class="row" style="padding-top: 50px">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    <h1 style="text-align: center"><i class="fa fa-bars"></i>&nbsp;Customer Menu</h1>

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
                                                $userid = $_SESSION['userid'];
                                                $sql = "select ordersid, ordersdate, orderstatus from orders  where userid = $userid";
                                                $query = mysqli_query($con, $sql);
                                                echo"<table class='table table-bordered table-responsive'>
                                                    <thead align='left'>
                                                    <tr>
                                                        <th>Order ID</th> 
                                                        <th>Order Date</th>
                                                        <th>Order Status</th>
                                                        <th>Payment Status</th>
                                                        <th>View Receipt</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>";
                                                while($row = mysqli_fetch_array($query)){
                                                    $ordersid = $row['ordersid'];
                                                    $ordersdate = $row['ordersdate'];
                                                    $orderstatus = $row['orderstatus'];

                                                    echo"   <tr>
                                                            <td>$ordersid</td>
                                                            <td>$ordersdate</td>
                                                            <td>$orderstatus</td>";
                                                    if($orderstatus != 'Paid'){
                                                        echo"   <td style='padding-top: 10px'>
                                                                    <form method='post' action='MakePayment.php' class='form-group'>
                                                                    <input type='hidden' name='userid' value='$userid'>
                                                                    <input type='hidden' name='ordersid' value='$ordersid'>
                                                                    <button type='submit' class='btn btn-primary' name='submit'>Make Payment</button>
                                                                    </form>
                                                                </td>";
                                                    }
                                                    else{
                                                        echo"<td>Already Paid</td>";
                                                    }

                                                    if($orderstatus == 'Paid') {
                                                        echo "  <td style='padding-top: 10px'>
                                                                    <form method='post' action='receipt2.php' class='form-group'>
                                                                    <input type='hidden' name='ordersid' value='$ordersid'>
                                                                    <input type='hidden' name='userid' value='$userid'>
                                                                    <button type='submit' class='btn btn-primary' name='submit'>View</button>
                                                                    </form>
                                                                </td>";
                                                    }
                                                    else{
                                                        echo"<td>Please Make Payment For Receipt To Be Generated</td>";
                                                    }
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
                                                    $itemName = $rowItem['itemname'];
                                                    $itemPrice = $rowItem['itemprice'];
                                                    $itemStatus = $rowItem['itemstatus'];
                                                    
                                                    echo 
                                                    " <tr>
                                                        <th scope='row'>$index</th>
                                                        <td>$itemName</td>
                                                        <td><input name='price' id='price-$index' class='form-control' value='$itemPrice' disabled></td>
                                                        
                                                    ";
                                                    echo "
                                                        <td>
                                                            <div class='dropdown'>
                                                                <button class='btn btn-secondary dropdown-toggle disabled' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                                    $itemStatus
                                                                </button>
                                                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                                                    <a class='dropdown-item' href='#'>Available</a>
                                                                    <a class='dropdown-item' href='#'>Unavailable</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    ";
                                                    

                                                    echo "  <td>
                                                                <button class='btn btn-primary' type='submit' onclick= 'editItem(price-$index))'>Edit</button>
                                                            </td>
                                                    ";

                                                    $index++;
                                                }
                                                
                                                echo "
                                                            </tr>   
                                                        </tbody>
                                                    </table>
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