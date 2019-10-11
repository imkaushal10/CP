
<nav class="container-fluid bg-secondary">
    <div class="row py-2">
        <div class="col-md-6">
            <p class="text-white"><i class="fas fa-phone"></i> +977-9846773221 |  <i class="far fa-envelope"></i> info@sems.com</p>
        </div>
    </div>

    <div class="navbar navbar-expand-md bg-dark navbar-right navbar-dark ">
        <div class="container-fluid">
            <img style="height:60px;width:70px;" src="../images/logo.png" alt="logo">
            <a class="navbar-brand brand" href="Index.php">Sport Event Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eventfrontview.php">EVENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallary.php">GALLARY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">CONTACT US</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="../images/HELP.pdf" target="_blank">HELP</a>
                    </li>

                    <?php
                        if(!isset($_SESSION["email"])){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">LOGIN</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../Controller/logout.php" id="log_out">LOGOUT</a>
                    </li>

                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    
</nav>