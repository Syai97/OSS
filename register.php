<?php
include 'header.php';
?>

<div class="container">
    <div class="col-lg-12" align="center" style="padding-top: 50px">
        <div class="card" align="center">
            <div class="card-block">
                <h1 style="padding: 20px"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;User Registration</h1>

                <form method="post" action="register_ps.php" class="col-lg-4">
                    <input type='text' name='name' class="form-control" id='name' minlength="5" maxlength="50" placeholder="Full Name" onkeypress="return isAlphabet(event)" required/><br/>
                    <input type='text' name='address' class="form-control" id='address' maxlength="50" placeholder="Address" required/><br/>
                    <input type='text' name='phonenum' class="form-control" id='phonenum' minlength="10" maxlength="11" placeholder="Phone Number" onkeypress="return isNumber(event)" required/><br/>
                    <input type='text' name='username' class="form-control" id='username' minlength="4" maxlength="50" placeholder="User Name" required/><br/>
                    <input type='password' class="form-control" name='password' id='password' minlength="6" maxlength="25" placeholder="Password" required/><br/>
                    <input type='password' class="form-control" name ='confirmpassword' id='confirmpassword' minlength="6" maxlength="25" placeholder="Confirm Password" required/>
                    <div class="accounttype" align="absolute">
                        <p>Select Account Type:</p>
                        <select name='acctype' class="form-control">
                            <option value="1">Seller</option>
                            <option value="2">Customer</option>
                        </select>
                    </div>
                    <br/>
                    <button class="btn btn-primary" type='submit' name='signup'><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Register</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>
