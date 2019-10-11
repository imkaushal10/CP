<?php

require_once("../Model/init.php");
require_once("../includes/header.php");
require_once("../includes/notification.php");

?>

<div class="container-fluid vh-100 bg-dark">
	<div class="row mx-3">
        <div class="col-md-4 offset-md-4 bg-light card mt-5">
            <div class="text-center ">
                <h3>REGISTER</h3>
            </div>

             <form class="card-body" action="../Controller/registrationcontroller.php" method="POST" enctype="multipart/form-data">

                <div class="card-body">
                    
                    <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter your full name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                    <input type="email" name="email" placeholder="Enter your valid email" class="form-control">
                    </div>

                    <div class="form-group">
                     <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" class="form-control">
                    </div>


                    <div class="form-group">
                    <label>Confirm password</label>
                    <input type="password" name="cpassword" placeholder="Confirm your password" class="form-control">
                    </div>
                    
                    <div class="form-group">   
                    <input type="hidden" name="role" class="form-control">
                    </div>
                    

                </div>
             
                <div class="card-footer">
                <div class="form-group text-center">
                  <input type="submit" name="adduser" class="btn btn-primary"  value="Register">
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

//include_once("../includes/footer.php");
