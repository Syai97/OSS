<div class="container">
    <div class="row" style="padding-top: 50px">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-block">
              <?php

                include ("config/db.php");
                $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

                if(isset($_GET['itemId'])){
                  $itemid = secure_input($con, $_GET['itemId']);

                  $sql = "SELECT * FROM item i JOIN img im ON i.itemid=im.itemid JOIN users u ON 
                          u.userid = i.userid WHERE i.itemid='$itemid'";
                  $query = mysqli_query($con, $sql);

                  $row = mysqli_fetch_array($query);
                  $itemname = $row['itemname'];
                  $itemprice = $row['itemprice'];
                  $itemstatus = $row['itemstatus'];
                  $itemImage = $row['path'];
                  $sellername = $row['userfullname'];
                  
                }

                echo"
                <h1 class=\"text-center\">$itemname</h1>
                <div class='row' style=\"padding-top: 30px;padding-bottom: 30px;\">
                    <div class=\"col-lg-4\" >
                    <img src=\"$itemImage\" class=\"img-thumbnail\">
                    </div>
                    <div class=\"col-lg-8\">
                     <p style=\"font-size: 20px !important;\"><b>Item Name: </b> $itemname</p>
                     <p style=\"font-size: 20px !important;\"><b>Item Price: RM</b> $itemprice</p>
                     <p style=\"font-size: 20px !important;\"><b>Item Status: </b> $itemstatus</p>
                     <p style=\"font-size: 20px !important;\"><b>Sold By: </b> $sellername</p>";
                if($_SESSION['ucid'] == '2' && $itemstatus == 'Available' ){
                    echo "
                    <form method=\"post\" action=\"cart_update.php\">
                        <input type=\"number\" size=\"2\" class=\"form-control\" maxlength=\"2\" name=\"qty\" value=\"1\" onkeypress=\"return isNumber(event)\"/>
                        <input type=\"hidden\" name=\"itemid\" value=\"$itemid\" />
                        <input type=\"hidden\" name=\"type\" value=\"add\" />
                        <input type=\"hidden\" name=\"return_url\" value=\"{$current_url}\" />
                        <br/>
                        <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i>&nbsp;Add To Cart</button>
                        <button type=\"button\" class=\"btn btn-danger\" onclick=\"location.href = 'index.php';\">Back</button>
                    </form>
                    ";
                }
                else{
                    echo"
                    <button type=\"button\" class=\"btn btn-danger\" onclick=\"location.href = 'index.php';\">Back</button>";
                    
               }
               
               echo"</div>
                </div>
                ";

              ?>
                  
              </div>
            </div>
        </div>
    </div>
</div>