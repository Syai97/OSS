<div class="container">
    <div class="row" style="padding-top: 50px">
        <div class="col-lg-12" align="center">
            <div class="col-lg-6">
                <div class="card">
                   <div class="card-block">
                      <h4><i class="fa fa-upload"></i>&nbsp;Upload Payment Proof</h4>
                       <form class="form-inline" style="padding-top: 10px" method="post" action="itemPayment_ps.php" enctype="multipart/form-data">
                           <input type="file" class="form-control" name="payment">&nbsp;&nbsp;&nbsp;
                           <input type="hidden" name="ordersid" value="<?php echo $_GET['od'] ?>">
                           <button type="submit" name="payProof" class="btn btn-primary"><i class="fa fa-upload"></i>&nbsp;Upload</button>
                       </form>
                       <br/>
                       <button class="btn btn-danger" onclick="location.href = 'index.php';">Pay Later</button>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>