<section class="notification">
    <?php

    if(Notify::getSuccess() != null){
        ?>
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong><br /><?php echo Notify::getSuccess();  ?>
        </div>
        <?php
    }

    if(Notify::getError() != null){
        ?>
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong><br /> <?php echo Notify::getError(); ?>
        </div>
        <?php
    }

    if(Notify::getInfo() != null){
        ?>
        <div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Information!</strong><br /> <?php echo Notify::getInfo(); ?>
        </div>
        <?php
    }
    Notify::clearNotify()

    ?>
</section>