<div class="container-fluid px-lg-4" id="page-dashboard">

    <div class="row mb-1">

        <div class="col-12 pt-lg-2 text-right px-0 d-block d-lg-none " style="font-size: 17pt; color: #343a40!important"> 
            <label ><b>Admission</b>
        </div>

        <div class="col-12 col-lg-8 pt-lg-3 pt-4 px-0">
            <label class="">Hi, <b><?php echo $USER_TYPE ?>!</b></label>
        </div>
        
        <div class="col-12 col-lg-4 pt-lg-2 text-right px-0 d-none d-lg-block" style="font-size: 12pt;"> 
            <label><b>Enrollee Monitoring</b>
        </div>

    </div>

    <div class="row border-top">

        <!-- TAB CONTENT -->

        <div class="col-lg-12 pt-lg-4 px-0 " style="font-size: 12pt;"> 

            <div class="row ">
                <div class="col tab_container container-fluid">

                    <div class="row">

                        <div class="col-7 pt-1 pb-0 pt-lg-0"></div>

                        <div class="col-5 text-right row mr-0 px-0">

                            <div class="col">

                                <button class="btn border mr-1 px-2"><i class="fas fa-cloud-download-alt"></i></i></button>
                                                                
                            </div>  
                           
                        </div>
                    </div>

                    <div class="row py-0">
                        <div class="col-9 pt-1 pb-0 pt-lg-0">
                            <h6>Information</h6>
                        </div>
                        <div class="col-3 text-right pt-3 pt-lg-0  py-0 px-0">

                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <div class="table-responsive mt-2 rounded border-right border-left border-bottom" >
                    <table class="table table-striped table-sm" id="tbl_applicants" >
                        <thead style="font-size: 10pt;" class="border-bottom">
                        <tr>
                            <th class="text-center  px-4" width="50%">School</th>
                            <th class="text-center" width="50%">No of Enrollee</th>
                            
                        </tr>
                        </thead>
                        <tbody  style="font-size: 10pt;"></tbody>
                        
                    </table>

                    <!-- <div class="small text-center text-secondary my-3"><b>NO DATA AVAILABLE...</b></div> -->
                    
                </div>
                </div>
            </div>

        </div>

    </div>

    
  
</div>

?>