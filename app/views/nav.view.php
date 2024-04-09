
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparentd">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1 class="text-light"><a href="<?php echo ROOT?>"><span>FARMER EXPORTER LINKAGE</span></a></h1>
             
                <!-- <a href="index.html"><img src="<?php echo ROOT ?>/assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar fw-bold ms-auto me-md-4">
                <ul>
                    <li><a class="active " href="<?php echo ROOT ?>">Home</a></li>
                   <!-- <li><a href="#about">About</a></li>-->
                   <!-- <li><a href="<php echo ROOT ?>/services">Services</a></li> -->
                    <li><a href="<?php echo ROOT ?>">Team</a></li>
                    <li><a href="<?php echo ROOT?>shop">Shop</a></li>   
                    <li><a href="<?php echo ROOT ?>/contact">Contact Us</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
 

            <?php if(Auth::logged_in()):?>
    
                <div class="btn-group">
                    <div class=" btn-secondary btn-smdropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="text-light fw-bold"><?php echo esc(Auth::getUsername()) ?></span>
                    </div>
                    <ul class="dropdown-menu mt-3  dropdown-menu-end " >
                     
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-item"><i class="bi bi-house-door text-warning pe-3"></i> <a href="<?php echo ROOT?>/dashboard">Dashboard</a></div>

                        <div class="dropdown-item"><i class="bi bi-person text-warning  pe-3"></i> <a href="<?php echo ROOT ?>/profile">Account Info</a></div>
                        <div class="dropdown-divider"></div>
                       
                        <div class="dropdown-item"><i class="bi bi-box-arrow-right text-warning pe-3"></i> <a href="<?php echo ROOT?>logout">Sign Out</a></div>
                    </ul>
                </div>
            <?php else: ?>
            
                <span class="text-light "><a class="fw-bold " href="login"><i class="bi bi-lock pe-1"></i>Login</a></span>
            <?php endif; ?>

            
          

        </div>
    </header><!-- End Header -->




