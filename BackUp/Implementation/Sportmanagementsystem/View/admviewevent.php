<?php

require_once("../Model/init.php");


$events = Event::getAllEvents();

require_once("../includes/header.php");
require_once ("../includes/admnav.php");
require_once("../includes/notification.php");
?>

 <section class="container-fluid mt-5 mb-5">
        <div class="row">
    
            <div class="bg-light col-md-12 table-sm table-responsive py-2">
                    <table class="table table-bordered table-hover servicesTable">
                        <thead class="thead-dark text-center">
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Image</th>
                            <th>Action</th>
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
                                        <a href="updateevent.php?EID=<?php echo $e["id"]; ?>" class="btn btn-success btn-sm m-1" ><i class="fa fa-pencil-alt"></i></a>
                                    
                                        <form action="../Controller/eventcontroller.php" method="post"> 
                                        <input type="hidden" name="DeleteEventId" value="<?php echo $e["id"]; ?>">
                                        <button type="submit" name="DeleteEventId" value= "<?php echo $e["id"]; ?>"class="btn btn-danger btn-sm delete_event m-1"><i class="fas fa-trash"></i></button>
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
  