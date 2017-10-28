<?php
  $userid = $_SESSION['userid'];
  $sql = "SELECT * FROM users WHERE userid = $userid";
  $query = mysqli_query($con, $sql);

  $row = mysqli_fetch_array($query);

  $fullname = $row['userfullname'];
  $username = $row['username'];
  $phone = $row['usertel'];
  $address = $row['useraddress'];

?>

<div class="container">
    <div class="row" style="padding-top: 50px">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    <h1 class="text-center">My Account</h1>

                    <form method="POST" action="" style="padding-top: 20px;">
                        <div class="form-group row">
                            <label class="col-lg-4 text-right">Full Name</label>
                            <input type="text" name="fullname" id="" class="col-lg-4 form-control" value="<?php echo $fullname;?>" disabled>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 text-right">User Name</label>
                            <input type="text" name="username" id="" class="col-lg-4 form-control" value="<?php echo $username;?>" disabled>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 text-right">Address</label>
                            <textarea name="address" id="address" class="form-control col-lg-4"><?php echo $address;?></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 text-right">Phone Number</label>
                            <input type="text" name="phonenum" id="" class="col-lg-4 form-control" value="<?php echo $phone;?>">
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 text-right">Password</label>
                            <input type="text" name="password" id="" class="col-lg-4 form-control">
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 text-right">Confirm Password</label>
                            <input type="text" name="confirmPass" id="" class="col-lg-4 form-control">
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-warning">Reset</button>

                                <?php

                                   if($_SESSION['ucid'] == 1){
                                       $back = "<button type=\"button\" class=\"btn btn-danger\" onclick='location.href = \"index.php?page=sellerMenu\"'>Back</button>";
                                   }
                                   else if($_SESSION['ucid'] == 2){
                                       $back = " <button type=\"button\" class=\"btn btn-danger\" onclick='location.href = \"index.php?page=custMenu\"'>Back</button>";
                                   }

                                   echo $back;
                                ?>

                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>