<?php

require_once("../Model/init.php");

require_once("../includes/header.php");
require_once ("../includes/nav.php");
require_once("../includes/notification.php");
?>

<section class="container-fluid ">
    
        
	<div class="container">
        <div class="row">
            <div class="col-lg-12">
		    <!--contact form-->
                <div>
                    <h4 class="text-center pt-2 pb-3 mt-5">Use following form to contact us. You can also provide feedback, report, and request through this form.For any queries related to us you can write it on the message section and send it to us.</h4>
              </div>    
                
                <form action="../Controller/contactcontroller.php" method="post" enctype="multipart/form-data" class="text-center border bg-secondary p-5 mb-5">
                    <div class="bg-info mb-4 p-2 text-white">
                    <h4>Contact us</h4>
                    </div>
                    <!-- Name -->
                    <input type="text"  name="name" class="form-control mb-4 text-center" placeholder="Full Name">

                    <!-- Email -->
                    <input type="email" name="email" class="form-control mb-4 text-center" placeholder="E-mail">

                    <!-- Subject -->
                    <label>Subject</label>
                    <select name="subject" class="browser-default custom-select mb-4">
                        <option value="1" selected>Feedback</option>
                        <option value="2">Report</option>
                        <option value="3">Feature request</option>
                    </select>

                    <!-- Message -->
                    <div class="form-group">
                        <textarea class="form-control rounded-0 text-center" rows="3" name="message" placeholder="Type a Message"></textarea>
                    </div>

                    <!-- Send button -->
                    <button class="btn btn-info btn-block" name="submitcontactinfo" type="submit">Send</button>

                </form>     

                <!--contact form-->
            </div>    
        </div>
    </div>
    
     <div class="text-center bg-light mt-5 p-2"> 
         <div class="bg-info text-white">
        <h2>Get Our Location</h2>
         </div>
		<iframe class="col-sm-12 border-dark" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18997.523976484586!2d-2.254027591638596!3d53.47399126323839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bb1c10a958cfb%3A0x32a74e52a1e4a198!2sCyber+X+UK!5e0!3m2!1sne!2snp!4v1555141722779!5m2!1sne!2snp" height="500px" frameborder="8" style="border:0" allowfullscreen></iframe>  	   
    </div>  
   
</section>

<?php include ('../includes/footer.php');?>