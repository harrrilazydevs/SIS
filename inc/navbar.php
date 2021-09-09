
<nav class="navbar navbar-expand-md vw-100 bg-light shadow sticky-top" style="z-index:1050; ">

    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">

                <div class="bs-offset-main bs-canvas-anim ">

                    <a  class="btn pl-0 pr-2 pt-0 pb-0" data-toggle="canvas" data-target="#bs-canvas-left" aria-expanded="false" aria-controls="bs-canvas-left">
                        
                        <img src="libraries/img/logo.png" style="height:37px; padding:0px; border-radius: 20px;" class=" rounded-circle">

                    </a>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link navbar-brand font-weight-bold text-dark pl-0 pt-1 ml-0" style="font-family: 'Roboto', sans-serif;" >Lazy Devs PH</a>

            </li>
            
        </ul>

    </div>

    <div class="mx-auto order-0">

        <div class="d-sm-block d-md-none">

            <div class="bs-offset-main bs-canvas-anim text-center">

                <a class="btn py-0 mb-1" data-toggle="canvas" data-target="#bs-canvas-left" aria-expanded="false" aria-controls="bs-canvas-left">  

                    <img src="libraries/img/logo.png" style="height:50px; padding:1px; border-radius: 20px;" class="bg-white rounded-circle" alt="">

                </a>
            
            </div>

        </div>

    </div>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">

                <a class="nav-link  text-dark" href="#"><i class="fas fa-cog"></i></a>

            </li>

            <li class="nav-item">

                <div class="dropdown">

                    <a class="nav-link  text-dark btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fas fa-user-alt"></i>
                        
                    </a>

                    <div class="dropdown-menu dropdown-menu-right  dropdown-menu-lg p-0" style="width: 200px;" aria-labelledby="dropdownMenuButton">

                        <div class="container-fluid border border-bottom mb-3">

                            <div class="row py-2 px-1">

                                <div class="col-5 px-0 pl-3">

                                    <img src="{{ $page_settings['profile_url'] }}" class="img-fluid rounded-circle" style="height:55px; width:55px;" alt="Avatar">
                                    
                                </div>

                                <div class="col-7 pl-0">

                                    <h6 class="dropdown-header font-weight-bold pt-2 pl-2">USERNAME</h6>
                                    
                                    <h6 class="dropdown-header py-0 pl-2">USER ROLE</h6>

                                </div>

                            </div>

                        </div>

                        <div class="px-auto">

                            <a class="dropdown-item py-1" href="/dashboard/profile" > 

                                <i class="far fa-user-circle pr-2 pl-0 ml-0" style="font-size: 12pt;"></i> 

                                Profile 

                            </a>

                            <a class="dropdown-item py-1" type="button" id="btn_logout" >

                                <i class="fas fa-sign-out-alt pr-2 pl-0 ml-0" style="font-size: 12pt;"></i>

                                Log-out
                            </a>

                        </div>
                        
                        <form id="logout-form" action="" method="POST" class="d-none">
            
                        </form>
                
                
                    </div>

                </div>

            </li>
            
        </ul>

    </div>

</nav>