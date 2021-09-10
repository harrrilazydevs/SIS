<div class="container-fluid px-lg-4" id="page-dashboard">

    <div class="row mb-1">

        <div class="col-12 pt-lg-2 text-right px-0 d-block d-lg-none " style="font-size: 17pt;"> 
            <label ><b>Dashboard</b>
        </div>

        <div class="col-12 col-lg-8 pt-lg-3 pt-4 px-0">
            <label class="">Hi, <b><?php echo $_SESSION['usn'] ?>!</b></label>
        </div>
        
        <div class="col-12 col-lg-4 pt-lg-2 text-right px-0 d-none d-lg-block" style="font-size: 12pt;"> 
            <label><b>Dashboard</b>
            
        </div>

    </div>

    <div class="row border-top">

        <!--REQUIREMENTS CONTENT -->
        <div class="col-lg-5 pt-lg-4 pt-5 px-0 container-fluid" style="font-size: 12pt;"> 

            <div class="mt-1 row">
                <div class="col-6 pt-4 ">
                    <h6>Input List</h6>
                </div>
                <div class="col-6 pt-2 mt-1 text-right">
                    <a data-toggle="modal" data-target="#modal_input_enrollee" class="btn border btn-sm"><i class="far fa-plus-square"></i> New</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive border-right border-left border-bottom rounded">
                        <table class="table table-sm" id="tbl_requirement">
                            <thead style="font-size: 10pt;" class="border-bottom">
                            <tr>
                                <th class="text-center  px-4" width="10%">#</th>
                                <th class="text-center" width="45%">File Name</th>
                                <th class="text-center" width="20%">Entered By</th>
                                <th class="text-center px-4" width="25%">Date</th>
                            </tr>
                            </thead>
                            <tbody  style="font-size: 10pt;"></tbody>
                        </table>
                    </div>
                </div>
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

                            <a class="nav-link active" data-toggle="tab" href="#nav_application_status" role="tab">Summary</a>
                            <a class="nav-link" data-toggle="tab" href="#nav_application_status" role="tab">Students</a>
                            <a class="nav-link" data-toggle="tab" href="#nav_profile" role="tab">Reports</a>

                        </div>
                    </nav>
                    <div class="tab-content border rounded tab_border pt-2 pb-3 px-3" id="nav-tabContent">

                        <!-- SUMMARY -->
                        <div class="tab-pane fade show active container tab_container" id="nav_application_status" role="tabpanel">

                            <div class="row ">

                                <div class="col-lg-8"></div>

                                <div class="col-lg-4 pt-4 px-0 text-right">

                                    <div class="row">
                                        <div class="col-3 pr-1"><button class="btn btn-sm border"><i class="fas fa-filter" style="font-size:9pt;"></i></button></div>
                                        <div class="col-9 pl-0"><input type="text" class="form-control form-control-sm " placeholder="Search..."/></div>
                                    </div>

                                </div>

                            </div>

                            <div class="row ">

                                <div class="col-12 px-0" >    

                                    <div class="table-responsive mt-3 rounded" >
                                        <table class="table table-striped table-sm" id="tbl_applicants" >
                                            <thead style="font-size: 10pt;" class="border-bottom">
                                            <tr>
                                                <th class="text-center  px-4" width="10%">#</th>
                                                <th class="text-center" width="65%">Applicant Name</th>
                                                <th class="text-center px-4" width="25%">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody  style="font-size: 10pt;"></tbody>
                                        </table>

                                        <div class="small text-center text-secondary my-3"><b>NO DATA AVAILABLE...</b></div>
                                        
                                    </div>

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