<div class="container">
    <div class="row" style="padding-top: 50px">
        <div class="col-lg-12">

            <?php
               if(isset($_GET['paySuccess'])){
                   if($_GET['paySuccess'] == '1'){
                       echo "
                       <div class='alert alert-success' align='center'>
                            You Have Successfully Paid For Your Item.
                            You Orders Will Be Notified To The Seller.
                            <a href='printreceipt.php'> Click Here To Print The Receipt</a>
                       </div> 
                       ";
                   }
                   else{
                       echo "
                       <div class='alert alert-danger' align='center'>
                            There Is An Error In Processing Your Payment.Please Contact User Support. 
                       </div> 
                       ";
                   }
               }
            ?>
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
                                            aria-controls="collapseExample">My Orders
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

                                                echo"<tr>
                                      <td>$ordersid</td>
                                      <td>$ordersdate</td>
                                      <td>$orderstatus</td>";
                                                if($orderstatus != 'Paid'){
                                                    echo" 
                                        <td style='padding-top: 10px'> 
                                           <button type='button' class='btn btn-primary' name='submit' onclick='location.href = \"index.php?page=itemPayment&od=$ordersid\"'>Make Payment</button>
                                        </td>";
                                                }
                                                else{
                                                    echo"<td>Already Paid</td>";
                                                }

                                                if($orderstatus == 'Paid') {
                                                    echo "<td style='padding-top: 10px'>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>