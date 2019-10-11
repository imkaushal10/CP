<?php

require_once("../Model/init.php");

if(!Auth::isAuth()){
    header("Location: ../view/login.php");
}

$event = Event::getAllevents();

require_once("../includes/header.php");
require_once ("../includes/admnav.php");
require_once("../includes/notification.php");
?> 


<div class="container mt-5 mb-5">
            <div class="row">
                    <div class="col-lg-12">
                        <form class="card bg-light" action="../Controller/eventcontroller.php" method="post" enctype="multipart/form-data">
                            <div class="card-header bg-success text-center text-light">
                                <h3>Add New Event</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Enter event name" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Event type</label>
                                    <input name="type" class="form-control" placeholder="Enter event type">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="" cols="30" rows="4" class="form-control" placeholder="Enter event description"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label>Date</label>
                                    <input name="date" type="date" id="" class="form-control" placeholder="Enter event date">                                
                                </div>
                                
                                <div class="form-group">
                                    <label>Venue</label>
                                    <input name="venue" type="text" class="form-control" placeholder="Enter event venue">
                                </div>


                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" >
                                </div>


                                <div class="card-footer form-group text-center">
                                    <input type="submit" class="btn btn-success" value="Add Event" name="addevent">
                                </div>
                            </div>
                        </form>


                    </div>
                
         </div>
</div>
   