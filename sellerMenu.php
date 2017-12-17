<div class="container">
    <div class="row" style="padding-top: 50px">
        <div class="col-lg-12">
        <?php 
            if(isset($_GET['message'])){
                if($_GET['message'] == 'true'){
                    echo "
                    <div id='alertMsg' class='alert alert-success' align='center'>
                        Item Successfully Updated.
                    </div> 
                    ";
                }
                else{
                    echo "
                    <div  id='alertMsg' class='alert alert-danger' align='center'>
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
                                                <button class='btn btn-info' onclick='location.href = \"index.php?page=updateAccount\" '>Update Account</button>
                                            </div>
                                      
                                            "
                                            ?>
                                        </div>
                                    </div>
                                    <div class="collapse" id="myOrders" style="padding-top: 10px">
                                        <div class="card card-block">
                                            <?php
                                                $userid = $_SESSION['userid'];
                                                $sqlCustOrders = 
                                                "SELECT orders.ordersid,orders.userid buyerid,users.username,users.useraddress,users.usertel,orders.ordersdate,orders.orderstatus,orders.paymentproof,ordersdetail.itemid,item.itemname as itemName,ordersdetail.quantity as itemQuantity,ordersdetail.detailid,item.userid
                                                    FROM orders 
                                                    JOIN users 
                                                    ON users.userid = orders.userid 
                                                    JOIN ordersdetail 
                                                    ON orders.ordersid = ordersdetail.ordersid 
                                                    JOIN item 
                                                    ON ordersdetail.itemid = item.itemid
                                                    WHERE item.userid = $userid
                                                    ORDER BY orders.ordersid";
                                                $queryCustOrders = mysqli_query($con, $sqlCustOrders);
                                                echo"<table class='table table-bordered table-responsive'>
                                                    <thead align='left'>
                                                    <tr>
                                                        <th>Order ID</th> 
                                                        <th>Order Date</th>
                                                        <th>Item Name</th>
                                                        <th>Quantity</th>
                                                        <th>Payment Status</th>
                                                        <th>Buyer Username</th>
                                                        <th>View Payment Slip</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody>";
                                                $indexOrderTable = 1;
                                                $prevItemId = null;
                                                $sameOrderFlag = false;
                                                while($row = mysqli_fetch_array($queryCustOrders)){
                                                    $ordersId = $row['ordersid'];
                                                    $ordersDate = $row['ordersdate'];
                                                    $orderStatus = $row['orderstatus'];
                                                    $orderReceipt = $row['paymentproof'];
                                                    $itemName = $row['itemName'];
                                                    $itemQuantity = $row['itemQuantity'];
                                                    //query customer info based on orders number
                                                    $sqlfetchCustInfo = "SELECT users.userid,users.username,users.userfullname,users.usertel,users.useraddress,orders.ordersid
                                                    FROM users
                                                    JOIN orders
                                                    ON orders.userid = users.userid
                                                    WHERE orders.ordersid = $ordersId LIMIT 1";
                                                    $queryCustInfo = mysqli_query($con,$sqlfetchCustInfo);
                                                    $rowCustInfo = mysqli_fetch_array($queryCustInfo);
                                                    $custId = $rowCustInfo['userid'];
                                                    $custUsername = $rowCustInfo['username'];
                                                    $custFullname = $rowCustInfo['userfullname'];
                                                    $custTel = $rowCustInfo['usertel'];
                                                    $custAddress = $rowCustInfo['useraddress'];
                                            
                                                    if($prevItemId == null){
                                                         $prevItemId = $ordersId;
                                                         $sameOrderFlag = false;
                                                    } else if ($prevItemId == $ordersId){
                                                         $sameOrderFlag = true;
                                                    } else {
                                                         $sameOrderFlag = false;
                                                    }
                                                    
                                                    echo" <tr class='border-top 0px;'>";
                                                    if($sameOrderFlag == true){
                                                        echo "
                                                        <td colspan='2'></td>
                                                        <td>$itemName</td>
                                                        <td>$itemQuantity</td>
                                                        <td colspan='3'></td>";

                                                    }
                                                    else if($sameOrderFlag == false){
                                                        echo "
                                                    
                                                            <td>$ordersId</td>
                                                            <td>$ordersDate</td>
                                                            <td>$itemName</td>
                                                            <td>$itemQuantity</td>
                                                            <td>$orderStatus</td>
                                                            <td>
                                                                <button type='button' class='btn btn-link' data-toggle='popover' data-placement='right' data-html='true' title='Customer Informations' 
                                                                data-content='
                                                                    UserId : $custId</br> 
                                                                    Username : $custUsername</br>
                                                                    Full Name : $custFullname</br>
                                                                    Telephone Number : $custTel</br>
                                                                    Address : $custAddress</br>
                                                                    '>
                                                                    $custUsername
                                                                </button>
                                                            </td>
                                                            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal$indexOrderTable'>View Receipt</button></td>
                                                            
                                                            <div id='myModal$indexOrderTable' class='modal fade' tabindex='$indexOrderTable' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                                            <div class='modal-dialog'>
                                                              <div class='modal-content'>
                                                                  <div class='modal-body'>
                                                                      <img src='$orderReceipt' width='250' height='250' class='img-responsive'>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                          </div>";
                                                    
                                                        $prevItemId = $ordersId;
                                                        $sameOrderFlag = false;
                                                        $indexOrderTable++;
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
                                                    </form>
                                                ";

                                               echo "<button type='button' class='btn btn-primary btn-lg btn-block' data-toggle='modal' data-target='#exampleModal'>Add Item</button>";
                                            ?>
                                               
                                               <!-- Modal add item -->
                                               <form  method='post' action='sellerMenu_ps.php' enctype='multipart/form-data'>
                                                    <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                        <div class='modal-dialog' role='document'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h5 class='modal-title' id='exampleModalLabel'>Add Item</h5>
                                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                        <span aria-hidden='true'>&times;</span>
                                                                    </button>
                                                                </div>
                                                            
                                                            <div class='modal-body'>
                                                                <div class='form-group'>
                                                                    <label for='addItemName'>Item Name</label>
                                                                    <input type='text' class='form-control' name='addItemName' id='addItemName'>
                                                                </div>
                                                                <label for='addItemPrice'>Item Price</label>
                                                                <div class='input-group mb-2 mr-sm-2 mb-sm-0'>
                                                                    <div class='input-group-addon'>RM</div>
                                                                    <input type='text' class='form-control' name='addItemPrice' id='addItemPrice' placeholder='eg. 10.00'>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <label for='addItemPicture'>Item Picture</label>
                                                                    <input type='file' class='form-control-file' name='addItemPicture'>
                                                                </div>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                                <button name="addItem" type='submit' class='btn btn-primary'>Confirm</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            
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
</div>