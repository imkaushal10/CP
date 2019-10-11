<?php

require_once("../Model/init.php");

/*if(!Auth::isAuth()){
    header("Location: ../view/login.php");
}*/

$contacts = Contact::getAllcontactmessage();

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
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="card-body text-center">
                        <?php
                        $i =1;
                        if($contacts->num_rows > 0){
                            foreach($contacts as $c){
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    
                                    <td><?php echo $c["name"]; ?></td>
                                    <td><?php echo $c["email"]; ?></td>
                                    <td><?php echo $c["subject"]; ?></td>
                                    <td><?php echo $c["message"]; ?></td>

                                    <td>
<!--                                        <a href="updateevent.php?EID=<?php echo $e["id"]; ?>" class="btn btn-success btn-sm m-1" ><i class="fa fa-pencil-alt"></i></a>-->
                                    
                                        <form action="../Controller/contactcontroller.php" method="post"> 
                                        <input type="hidden" name="DeleteContactmessage" value="<?php echo $c["id"]; ?>">
                                        <button type="submit" name="DeleteContactmessage" value= "<?php echo $c["id"]; ?>"class="btn btn-danger btn-sm delete_message m-1"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $i++;

                            }
                        }else{
                            ?>
                            <tr><td colspan="9" class="text-center text-danger">No Messages Found</td></tr>
                            <?php

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
</section>
  