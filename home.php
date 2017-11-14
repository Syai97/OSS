<div class="container" style="padding-top: 50px">
    <div class="jumbotron" style="background-color: #65c6e1">
        <div align="center" style="font-size: large;">
            <h1>Welcome</h1>
            <p>To The Most Diverse Shopping Website</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card" align="center">
                <div class="card-block">
                    <div>
                        <h4 class="card-title"><i class="fa fa-search"></i>&nbsp;Search By Item Name :</h4>
                        <form>
                            <input type="text" id="itemname" class="form-control col-lg-4" oninput="searchItem(this.value)">
                        </form>
                    </div>
                    <div id="searchItem" style="padding-top: 20px;">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="padding-top: 40px">
        <div class="col">
            <?php
            include("cart.php");
            ?>
        </div>
    </div>
    <?php
    $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    if (isset($_SESSION['ucid'])) {
        $category = $_SESSION['ucid'];
        if ($category == 1) {
            echo "
            <div class='row' style='padding-top: 50px'>
                 <div class='alert alert-danger col-lg-12' align='center'>
                    <p style='text-align: center;padding-top: 10px;'>Please Register As Customer To Buy Item.</p>
                 </div>
             </div>";
        }
    }
    ?>

    <div class="row" style="padding-top: 50px">
        <?php
        //        $_SESSION['ucid'] = 0;

        $query = "SELECT i.itemid, i.itemstatus, i.itemname, i.itemprice, i.userid, path FROM item i join img on img.itemid = i.itemid ORDER BY i.itemid ASC";
        $results = mysqli_query($con, $query);

        while ($items = mysqli_fetch_array($results)) {
            $path = $items['path'];
            $itemname = $items['itemname'];
            $itemprice = $items['itemprice'];
            $itemid = $items['itemid'];
            $itemstatus = $items['itemstatus'];
            $sellerid = $items['userid'];
            $status = "Available";

            if ($status == $itemstatus) {
                echo "
            <div class='col-lg-4' style='padding-top: 20px' id='$itemname-02$sellerid'>
              <div class=\"card\" style='border: solid 1px;'>
                <img class=\"card-img-top\" src=\"$path\" height='300px' style='padding: 8px;' align='center'>
                <div class=\"card-block\">
                  <h4 class=\"card-title\">$itemname</h4>
                  <p class=\"card-text\"><b>RM $itemprice</b></p>
                  
                  <form method=\"post\" action=\"cart_update.php\">
                   <input type=\"text\" size=\"2\" class='form-control' maxlength=\"2\" name=\"qty\" value=\"1\" onkeypress=\"return isNumber(event)\"/>
                    <input type=\"hidden\" name=\"itemid\" value=\"$itemid\" />
	                <input type=\"hidden\" name=\"type\" value=\"add\" />
	                <input type=\"hidden\" name=\"return_url\" value=\"{$current_url}\" />
	                <br/>
                    <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i>&nbsp;Add To Cart</button>
                    <button type=\"button\" class=\"btn btn-info\" onclick=\"location.href = 'index.php?page=itemInfo&itemId=$itemid';\"><i class=\"fa fa-plus\"></i>&nbsp;More Info</button>
                  </form>
                </div>
             </div> 
           </div>
            ";
            }
        }
        ?>

    </div>


</div>

