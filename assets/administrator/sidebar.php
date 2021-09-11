<div id="bs-canvas-left" class="bs-canvas bs-canvas-anim bs-canvas-left position-fixed bg-white h-100" style="z-index: 1049;">
        
    <header class="bs-canvas-header p-3"></header>

    <div class="bs-canvas-content px-3 py-5 text-muted ">

        <div class="1-cut d-block d-lg-none  container-fluid py-2 px-0">

            <div class="col text-right px-0 mr-0">
                
                <a class="text-dark" href="#"><i class="fas fa-cog"></i></a>

            </div>

        </div>

        <div class="1-cut d-block d-lg-none  container py-2">
            <div class="col text-center px-0">
                <img src="../storage/img/employee1.jpg" class="img-fluid rounded-circle" style="height:60px; width:60px;" alt="Avatar">
            </div>
        </div>

        <div class="1-cut d-block d-lg-none container border-bottom">
            <div class="col p-0  text-center">
                <a id="username_a" class="bs-canvas-close">
                    <h6 class="dropdown-header font-weight-bold pb-0" id="nav_user_username"><?php echo $_SESSION['usn']?></h6>
                </a>
                <label style="font-size:9pt;"><?php echo $_SESSION['usr']?></label>
            </div>
        </div>

        <div class="1-cut mt-4 mt-lg-0">

            <div class="d-flex justify-content-between align-items-center mt-2 mb-1 pl-2 text-dark font-weight-bold" style="font-size: 10pt;">
                
                <span>GENERAL</span>
            
            </div>

            <ul class="nav flex-column pl-1 py-1">
                <li class="nav-item">
                    
                    <a class="nav-link ld-nav-item text-dark py-1 "  style="font-size: 10pt;" id="btn_dashboard" aria-page="page_dashboard">
                        
                        <i class="far fa-sticky-note fa-fw mr-2" style="font-size: 13pt;"></i>

                        Monitoring 
                    </a>
                </li>

                <li class="nav-item">
                    
                    <a class="nav-link ld-nav-item text-dark py-1 "  style="font-size: 10pt;" id="btn_dashboard" aria-page="page_dashboard">
                        
                        <i class="far fa-sticky-note fa-fw mr-2" style="font-size: 13pt;"></i>

                        Monitoring 
                    </a>
                </li>
            </ul>

        </div>

    
        
    </div>

</div>
        
