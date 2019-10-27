<?php

require_once("../Model/init.php");

/*if(!Auth::isAuth()){
    header("Location: ../view/login.php");
}*/

$events = null;

if(isset($_GET['search'])){
    $events = Event::searchEvent($_GET['valuetosearch']);
}else{
    $events = Event::getAllEvents();
}

require_once("../includes/header.php");
require_once ("../includes/nav.php");
require_once("../includes/notification.php");
?>


 <section class="container-fluid pt-5">

    <div class="row">
            <div class="col-md-12">
            <h4 class="text-center">Below is a tabular form of event details. Once go through this and if you have interest and would like to take part <br>in the particular sport event then don't hesisate to register yourself in that sport event. </h4>
            </div>
            <div class="form-row col-md-12 mt-5">
                    <form class="form form-inline" method="get">
                    <input type="text" class="form-control text-center" name="valuetosearch" placeholder="Event Name">
                    <button class="btn bg-success text-white" type="submit" name="search" >Search</button>
                   </form>
            </div>    
            <div class="bg-light col-md-12 table-sm table-responsive py-2">
                    <table class="table table-bordered table-hover servicesTable">
                        <thead class="thead-light text-center">
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Image</th>
                            <th>Register In Event</th>
                        </tr>
                        </thead>
                        <tbody class="card-body text-center">
                        <?php
                        $i =1;
                        if($events->num_rows > 0){
                            foreach($events as $e){
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    
                                    <td><?php echo $e["name"]; ?></td>
                                    <td><?php echo $e["type"]; ?></td>
                                    <td><?php echo $e["description"]; ?></td>
                                    <td><?php echo $e["date"]; ?></td>
                                    <td><?php echo $e["venue"]; ?></td>
                                    <td><img style="height:100px; width:180px;" src="../images/<?php echo $e["image"]; ?>" alt=""></td>

                                    <td>
                                        <!--<a href="updateevent.php?EID=" class="btn btn-success btn-sm m-1" ><i class="fa fa-pencil-alt"></i></a>-->
                                    
                                        <form class="form-group" action="../Controller/registrationinevent.php" method="post"> 
                                        <input name="id" value="<?php echo $e['id'] ; ?>" hidden/>
                                        
                                        <button type="submit" name="EventRegistrationConfirm" value= "<?php echo $e["id"]; ?>"class="btn btn-info form-control add_register_event m-1"><!--<i class="fas fa-trash"></i>-->Register</button>
                                            
                                        <button type="submit" name="EventRegistrationCancel" value= "<?php echo $e["id"]; ?>"class="btn btn-danger form-control delete_register_event m-1"><!--<i class="fas fa-trash"></i>-->Cancel</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $i++;

                            }
                        }else{
                            ?>
                            <tr><td colspan="9" class="text-center text-danger">No Events Found</td></tr>
                            <?php

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
</section>

<?php include ('../includes/footer.php');?>
  