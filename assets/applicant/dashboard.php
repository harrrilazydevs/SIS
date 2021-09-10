<div class="container-fluid px-lg-4" id="page-dashboard">

    <div class="row mb-1">

        <div class="col-12 pt-lg-2 text-right px-0 d-block d-lg-none " style="font-size: 17pt;"> 
            <label ><b>Dashboard</b>
        </div>

        <div class="col-12 col-lg-8 pt-lg-3 pt-4 px-0">
            <label class="user_info" ur="<?php echo $_SESSION['usr']?>" id="<?php echo $_SESSION['uid']?>">Hi, <b><?php echo $_SESSION['usn']?></b></label>
        </div>
        
        <div class="col-12 col-lg-4 pt-lg-2 text-right px-0 d-none d-lg-block" style="font-size: 12pt;"> 
            <label><b>Dashboard</b>
            
        </div>

    </div>

    <div class="row border-top">

        <!--REQUIREMENTS CONTENT -->
        <div class="col-lg-5 pt-lg-4 pt-5 px-0 mb-4 " style="font-size: 12pt;"> 

         

            <h6>Requirements List</h6>

            <small class="border p-2"> Please </small>

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
        <div class="col-lg-7 pt-lg-2 px-0 " > 
            <div class="row ml-lg-2">
                <div class="col tab_container">
                    <nav class="tabbable">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist" >
                            <!-- <a class="nav-link active" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Application Status</a>
                            <a class="nav-link" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                            <a class="nav-link" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a> -->

                            <a class="nav-link active" style="font-size: 9pt; !important" data-toggle="tab" href="#nav_application_status" role="tab">Application Status</a>
                            <a class="nav-link" data-toggle="tab" href="#nav_profile" role="tab">Profile</a>
                            <a class="nav-link" data-toggle="tab" href="#nav-mailingaddress" role="tab">Mailing Address</a>
                            <a class="nav-link" data-toggle="tab" href="#nav-familyrecord" role="tab">Family Record</a>
                            <a class="nav-link" data-toggle="tab" href="#nav-scholasticrecord" role="tab">Scholastic Record</a>
                            <a class="nav-link" data-toggle="tab" href="#nav-otherinformation" role="tab">Other Information</a>

                        </div>
                    </nav>
                    <div class="tab-content border rounded tab_border  py-3 px-3" id="nav-tabContent">


                    <!-- Application Status -->
                        <div class="tab-pane fade show active container tab_container" id="nav_application_status" role="tabpanel">

                            <div class="row mb-3 ">
                                <div class="col-lg-2 pl-0 pl-lg-3  pr-0">
                                    <label > Status </label>
                                </div>
                                <div class="col-lg-10 pl-0 text-left" >    
                                    <label style="font-size: 12pt !Important;"> Pending </label>
                                </div>

                            </div>
                            
                            <div class="border-bottom text-secondary">

                            <div class="row">
                                <div class="col-lg-2 pl-0 pl-lg-3">
                                <h6>Degree</h6>
                                </div>
                                <div class="col-lg-10 pl-0 text-left">
                                    <small class="text-secondary">Choose the degree program you are applying to.</small>
                                </div>
                            </div>
                               
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2 pr-0 pl-0 pl-lg-3">
                                    <label class="pt-1"> School of </label>
                                </div>
                                <div class="col-lg-10 pl-0 text-left"> 
                                    <select name="" id="" class="form-control form-control-sm"></select>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2 pr-0 pl-0 pl-lg-3">
                                    <label class="pt-1"> Program </label>
                                </div>
                                <div class="col-lg-10 pl-0 text-left"> 
                                    <select name="" id="" class="form-control form-control-sm"></select>
                                </div>
                            </div>

                        </div>

                         
                    <!-- Basic Information -->

                        <div class="tab-pane fade container tab_container mb-3" id="nav_profile" role="tabpanel">

                            <div class="border-bottom text-secondary">

                                <div class="row">

                                    <div class="col-lg-3 ">

                                        <h6>Basic Information</h6>

                                    </div>
                                    <div class="col-9 pl-0 text-left">

                                        <!-- <small class="text-secondary">Choose the degree program you are applying to.</small> -->
                                    </div>

                                </div>
                            
                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Last Name </label>       

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class=" form-control form-control-sm" name="lastname" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> First Name </label>

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class="form-control form-control-sm" name="firstname" type="text">

                                </div>
                          
                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Middle Name </label>
                                   
                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class="form-control form-control-sm" name="middlename" type="text">

                                </div>
                          
                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Suffix</label> 
                                   
                                </div>

                                <div class="col-lg-10 pr-0 pl-3 pl-lg-3">

                                    <input class="form-control form-control-sm" name="suffix" type="text">

                                </div>
                          
                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Date of Birth </label>
                                   
                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class="form-control form-control-sm" name="birthdate" type="date">

                                </div>
                          
                            </div>
                            
                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Place of Birth </label>
                                   
                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class="form-control form-control-sm" name="birthplace" type="text">

                                </div>
                          
                            </div>   
                            
                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">
                                    
                                    <label class="pt-1"> Age </label>
                                   
                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class="form-control form-control-sm" name="age" type="text">

                                </div>
                          
                            </div>
                            
                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Contact Number </label>
                                   
                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class="form-control form-control-sm" name="mobileno" type="text">

                                </div>
                          
                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">
                                    
                                    <label class="pt-1"> Gender </label>
                                   
                                </div>

                                <div class="col-lg-10 pr-0">

                                    <select name="gender" id="" class="form-control form-control-sm"></select>

                                </div>
                          
                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Religion </label>
                                   
                                </div>

                                <div class="col-lg-10 pr-0">
                                    
                                    <input class="form-control form-control-sm" name="religion" type="text">

                                </div>
                          
                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Civil Status </label>
                                   
                                </div>

                                <div class="col-lg-10 pr-0">

                                    <select name="civilstatus" id="" class="form-control form-control-sm"></select>

                                </div>
                          
                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Citizenship </label>
                                   
                                </div>

                                <div class="col-lg-10 pr-0">

                                    <select name="citizenship" id="" class="form-control form-control-sm"></select>

                                </div>
                          
                            </div>




                        </div>

                    <!-- Mailing Address -->

                        <div class="tab-pane fade container tab_container" id="nav-mailingaddress" role="tabpanel">
                            <div class="border-bottom text-secondary">

                                <div class="row">

                                    <div class="col-3">

                                        <h6>Address</h6>

                                    </div>

                                    <div class="col-9 pl-0 text-left">
                                        
                                    </div>

                                </div>

                            </div>  

                            <div class=" text-secondary">

                                <div class="row">

                                    <div class="col mt-4 mb-0">

                                        <h6  class="text-center" style="fontsize: 9pt !important;" >City Address</h6>

                                    </div>
                                   
                                </div>

                            </div>  

                            <div class="row mt-1">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1 pr-0"> No./St./Sbdv. </label>      

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class=" form-control form-control-sm" name="city_no_street_subdivision" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">
                                
                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Barangay </label>   

                                </div>

                                <div class="col-lg-10 pr-0">
                                    
                                    <input class=" form-control form-control-sm" name="city_barangay" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> City </label>     

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class=" form-control form-control-sm" name="city_city" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Zip Code </label>       

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class=" form-control form-control-sm" name="city_zipcode" type="text">

                                </div>
                          
                            </div> 

                            <div class=" text-secondary">

                                <div class="row">

                                    <div class="col mt-4 mb-0">

                                        <h6 class="text-center pl-2" style="fontsize: 9pt !important;" >Provincial Address</h6>

                                    </div>
                                  
                                </div>

                            </div>  

                            <div class="row mt-1">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Barangay </label>      

                                </div>

                                <div class="col-lg-10 pr-0 pl-3 pl-lg-3">

                                    <input class=" form-control form-control-sm" name="province_barangay" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> No./St./Sbdv. </label>        

                                </div>

                                <div class="col-lg-10 pr-0 pl-3 pl-lg-3">

                                    <input class=" form-control form-control-sm" name="province_no_street_subdivision" type="text">

                                </div>
                          
                            </div>  

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> City </label>    

                                </div>

                                <div class="col-lg-10 pr-0">
                                    
                                    <input class=" form-control form-control-sm" name="province_city" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1"> Zip Code </label>     

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class=" form-control form-control-sm" name="province_zipcode" type="text">

                                </div>

                            </div>

                        </div>
                    
                    <!-- Family Record -->

                        <div class="tab-pane fade container tab_container" id="nav-familyrecord" role="tabpanel">
                            <div class="border-bottom text-secondary">

                                <div class="row">

                                    <div class="col-lg-3">

                                        <h6>Family Record</h6>

                                    </div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3 ">

                                    <label class="pt-1 pr-0"> Father's Full Name </label> 

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class=" form-control form-control-sm" name="fathers_fullname" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3 ">

                                    <label class="pt-1 pr-0"> Occupation </label>        

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class=" form-control form-control-sm" name="fathers_occupation" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1 pr-0"> Mother's Full Name </label>    

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class=" form-control form-control-sm" name="mothers_fullname" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3 ">

                                    <label class="pt-1 pr-0"> Occupation </label> 

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class=" form-control form-control-sm" name="mothers_occupation" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1 pr-0"> No. of Siblings </label>   

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <input class=" form-control form-control-sm" name="no_of_siblings" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2 pr-0 pl-3 pl-lg-3">

                                    <label class="pt-1 pr-0"> Monthly Family Income </label>    

                                </div>

                                <div class="col-lg-10 pr-0">

                                    <select name="monthly_family_income" id="" class="form-control form-control-sm"></select>

                                </div>
                          
                            </div> 

                        </div> 

                    <!-- Scholastic Record -->

                        <div class="tab-pane fade container tab_container" id="nav-scholasticrecord" role="tabpanel">
                            <div class="border-bottom text-secondary">

                                <div class="row">

                                    <div class="col-lg-3">

                                        <h6>Scholastic Record</h6>

                                    </div>
                                    
                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-4 pr-0 ">

                                    <label class=" pr-0 pt-0"> Primary School/Addr.,</label>        

                                </div>

                                <div class="col-lg-8 pr-0">

                                    <input class=" form-control form-control-sm" name="primary_school_address" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-4 pr-0 ">

                                    <label class=" pr-0 pt-0"> Primary Year Attended</label>        

                                </div>

                                <div class="col-lg-8 pr-0">

                                    <input class=" form-control form-control-sm" name="primary_year_attended" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-4 pr-0 pl-3 pl-lg-3 ">

                                    <label class=" pr-0 pt-0 ">Secondary School/Addr.,</label>     

                                                            
                                </div>

                                <div class="col-lg-8 pr-0">

                                    <input class=" form-control form-control-sm" name="secondary_school_address" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-4 pr-0 pl-3 pl-lg-3 ">

                                    <label class=" pr-0 pt-0"> Secondary School Year Attended</label>    

                                </div>

                                <div class="col-lg-8 pr-0">

                                    <input class=" form-control form-control-sm" name="secondary_school_year_attended" type="text">

                                </div>
                          
                            </div> 
                            
                            <div class="row mt-4">

                                <div class="col-lg-4 pr-0 pl-3 pl-lg-3 ">

                                    <label class=" pr-0 pt-0 ">Honors Received</label>     

                                </div>

                                <div class="col-lg-8 pr-0">
                                    
                                    <input class=" form-control form-control-sm" name="honors_received" type="text">
                                    
                                    <p class="text-secondary " style="font-size: 8pt;"> Type N/A if not applicable</p> 

                                </div>
                          
                            </div> 

                            <div class="row mt-3">

                                <div class="col-lg-4 pr-0 pl-3 pl-lg-3">

                                    <label class=" pr-0 pt-0 ">Affiliated Educational Organization(s) and Position(s)</label>    
                         
                                </div>

                                <div class="col-lg-8 pr-0">

                                    <input class=" form-control form-control-sm" name="affiliated_educational_organizations_and_position" type="text">

                                    <p class="text-secondary" style="font-size: 8pt;"> Type N/A if not applicable</p> 

                                </div>
                          
                            </div> 

                            <div class="row mt-3">

                                <div class="col-lg-4 pr-0 pl-3 pl-lg-3">

                                    <label class=" pr-0 pt-0 ">Scholarships/Grants Received</label>     

                                                            
                                </div>

                                <div class="col-lg-8 pr-0">

                                    <input class=" form-control form-control-sm" name="scholarships_grants_received" type="text">

                                    <p class="text-secondary" style="font-size: 8pt;"> Type N/A if not applicable</p> 

                                </div>
                          
                            </div> 

                            <div class="row mt-3">

                                <div class="col-lg-4 pr-0 pl-3 pl-lg-3">

                                    <label class=" pr-0 pt-0 ">Are you a working student?</label>     

                                                            
                                </div>

                                <div class="col-lg-8 pr-0">

                                    <select name="working_student" id="" class="form-control form-control-sm"></select>    

                                </div>
                          
                            </div> 

                        </div>

                    <!-- Other Information -->

                        <div class="tab-pane fade container tab_container" id="nav-otherinformation" role="tabpanel">
                            <div class="border-bottom text-secondary">

                                <div class="row">
                                    <div class="col-3">
                                        <h6>Other Information</h6>
                                    </div>
                                    
                                </div>

                                <div class="row mt-4 mb-1">

                                    <div class="col pr-0 ">

                                        <label style="font-size: 15px !important;" class="font-weight-bold" > Do you have physical disability (e.g. heart condition, visual/hearing impairment, etc.), 
                                            special learning needs (e.g. dyslexia, ADHD, ASD, etc.), or psychological condition that
                                             affected your schooling before and/or may affect your schooling at MLQU?</label>
                                        
                                        <label class="">Manuel L. Quezon University aims to provide educational opportunities for all types of learners including applicants with special learning needs. 
                                            The final acceptance or non-acceptance of these applicants are based on the merits of their application and the ability of the University to provide services for their declared conditions. 
                                            It is important to remember that non-disclosure means the University is not obliged to provide you with any support or reasonable 
                                            accommodation with regards to your condition and you will be treated as a regular applicant/student.</label>

                                    </div>
              
                                </div> 

                                <div class="row">

                                    <div class="col pr-0">

                                    <select name="oi_1" class="form-control">

                                        <option value="YES">Yes</option>
                                        <option value="NO">No</option>

                                    </select>

                                    </div>

                                </div>

                                <div class="row mt-lg-4 mt-3">

                                    <div class="col pr-0 ">

                                        <label >How did you hear about MLQU?</label>  

                                    </div> 

                                </div> 

                                <div class="row mb-3">

                                    <div class="col pr-0">

                                        <input class=" form-control form-control-sm" name="oi_2" type="text">

                                    </div>

                                </div>
                                
                                <div class="row">

                                    <div class="col">

                                        <label> Do you plan to apply for a scholarship?</label>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col pr-0">

                                       <select name="oi_3"  class="form-control"></select>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col">

                                        <label> What type of scholarship?</label>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col pr-0">

                                       <select name="oi_4" class="form-control"></select>

                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
  
</div> 

