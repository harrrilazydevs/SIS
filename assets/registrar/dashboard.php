<div class="container-fluid px-lg-4" id="page-dashboard">

    <div class="row mb-1">

        <div class="col-12 pt-lg-2 text-right px-0 d-block d-lg-none " style="font-size: 17pt;"> 
            <label ><b>Dashboard</b>
        </div>

        <div class="col-12 col-lg-8 pt-lg-3 pt-4 px-0">
            <label class="">Hi, <b><?php echo $USER_TYPE ?>!</b></label>
        </div>
        
        <div class="col-12 col-lg-4 pt-lg-2 text-right px-0 d-none d-lg-block" style="font-size: 12pt;"> 
            <label><b>Dashboard</b>
            
        </div>

    </div>

    <div class="row border-top">

        <!--REQUIREMENTS CONTENT -->
        <div class="col-lg-5 pt-lg-4 pt-5 px-0 " style="font-size: 12pt;"> 

            <h6>Requirements List</h6>
            <div class="table-responsive mt-3 border-right border-left border-bottom rounded">
                <table class="table table-sm" id="tbl_requirement">
                    <thead style="font-size: 10pt;" class="border-bottom">
                    <tr>
                        <th class="text-center  px-4" width="10%">#</th>
                        <th class="text-center" width="65%">Requirement</th>
                        <th class="text-center px-4" width="25%">Status</th>
                    </tr>
                    </thead>
                    <tbody  style="font-size: 10pt;"></tbody>
                </table>
            </div>

            <div class="border-right border-left border-bottom rounded text-right pr-2 mt-2 pb-0">
                <label class="pl-lg-4 pl-2" style="font-size: 9pt !important;">SUBMITTED:</label>
                <i style=" font-size:10pt !important;" class="far fa-check-circle bg-warning i-design  rounded-circle"></i>
                <label class="pl-lg-4 pl-2" style="font-size: 9pt !important;">APPROVED:</label>
                <i style=" font-size:10pt !important;" class="far fa-check-circle bg-success i-design  rounded-circle"></i>
                <label class="pl-lg-4 pl-2" style="font-size: 9pt !important;">DECLINED:</label>
                <i style=" font-size:10pt !important;" class="far fa-times-circle bg-danger i-design  rounded-circle"></i>
            </div>

        </div>

        <!-- TAB CONTENT -->
        <div class="col-lg-7 pt-lg-2 px-0 " style="font-size: 12pt;"> 
            <div class="row ml-lg-2">
                <div class="col tab_container">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <!-- <a class="nav-link active" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Application Status</a>
                            <a class="nav-link" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                            <a class="nav-link" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a> -->

                            <a class="nav-link active" data-toggle="tab" href="#nav_application_status" role="tab">Application Status</a>
                            <a class="nav-link" data-toggle="tab" href="#nav_profile" role="tab">Profile</a>
                            <a class="nav-link" data-toggle="tab" href="#nav-contact" role="tab">Contact</a>

                        </div>
                    </nav>
                    <div class="tab-content border rounded tab_border  py-3 px-3" id="nav-tabContent">


                    <!-- Application Status -->
                        <div class="tab-pane fade show active container tab_container" id="nav_application_status" role="tabpanel">

                            <div class="row mb-3 ">
                                <div class="col-2 pr-0">
                                    <label > Status </label>
                                </div>
                                <div class="col-10 pl-0 text-left" >    
                                    <label style="font-size: 12pt !Important;"> Pending </label>
                                </div>

                            </div>
                            
                            <div class="border-bottom text-secondary">

                            <div class="row">
                                <div class="col-2">
                                <h6>Degree</h6>
                                </div>
                                <div class="col-10 pl-0 text-left">
                                    <small class="text-secondary">Choose the degree program you are applying to.</small>
                                </div>
                            </div>
                               
                            </div>

                            <div class="row mt-4">
                                <div class="col-2 pr-0">
                                    <label class="pt-1"> First Choice </label>
                                </div>
                                <div class="col-10 pl-0 text-left"> 
                                    <select name="" id="" class="form-control form-control-sm"></select>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-2 pr-0">
                                    <label class="pt-1"> Second Choice </label>
                                </div>
                                <div class="col-10 pl-0 text-left"> 
                                    <select name="" id="" class="form-control form-control-sm"></select>
                                </div>
                            </div>

                        </div>

                         
                    <!-- Basic Information -->
                        <div class="tab-pane fade container tab_container" id="nav_profile" role="tabpanel">

                            <div class="border-bottom text-secondary">

                                <div class="row">
                                    <div class="col-3">
                                        <h6>Basic Information</h6>
                                    </div>
                                    <div class="col-9 pl-0 text-left">
                                        <!-- <small class="text-secondary">Choose the degree program you are applying to.</small> -->
                                    </div>
                                </div>
                            
                            </div>

                            <div class="row mt-4">
                                <div class="col-3 pr-0">
                                    <label class="pt-1"> First Choice </label>
                                </div>
                                <div class="col-9 pl-0 text-left"> 
                                    <select name="" id="" class="form-control form-control-sm"></select>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-3 pr-0">
                                    <label class="pt-1"> Second Choice </label>
                                </div>
                                <div class="col-9 pl-0 text-left"> 
                                    <select name="" id="" class="form-control form-control-sm"></select>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="nav-contact" role="tabpanel">ewaq</div>
                    </div>

                </div>
            </div>

        </div>

    </div>
  
</div>