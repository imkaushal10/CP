<?php

require_once("../Model/init.php");

if(!Auth::isAuth()){
    header("Location: ../view/login.php");
}

$eventregister = Registerinevent::getAllRegistrationinEventByUser();
/*$event = new Event;*/
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
                            <th>Registered by</th>
                            <th>Event ID</th>
                            <th>Action</th>
        
                        </tr>
                        </thead>
                        <tbody class="card-body text-center">
                        <?php
                        $i =1;
                        if($eventregister->num_rows > 0){
                            foreach($eventregister as $er){
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    
                                    <td><?php echo $er["username"]; ?></td>
                                    <td><?php echo $er["event_id"]; ?></td>
                                    
                                    <td>
                                    
                                        <form action="../Controller/registrationinevent.php" method="post"> 
                                        <input type="hidden" name="deleteregistrationinevent" value="<?php echo $er["reginevent_id"]; ?>">
                                        <button type="submit" name="deleteregistrationinevent" value= "<?php echo $er["reginevent_id"]; ?>"class="btn btn-danger btn-sm delete_user m-1"><i class="fas fa-trash"></i></button>
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