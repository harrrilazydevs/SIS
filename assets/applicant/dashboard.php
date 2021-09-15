
<div class="container-fluid px-lg-4" id="page-dashboard">

    <div class="row mb-1">

        <div class="col-12 pt-lg-2 text-right px-0 d-block d-lg-none " style="font-size: 17pt;"> 
            <label ><b>Dashboard</b>
        </div>

        <div class="col-12 col-lg-8 pt-lg-3 pt-4 px-0">
            <label class="user_info" ur="<?php echo $_SESSION['usr']?>" id="<?php echo $_SESSION['uid']?>">Hi, <b><?php echo $_SESSION['usfn']?></b></label>
        </div>
        
        <div class="col-12 col-lg-4 pt-lg-2 text-right px-0 d-none d-lg-block" style="font-size: 12pt;"> 
            <label><b>Dashboard</b>
            
        </div>

    </div>

    <div class="row border-top">

        <!--REQUIREMENTS CONTENT -->
        <div class="col-lg-5 pt-lg-4 pt-3 px-0 mb-5  " style="font-size: 12pt;"> 

            <h6>Requirements List</h6>

            <div class="card shadow-sm" style="border-left: 2px solid #037DFF;">
                <div class="card-body pb-0">
                    <div class="row px-0 py-0">
                        <div class="col-lg-1 col-2  text-primary pb-2 pt-0">  <i class="fas fa-exclamation-circle"></i></div>
                        <div class="col-lg-11 col-10 pl-0 pl-lg-0 pt-1" ><h6 style="font-size: 10pt !Important;">Reminders</h6></div>
                    </div>
                    <div class=" row ">
                        <div class="col border-top pt-3 pb-0" >

                        <div class="text-right">
                            <h4 class="text-success pb-0 mb-1"><i class="far fa-calendar-alt pr-2 text-body"></i>3 Days</h4>
                            <p style="font-size: 10pt !important;" class="py-0"> <small>To Complete Application</small></p>
                        </div>
                        <p class="font-italic mb-2">  <small>Guidelines:</small></p>
                            <p style="font-size: 10pt !important;" class="py-0 pl-2 mb-1"> Please upload scanned documents in PDF format.</p>
                            <p style="font-size: 10pt !important;" class="py-0 pl-2 mt-1"> For photo, please upload a clear copy.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive mt-2 border-right border-left border-bottom rounded">
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
         

            <div class="border-right border-left border-bottom shadow-sm rounded text-right pr-2 mt-2 pb-0">
                <label class="pl-lg-4 pl-2" style="font-size: 9pt !important;">SUBMITTED:</label>
                <i style=" font-size:10pt !important;" class="far fa-check-circle bg-warning i-design  rounded-circle"></i>
                <label class="pl-lg-4 pl-2" style="font-size: 9pt !important;">APPROVED:</label>
                <i style=" font-size:10pt !important;" class="far fa-check-circle bg-success i-design  rounded-circle"></i>
                <label class="pl-lg-4 pl-2" style="font-size: 9pt !important;">DECLINED:</label>
                <i style=" font-size:10pt !important;" class="far fa-times-circle bg-danger i-design  rounded-circle"></i>
            </div>

        </div>

        <!-- TAB CONTENT -->
        <div class="col-lg-7 pt-lg-3 mb-5 container pr-0 pl-0 pl-lg-3" > 

            <div class="row">

                <div class="col tab_container">
                    
                    <nav class="tabbable">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist" >
                            <a class="nav-link ld_nav_link active" style="font-size: 9pt; !important" data-toggle="tab" href="#nav_application_status" role="tab">Status</a>
                            <a class="nav-link ld_nav_link" data-toggle="tab" href="#nav_profile" role="tab">Profile</a>
                            <a class="nav-link ld_nav_link" style="font-size: 9pt; !important" data-toggle="tab" href="#nav_application_degree" role="tab">Program</a>
                            <a class="nav-link ld_nav_link" data-toggle="tab" href="#nav-mailing_address" role="tab">Address</a>
                            <a class="nav-link ld_nav_link" data-toggle="tab" href="#nav-family_record" role="tab">Family</a>
                            <a class="nav-link ld_nav_link" data-toggle="tab" href="#nav-scholastic_record" role="tab">Scholastic</a>
                            <a class="nav-link ld_nav_link" data-toggle="tab" href="#nav-other_information" role="tab">Other</a>
                        </div>
                    </nav>

                    <div class="tab-content border rounded tab_border  shadow-sm py-3 px-3 " id="nav-tabContent">

                        <!-- Application Status -->
                        <div class="tab-pane fade show active container" id="nav_application_status" role="tabpanel">

                            <div class="tab_loading text-center text-secondary mt-2">
                                Loading ...
                            </div>

                            <div class="tab_content d-none">

                                <div class="row">
                                    <div class="col border-bottom text-secondary pb-2">
                                        <h6 class=" my-0">Application Status</h6>
                                        <small class="text-secondary my-0">Summary of your application progress</small>
                                    </div>
                                </div>
                                    

                                <div class="row mt-4">
                                    
                                    <div class="col">

                                        <label class="pt-1"><i class="fas fa-tasks fa-fw"></i> Requirements </label>
                            
                                            <div class="progress" style="background-color: #E9ECEF; " >

                                                <div class=" py-2 " style="height: 1rem;" id="pg_requirements"></div>
                                            
                                            </div>
                                    
                                    </div>
                                
                                </div>

                                <div class="row mt-2">
                                
                                    <div class="col">

                                        <label class="pt-1"><i class="fas fa-address-card fa-fw"></i> Profile </label>
                                        
                                            <div class="progress" style="background-color: #E9ECEF;">

                                            <div class="progress py-2 text-white" style="background-color: #007BFF; height: 1rem;" id="pg_profile"></div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                <div class="row mt-2">
                                    
                                    <div class="col">

                                        <label class="pt-1"><i class="fas fa-user-graduate  fa-fw"></i> Degree </label>
                                        
                                            <div class="progress" style="background-color: #E9ECEF;">

                                            <div class="progress py-2 text-white" style="background-color: #007BFF; height: 1rem;" id="pg_degree"></div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                <div class="row mt-2">
                                    
                                    <div class="col">

                                        <label class="pt-1"><i class="fas fa-house-user fa-fw"></i> Address </label>
                                        
                                            <div class="progress" style="background-color: #E9ECEF;">

                                            <div class="progress py-2 text-white" style="background-color: #007BFF; height: 1rem;" id="pg_address"></div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                <div class="row mt-2">
                                    
                                    <div class="col">

                                        <label class="pt-1"><i class="fas fa-user-friends fa-fw"></i> Family </label>
                                        
                                            <div class="progress" style="background-color: #E9ECEF;">

                                            <div class="progress py-2 text-white" style="background-color: #007BFF; height: 1rem;" id="pg_family"></div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                <div class="row mt-2">
                                    
                                    <div class="col">

                                        <label class="pt-1"><i class="fas fa-graduation-cap fa-fw"></i> Scholastic </label>
                                        
                                            <div class="progress" style="background-color: #E9ECEF;">

                                            <div class="progress py-2 text-white" style="background-color: #007BFF; height: 1rem;" id="pg_scholastic"></div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                <div class="row mt-2 mb-3">
                                    
                                    <div class="col">

                                        <label class="pt-1"><i class="fas fa-sticky-note fa-fw"></i> Other </label>
                                        
                                            <div class="progress" style="background-color: #E9ECEF;">

                                            <div class="progress py-2 text-white" style="background-color: #007BFF; height: 1rem;" id="pg_other"></div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                            </div>

                        </div>

                        <!-- Program -->
                        <div class="tab-pane fade container tab_container" id="nav_application_degree" role="tabpanel">
                         
                            <div class="border-bottom text-secondary pb-2">

                                <h6 class="my-0">Program</h6>
                                <small class="text-secondary my-0">Choose the program you are applying to.</small>
                               
                            </div>

                            <form id="f_applicant_degree">

                                <div class="row mt-4">
                                        
                                    <div class="col-lg-2">
                                    
                                        <label class="pt-1"> School </label>
                                    
                                    </div>
                                    
                                    <div class="col-lg-10 text-left"> 
                                    
                                        <select id="sel_school"  class="form-control form-control-sm"></select>
                                        
                                    </div>
                                    
                                </div>

                                <div class="row mt-4">
                                    
                                    <div class="col-lg-2">
                                        
                                        <label class="pt-1"> Program </label>
                                    
                                    </div>
                                    
                                    <div class="col-lg-10 text-left"> 
                                    
                                        <select name="program_id" id="sel_program"  class="form-control form-control-sm"></select>
                                    
                                    </div>
                                    
                                </div>

                                <div class="row mt-4">

                                    <div class="col text-right">

                                        <button class="btn btn-secondary btn-sm">Update</button>

                                    </div>
                                    
                                </div>

                            </form>

                        </div>
                         
                        <!-- Basic Information -->
                        <div class="tab-pane fade container tab_container mb-3 " id="nav_profile" role="tabpanel">

                            <div class="tab_loading text-center text-secondary mt-2">
                                Loading ...
                            </div>

                            <div class="tab_content d-none">
                                <form id="f_applicant_bi">

                                    <input type="hidden" value="<?php echo $_SESSION['TOKEN']?>" name='token'>


                                    <div class="border-bottom text-secondary">

                                        <div class="row py-2">
                                            <div class="col-lg-4 ">

                                                <h6>Applicant Information</h6>

                                            </div>
                                            <div class="col-8 pl-0 text-left"> </div>
                                        </div>

                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-lg-2">
                                            <label class="pt-1"> Application No</label>
                                        </div>
                                        <div class="col-lg-10 text-left"> 
                                        <h5 id="txt_applicant_id"><?php echo $_SESSION['uid']?></h5>
                                        </div>
                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> First Name</label> <label class="text-danger font-weight-bold">*</label>

                                        </div>

                                        <div class="col-lg-10 ">

                                            <input class="form-control form-control-sm form_bi" name="firstname" type="text" >

                                        </div>

                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Middle Name </label>

                                        </div>

                                        <div class="col-lg-10 ">

                                            <input class="form-control form-control-sm form_bi" name="middlename" type="text" >

                                        </div>

                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Last Name </label>        <label class="text-danger font-weight-bold">*</label>

                                        </div>

                                        <div class="col-lg-10 ">

                                            <input class=" form-control form-control-sm form_bi" name="lastname" type="text">

                                        </div>

                                    </div> 

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Suffix</label> 

                                        </div>

                                        <div class="col-lg-10  pl-3">

                                            <input class="form-control form-control-sm form_bi" name="suffix" type="text">

                                        </div>

                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1">Mobile No </label><label class="text-danger font-weight-bold">*</label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input class="form-control form-control-sm form_bi" name="mobile_no" type="text" >
                                            <div class="text-right">
                                                <small class="text-muted"> ( 9055000000 ) </small>
                                            </div>

                                        </div>
                                
                                    </div>

                                    <div class="mt-4 border-bottom text-secondary">

                                        <div class="row py-2">
                                            <div class="col-lg-4 ">

                                                <h6>Personal Information</h6>

                                            </div>
                                            <div class="col-8 pl-0 text-left">

                                            </div>

                                        </div>
                                    
                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Date of Birth </label>
                                        
                                        </div>

                                        <div class="col-lg-3 ">

                                            <input class="form-control form-control-sm birthdate form_bi" aria-age="txt_applicant_age" name="date_of_birth" type="date">

                                        </div>

                                        <div class="col-lg-1 mt-lg-0 mt-4 pr-3 text-lg-right">

                                            <label class="pt-1"> Age </label>
                                        
                                        </div>

                                        <div class="col-lg-1 px-lg-0">

                                            <input class="form-control form-control-sm" name="age" type="text" id="txt_applicant_age" readonly>

                                        </div>

                                        <div class="col-lg-2  pl-3 mt-lg-0 mt-4 pr-3 text-lg-right">

                                            <label class="pt-1"> Place of Birth </label>
                                        
                                        </div>

                                        <div class="col-lg-3 pl-0 ">

                                            <input class="form-control form-control-sm form_bi" name="place_of_birth" type="text">

                                        </div>
                                
                                    </div>
                                    
                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">
                                            
                                            <label class="pt-1"> Gender </label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <select name="gender" class="form-control form-control-sm form_bi">
                                                <option value="MALE">Male</option>
                                                <option value="FEMALE">Female</option>
                                            </select>

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Religion </label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">
                                            
                                            <input class="form-control form-control-sm form_bi" name="religion" type="text">

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Citizenship </label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input type="text" name="citizenship" id="txt_citizenship" class="form-control form-control-sm form_bi">

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4 d-none" id="div_acr">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> A.C.R. No </label><label class="text-danger font-weight-bold">*</label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input type="text" name="acr_no" id="txt_acr" class="form-control form-control-sm form_bi">

                                        </div>
                                
                                    </div>
                                    
                                    <div class="row mt-4 d-none" id="div_passport">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Passport No </label><label class="text-danger font-weight-bold">*</label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input type="text" name="passport_no" id="txt_passport" class="form-control form-control-sm form_bi">

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Civil Status </label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <select name="civil_status" id="txt_civil_status" class="form-control form-control-sm form_bi">
                                                <option value="SINGLE">Single</option>
                                                <option value="MARRIED">Married</option>
                                                <option value="WINDOWED">Widowed</option>
                                            </select>

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4 d-none" id="div_spouse">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Spouse </label><label class="text-danger font-weight-bold"> *</label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input type="text" name="spouse" id="txt_citizenship" class="form-control form-control-sm form_bi">

                                        </div>
                                
                                    </div>

                                    

                                    <div class="row mt-4">

                                        <div class="col text-right  pl-3">
                                            
                                            <button class="btn btn-sm btn-secondary" type="button" id="btn_bi_update">Update</button>
                                        
                                            <button class="btn btn-primary d-none btn-sm" type="submit" id="btn_bi_save">Save Changes</button>
                                        
                                        </div>
                                
                                    </div>

                                </form>
                            </div>

                        </div>

                    <!-- Mailing Address -->

                        <div class="tab-pane fade container tab_container" id="nav-mailing_address" role="tabpanel">
                            <div class="border-bottom text-secondary">

                                <div class="row py-2">

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

                                <div class="col-lg-2  pl-3">

                                    <label class="pt-1 "> No./St./Sbdv. </label>      

                                </div>

                                <div class="col-lg-10 ">

                                    <input class=" form-control form-control-sm" name="city_no_street_subdivision" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">
                                
                                <div class="col-lg-2  pl-3">

                                    <label class="pt-1"> Barangay </label>   

                                </div>

                                <div class="col-lg-10 ">
                                    
                                    <input class=" form-control form-control-sm" name="city_barangay" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2  pl-3">

                                    <label class="pt-1"> City </label>     

                                </div>

                                <div class="col-lg-10 ">

                                    <input class=" form-control form-control-sm" name="city_city" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2  pl-3">

                                    <label class="pt-1"> Zip Code </label>       

                                </div>

                                <div class="col-lg-10 ">

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

                                <div class="col-lg-2  pl-3">

                                    <label class="pt-1"> Barangay </label>      

                                </div>

                                <div class="col-lg-10  pl-3">

                                    <input class=" form-control form-control-sm" name="province_barangay" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2  pl-3">

                                    <label class="pt-1"> No./St./Sbdv. </label>        

                                </div>

                                <div class="col-lg-10  pl-3">

                                    <input class=" form-control form-control-sm" name="province_no_street_subdivision" type="text">

                                </div>
                          
                            </div>  

                            <div class="row mt-4">

                                <div class="col-lg-2  pl-3">

                                    <label class="pt-1"> City </label>    

                                </div>

                                <div class="col-lg-10 ">
                                    
                                    <input class=" form-control form-control-sm" name="province_city" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2  pl-3">

                                    <label class="pt-1"> Zip Code </label>     

                                </div>

                                <div class="col-lg-10 ">

                                    <input class=" form-control form-control-sm" name="province_zipcode" type="text">

                                </div>

                            </div>

                        </div>
                    
                    <!-- Family Record -->

                        <div class="tab-pane fade container tab_container" id="nav-family_record" role="tabpanel">
                            <div class="border-bottom text-secondary">

                                <div class="row py-2">

                                    <div class="col-lg-3">

                                        <h6>Family Record</h6>

                                    </div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-2  pl-3 ">

                                    <label class="pt-1 "> Father's Full Name </label> 

                                </div>

                                <div class="col-lg-10 ">

                                    <input class=" form-control form-control-sm" name="fathers_fullname" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2  pl-3 ">

                                    <label class="pt-1 "> Occupation </label>        

                                </div>

                                <div class="col-lg-10 ">

                                    <input class=" form-control form-control-sm" name="fathers_occupation" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2  pl-3">

                                    <label class="pt-1 "> Mother's Full Name </label>    

                                </div>

                                <div class="col-lg-10 ">

                                    <input class=" form-control form-control-sm" name="mothers_fullname" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2  pl-3 ">

                                    <label class="pt-1 "> Occupation </label> 

                                </div>

                                <div class="col-lg-10 ">

                                    <input class=" form-control form-control-sm" name="mothers_occupation" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2  pl-3">

                                    <label class="pt-1 "> No. of Siblings </label>   

                                </div>

                                <div class="col-lg-10 ">

                                    <input class=" form-control form-control-sm" name="no_of_siblings" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-2  pl-3">

                                    <label class="pt-1 "> Monthly Family Income </label>    

                                </div>

                                <div class="col-lg-10 ">

                                    <select name="monthly_family_income" id="" class="form-control form-control-sm"></select>

                                </div>
                          
                            </div> 

                        </div> 

                    <!-- Scholastic Record -->

                        <div class="tab-pane fade container tab_container" id="nav-scholastic_record" role="tabpanel">
                            <div class="border-bottom text-secondary">

                                <div class="row py-2">

                                    <div class="col-lg-3">

                                        <h6>Scholastic Record</h6>

                                    </div>
                                    
                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-4  ">

                                    <label class="  pt-0"> Primary School/Addr.,</label>        

                                </div>

                                <div class="col-lg-8 ">

                                    <input class=" form-control form-control-sm" name="primary_school_address" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-4  ">

                                    <label class="  pt-0"> Primary Year Attended</label>        

                                </div>

                                <div class="col-lg-8 ">

                                    <input class=" form-control form-control-sm" name="primary_year_attended" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-4  pl-3 ">

                                    <label class="  pt-0 ">Secondary School/Addr.,</label>     

                                                            
                                </div>

                                <div class="col-lg-8 ">

                                    <input class=" form-control form-control-sm" name="secondary_school_address" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-4  pl-3 ">

                                    <label class="  pt-0"> Secondary School Year Attended</label>    

                                </div>

                                <div class="col-lg-8 ">

                                    <input class=" form-control form-control-sm" name="secondary_school_year_attended" type="text">

                                </div>
                          
                            </div> 
                            
                            <div class="row mt-4">

                                <div class="col-lg-4  pl-3 ">

                                    <label class="  pt-0 ">Honors Received</label>     

                                </div>

                                <div class="col-lg-8 ">
                                    
                                    <input class=" form-control form-control-sm" name="honors_received" type="text">
                                    
                                    <p class="text-secondary " style="font-size: 8pt;"> Type N/A if not applicable</p> 

                                </div>
                          
                            </div> 

                            <div class="row mt-3">

                                <div class="col-lg-4  pl-3">

                                    <label class="  pt-0 ">Affiliated Educational Organization(s) and Position(s)</label>    
                         
                                </div>

                                <div class="col-lg-8 ">

                                    <input class=" form-control form-control-sm" name="affiliated_educational_organizations_and_position" type="text">

                                    <p class="text-secondary" style="font-size: 8pt;"> Type N/A if not applicable</p> 

                                </div>
                          
                            </div> 

                            <div class="row mt-3">

                                <div class="col-lg-4  pl-3">

                                    <label class="  pt-0 ">Scholarships/Grants Received</label>     

                                                            
                                </div>

                                <div class="col-lg-8 ">

                                    <input class=" form-control form-control-sm" name="scholarships_grants_received" type="text">

                                    <p class="text-secondary" style="font-size: 8pt;"> Type N/A if not applicable</p> 

                                </div>
                          
                            </div> 

                            <div class="row mt-3">

                                <div class="col-lg-4  pl-3">

                                    <label class="  pt-0 ">Are you a working student?</label>     

                                                            
                                </div>

                                <div class="col-lg-8 ">

                                    <select name="working_student" id="" class="form-control form-control-sm"></select>    

                                </div>
                          
                            </div> 

                        </div>

                    <!-- Other Information -->

                        <div class="tab-pane fade container tab_container" id="nav-other_information" role="tabpanel">

                            <div class="border-bottom text-secondary">

                                <div class="row py-2">

                                    <div class="col-3">

                                        <h6>Other Information</h6>

                                    </div>
                                    
                                </div>

                            </div>

                            <div class="row mt-4 mb-1">

                                <div class="col">

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

                                <div class="col ">

                                <select name="oi_1" class="form-control">

                                    <option value="YES">Yes</option>
                                    <option value="NO">No</option>

                                </select>

                                </div>

                            </div>

                            <div class="row mt-lg-4 mt-3">

                                <div class="col  ">

                                    <label >How did you hear about MLQU?</label>  

                                </div> 

                            </div> 

                            <div class="row mb-3">

                                <div class="col ">

                                    <input class=" form-control form-control-sm" name="oi_2" type="text">

                                </div>

                            </div>
                            
                            <div class="row">

                                <div class="col">

                                    <label> Do you plan to apply for a scholarship?</label>

                                </div>

                            </div>

                            <div class="row mb-3">

                                <div class="col ">

                                    <select name="oi_3"  class="form-control"></select>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col">

                                    <label> What type of scholarship?</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col ">

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

