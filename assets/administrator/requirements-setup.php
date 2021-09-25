<div class="container-fluid px-lg-4 " id="page-requirements">

    <div class="row mb-1">

        <div class="col-12 pt-lg-2 text-right px-0 d-block d-lg-none " style="font-size: 17pt;"> 
            
            <label ><b>Requirements Setup</b>
        
        </div>

        <div class="col-12 col-lg-8 pt-lg-3 pt-4 px-0">
            
            <!-- <label class="">Hi, <b><?php echo $_SESSION['usfn'] ?>!</b></label> -->
        
        </div>
        
        <div class="col-12 col-lg-4 pt-lg-2 text-right px-0 d-none d-lg-block" style="font-size: 12pt;"> 
            
            <label><b>Requirements Setup</b>
            
        </div>

    </div>

    <div class="row border-top">

        <!--REQUIREMENTS CONTENT -->
        <!-- <div class="col-12 pt-lg-4 pt-5 px-0 container-fluid" style="font-size: 12pt;"> 

            <div class="mt-1 row">
    
                <div class="col-6 pt-4 ">
        
                    <h6>Requirement Setup</h6>
            
                </div>
        
                <div class="col-6 pt-2 mt-1 text-right">
            
                    <a data-toggle="modal" data-target="#md_admin_add_requirement" class="btn border btn-sm"><i class="far fa-plus-square"></i> New</a>
                
                </div>

            </div>

            <div class="row">
                
                <div class="col">
                    
                    <div class="table-responsive border-right border-left border-bottom rounded">
                        
                        <table class="table table-sm" id="tbl_requirement">
                                
                            <thead style="font-size: 10pt;" class="border-bottom">
                                
                                <tr>
                                    <th class="text-center  px-4" width="10%">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center" width="10%"></th>
                                </tr>
                                
                                </thead>

                                <tbody  style="font-size: 10pt;"></tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div> -->

        <div class="col mt-3">
            <h6 style="font-size: 10pt !important;">Require to :</h6>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <div class="nav flex-column nav-pills  px-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link ld-nav-pills active" id="v-pills-home-tab" data-toggle="pill" href="#t_applicant" role="tab">Applicant</a>
                <a class="nav-link ld-nav-pills" id="v-pills-profile-tab" data-toggle="pill" href="#t_employee" role="tab">Employee</a>
            </div>
        </div>
        <div class="col-10 ">
            
            <div class="tab-content mt-2 container-fluid" id="v-pills-tabContent">

                <div class="tab-pane fade show active row" id="t_applicant" role="tabpanel">

                <div class="col-12 px-0 container-fluid" style="font-size: 12pt;"> 

                    <div class="row text-center my-0 py-0">

                        <div class="col">

                            <h6>Applicant's Requirements</h6>

                        </div>


                    </div>
                    
                    <div class="row">
                        <div class="col-2 mt-2 mb-3">
                            <label style="font-size: 10pt;">Applicant Type</label>
                            <select name="" id="sel_applicant_type" class="form-control form-control-sm"></select>
                        </div>

                        
                        <div class="col-10 pt-4 mt-3 text-right">

                            <a data-toggle="modal" data-target="#md_admin_add_requirement" class="btn border btn-sm"><i class="far fa-plus-square"></i> New</a>
                        
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col">
                            
                            <div class="table-responsive border-right border-left border-bottom rounded">
                                
                                <table class="table table-sm table-design" id="tbl_requirement_setup_list">
                                        
                                    <thead style="font-size: 10pt;" class="border-bottom">
                                        
                                        <tr>
                                            <th class="text-center  px-4" width="10%">#</th>
                                            <th class="text-center">Requirement</th>
                                            <th class="text-center">Document Type</th>
                                            <th class="text-center">Requirement Type</th>
                                            <th class="text-center" width="10%"></th>
                                        </tr>
                                        
                                        </thead>

                                        <tbody  style="font-size: 10pt;"></tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                    </div>

                </div>
                <div class="tab-pane fade" id="t_employee" role="tabpanel">...</div>
             
            </div>
        </div>
    </div>
  
</div>


