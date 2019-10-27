
<nav class="container-fluid ">

    <div class="bg-dark">
     <h1 class="text-white text-center">ADMIN DASHBOARD</h1> 
    </div>    
    <div class="navbar navbar-expand-md bg-primary navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand brand" href="../view/events.php">SEMS</a>
            <!--<form action="../Controller/eventcontroller.php" class="from form-inline">
                <div class="form-row ml-md-auto">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                    <button class="btn bg-light" name="search" ><span class="fa fa-fw fa-search"></span></button>
                </div>
            </form>-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="events.php"><span class="fa fa-fw fa-plus"></span>ADD EVENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admviewevent.php"><span class="fa fa-fw fa-list"></span>VIEW EVENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admviewusers.php"><span class="fa fa-fw fa-list"></span>VIEW USER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admviewmessage.php"><span class="fa fa-fw fa-list"></span>VIEW CONTACTED MESSAGES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admuserregisteredinevent.php"><span class="fa fa-fw fa-list"></span>VIEW USERS REQUEST</a>
                    </li>
                    <li>
                    <a href="../Controller/logout.php" name="logout" class="btn btn-danger btn-hover ml-5"><span class="fa fa-fw fa-power-off"></span>LOGOUT</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

</nav>
