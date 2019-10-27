<?php

require_once("../Model/init.php");

if(!Auth::isAuth()){
    header("Location: ../view/login.php");
}

if(!isset($_GET["EID"])){
    header("Location: ../view/events.php");
}else{
    $e = Event::getEventById($_GET["EID"]);
    if($e == null){
        header("Location: ../view/events.php");
        exit();
    }

}


require_once("../includes/header.php");
require_once ("../includes/admnav.php");
require_once("../includes/notification.php");
?>

    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <!--<div class="bg-light col-md-12 card py-2 editEvent">-->

                    <div class="card-body col-md-8 mx-auto">
                        <form class="card bg-light" action="../Controller/eventcontroller.php" method="post" enctype="multipart/form-data">
                            <div class="card-header bg-success text-center text-light">
                                <h3>Edit Event Details</h3>
                            </div>

                            <input type="hidden" name="id" value="<?php echo $e["id"]; ?>">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="<?php echo $e["name"]; ?>" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" name="type" value="<?php echo $e["type"]; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="" cols="30" rows="4" class="form-control"><?php echo $e["description"]; ?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" value="<?php echo $e["date"]; ?>" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Venue</label>
                                    <input type="text" name="venue" value="<?php echo $e["venue"]; ?>" class="form-control">
                                </div>

                                 
                                <div class="form-group">
                                    <label>Image</label>
                                    <img style="height:100px; width:180px;" src="../images/<?php echo $e["image"]; ?>" alt="" class="d-block ">
                                    <input type="file" name="image" class="form-control" >
                                </div>


                                <div class="card-footer form-group text-center">
                                    <input type="submit" class="btn btn-success" value="Update" name="updateevent">
                                </div>
                            </div>
                        </form>


                    </div>
                
            </div>
        </div>
    </section>
