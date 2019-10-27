<?php

require_once("../Model/init.php");

/*if(!Auth::isAuth()){
    header("Location: ../view/login.php");
}*/

/*$events = Event::getAllEvents();*/

require_once("../includes/header.php");
require_once ("../includes/nav.php");
require_once("../includes/notification.php");
?>

<section class="container-fluid ">
    
    <h3 class="text-center pt-5">Some of our photo collections regarding different sport events and related stadiums, framed <br>as a photo gallary.</h3>
      <div class="row" >
                <div class="col-sm text-center p-4 ">
                     <div class="card-header">
                  <img src="../images/cric.jpg" style="height:200px;" class="d-block  w-100"alt="dart">
                         <p><b>Cricket Stadium</b></p>
                         <p>Nottingham City - UK.</p>
                     </div>
                </div>
                <div class="col-sm text-center p-4 ">
                    <div class="card-header">
                        <img src="../images/stt.jpg" style="height:200px;" class="d-block w-100" alt="football">
                        <p><b>Emirates Stadium</b></p>
                        <p>London.</p>
                    </div>
                </div>
                <div class="col-sm text-center p-4 ">
                    <div class="card-header">
                        <img src="../images/d.jpg" style="height:200px;" class="d-block w-100"  alt="basketball">
                        <p><b>Baseball Stadium</b></p>
                        <p>North London.</p>
                    </div>
                </div>
           </div>
    
           <div class="row" >
                <div class="col-sm text-center p-4 ">
                     <div class="card-header">
                  <img src="../images/st.jpg" style="height:200px;" class="d-block  w-100"alt="dart">
                         <p><b>Sport Event innaguration day</b></p>
                         <p>London Stadium.</p>
                     </div>
                </div>
                <div class="col-sm text-center p-4">
                    <div class="card-header">
                        <img src="../images/moto.jpg" style="height:200px;" class="d-block w-100" alt="football">
                        <p><b>Moto Racing</b></p>
                        <p>During Moto Racing event</p>
                    </div>
                </div>
                <div class="col-sm text-center p-4 ">
                    <div class="card-header">
                        <img src="../images/bb.jpg" style="height:200px;" class="d-block w-100"  alt="basketball">
                        <p><b>Basketball</b></p>
                        <p>London Arena.</p>
                    </div>
                </div>
           </div>
           
           <div class="row" >
                <div class="col-sm text-center p-4 ">
                     <div class="card-header">
                  <img src="../images/cyc.jpg" style="height:200px;" class="d-block  w-100"alt="dart">
                         <p><b>Participants Cycling</b></p>
                         <p>During Cycling Event.</p>
                     </div>
                </div>
                <div class="col-sm text-center p-4 ">
                    <div class="card-header bg-light">
                        <img src="../images/f.jpg" style="height:200px;" class="d-block w-100" alt="football">
                        <p><b>Fans Spectating</b></p>
                        <p>During Soccer Match.</p>
                    </div>
                </div>
                <div class="col-sm text-center p-4 ">
                    <div class="card-header">
                        <img src="../images/seat.jpg" style="height:200px;" class="d-block w-100"  alt="basketball">
                        <p><b>Empty Seats to fe filled</b></p>
                        <p>Just before the Sport Event.</p>
                    </div>
                </div>
           </div>
    
    
</section>  
<?php include ('../includes/footer.php');?>