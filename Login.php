<?php
  include 'header.php';
?>

<div class="container">
    <?php
        if(isset($_GET['message'])){
            echo "
            <div class=\"row\" style=\"padding-bottom: 10px; padding-top: 10px\">
                <div class=\"col\" align=\"center\">
                    <div class=\"alert alert-success alert-dismissable\" id=\"mydiv\">
                        <strong>Successfully Registered</strong>
                    </div>
                </div>
            </div>";
        }
    ?>
    <div class="col-lg-12" align="center" style="padding-top: 50px">
        <div class="card" style="width: 50%" align="center">
            <div class="card-block">
                <h1><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;User Log In</h1>

                <form method="post" action="login_ps.php">
                    <div class="form-group">
                        <input type='text' name='username' id='username'  maxlength="50" placeholder="UserName" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <input type='password' name='password' id='password' maxlength="50" placeholder="Password" class="form-control" required/>
                    </div>
                    <button type='submit' class="btn btn-primary" name='login'><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Log In </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function(){$('.alert').alert('close')}, 1000);
</script>


<?php
include 'footer.php';
?>
