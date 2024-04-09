

<nav class="navbar navbar1 fixed-top nav-color pt-1 ">
        <div class="container   ">
           <div>
                <a class="navbar-brand" href="<?php echo ROOT?>">FARMER EXPORTER LINKAGE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="">ll</span>
                </button>
            </div>


            <div class="btn-group">
                    <div class="d-flex btn-secondary btn-smdropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    
                        <span class="  fw-bold text-light text-center">hi, <?php echo esc(Auth::getUsername())?><i class="bi bi-eye px-2"></i></span>
                    </div>

                    <ul class="dropdown-menu mt-3  dropdown-menu-end ">
                        <div class="text-center  fw-bold my-2">
                            <?php echo Auth::getEmail() ?>
                        </div>
                        <div class="dropdown-divider"></div>
                       <!-- <div class="dropdown-item "><i class="bi bi-gear pe-3"></i> <a href="<php echo ROOT ?>/dashboard/profile">Setting</a> </div>-->

                        <div class="dropdown-item"><i class="bi bi-house-door  pe-3"></i> <a href="<?php echo ROOT ?>">Home</a></div>

                       <!-- <div class="dropdown-item"><i class="bi bi-person  pe-3"></i> <a href="<php echo ROOT ?>/dashboard/profile">Profile</a></div>-->
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-item"><i class="bi bi-box-arrow-right  pe-3"></i>  <a href="<?php echo ROOT ?>/logout">Sign Out</a></div>
                    </ul>
                </div>




            <div class="offcanvas mt-0 offcanvas-start side-nav nav-color" tabindex="-1" id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header pb-0">
                    <div class="text-muted fw-bold mx-4" id="offcanvasNavbarLabel ">Core</div>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body pt-0  ">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 fw-bold">
                        <?php if(Auth::user_can('view_dashboard')):?>
                        <li class="nav-item  mx-5" >
                            <a class="nav-link active " aria-current="page" href="<?php echo ROOT?>/dashboard"><i
                                    class="bi bi-speedometer2 pe-2 text-warning"></i>Dashboard</a>
                        </li>
                        <?php endif;?>
                        <?php if(Auth::user_can('view_user')):?>
                     <div style="border-top: solid white;"></div>
 
                        <li class="nav-item  mx-5" >
                            <a class="nav-link active" aria-current="page" href="<?php echo ROOT ?>/dashboard/users"><i
                                    class="bi bi-people pe-3 text-warning"></i>Users</a>
                        </li>
                        <?php endif?>
                        <?php if(Auth::user_can('view_category')):?>
                        <div style="border-top: solid white;"></div>
                        <li class="nav-item  mx-5" >
                            <a class="nav-link active" aria-current="page" href="<?php echo ROOT ?>/dashboard/categories"><i
                                    class="bi bi-map pe-3 text-warning"></i>Counties</a>
                        </li>
                        <?php endif;?>
                        <div style="border-top: solid white;"></div>
                         <?php if(Auth::user_can('view_product')):?>
                        <li class="nav-item  mx-5" >
                            <a class="nav-link active" aria-current="page" href="<?php echo ROOT ?>/dashboard/products"><i
                                    class="bi bi-boxes pe-3 text-warning"></i>Products</a>
                        </li>
                        <?php endif;?>
                        <?php if(Auth::user_can('view_role')):?>
                        <div style="border-top: solid white;"></div>
                        <li class="nav-item  mx-5" >
                            <a class="nav-link active" aria-current="page" href="<?php echo ROOT ?>/dashboard/roles">
                                 <i class="bi bi-pen pe-3 text-warning"></i>Roles</a>
                        </li>
                        <div style="border-top: solid white;"></div>
                         <?php endif;?>
                        <?php if(Auth::user_can('view_order')):?>
                        <li class="nav-item  mx-5" >
                            <a class="nav-link active" aria-current="page" href="<?php echo ROOT?>/dashboard/orders">
                                 <i class="bi bi-bell pe-3 text-warning"></i>Notifications</a>
                        </li>
                        <?php endif; ?>
                        <?php if(Auth::user_can('view_about')):?>
                         <!-- <div style="border-top: solid white;"></div>
                        <li class="nav-item  mx-5" >
                            <a class="nav-link active" aria-current="page" href="<?php echo ROOT?>/dashboard/about"><i
                                    class="bi bi-broadcast pe-3 text-warning"></i>About</a>
                        </li> -->
                        <div style="border-top: solid white;"></div>
                        <?php endif; ?>
                        <li class="nav-item  mx-4 " >
                            <div class="text-muted  ms-start">PAGES</div>
                        </li>
                        <!-- <div style="border-top: solid white;"></div>
                        <li class="nav-item  mx-5">
                            <a class="nav-link active " aria-current="page" href="#"><i
                                    class="bi bi-person-fill pe-3 text-warning"></i>Profile</a>
                        </li> -->
                        <div style="border-top: solid white;"></div>
                        <li class="nav-item  mx-5">
                            <a class="nav-link active " aria-current="page" href="<?php echo ROOT?>">
                                 <i class="bi bi-house-door pe-3 text-warning"></i>Home</a>
                        </li>  
                        <div style="border-top: solid white;"></div>
                        <li class="nav-item  mx-5">
                            <a class="nav-link active " aria-current="page" href="<?php echo ROOT?>/logout">
                                 <i class="bi bi-box-arrow-right pe-3 text-warning"></i>LogOut</a>
                        </li>                    
                           

                    </ul>

                </div>
            </div>

        </div>
    </nav>

    <!--MAIN-->
    <main class="container mt-5 pt-1 ">