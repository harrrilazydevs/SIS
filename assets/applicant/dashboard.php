
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
                            <a class="nav-link ld_nav_link" data-toggle="tab" href="#nav-social_media" role="tab">Social Media</a>
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
                         
                    <!-- Profile -->
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
                                    <div class="row mt-3">
                                        <div class="col-lg-2">
                                            <label class="pt-1"> Applicant Type</label>
                                        </div>
                                        <div class="col-lg-10 text-left"> 
                                        <h6 class="pt-1" id="txt_applicant_type"></h6>
                                        </div>
                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> First Name</label> <label class="text-danger font-weight-bold">*</label>

                                        </div>

                                        <div class="col-lg-10 ">

                                            <input class="form-control form-control-sm form_bi" readonly name="firstname" type="text" >

                                        </div>

                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Middle Name </label>

                                        </div>

                                        <div class="col-lg-10 ">

                                            <input class="form-control form-control-sm form_bi" readonly name="middlename" type="text" >

                                        </div>

                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Last Name </label>
                                            <label class="text-danger font-weight-bold">*</label>

                                        </div>

                                        <div class="col-lg-10 ">

                                            <input class=" form-control form-control-sm form_bi" readonly name="lastname" type="text">

                                        </div>

                                    </div> 

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Suffix</label> 

                                        </div>

                                        <div class="col-lg-10  pl-3">

                                            <input class="form-control form-control-sm form_bi" readonly name="suffix" type="text">

                                        </div>

                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1">Mobile No </label>
                                            <label class="text-danger font-weight-bold">*</label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input class="form-control form-control-sm form_bi" readonly name="mobile_no" type="text" >
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

                                            <input class="form-control form-control-sm birthdate   form_bi" readonly aria-age="txt_applicant_age" name="date_of_birth" type="date">

                                        </div>

                                        <div class="col-lg-1 mt-lg-0 mt-4 pr-3 text-lg-right">

                                            <label class="pt-1"> Age </label>
                                        
                                        </div>

                                        <div class="col-lg-1 px-lg-0">

                                            <input class="form-control form-control-sm" name="age"  type="text" id="txt_applicant_age" readonly>

                                        </div>

                                        <div class="col-lg-2  pl-3 mt-lg-0 mt-4 pr-3 text-lg-right">

                                            <label class="pt-1"> Place of Birth </label>
                                        
                                        </div>

                                        <div class="col-lg-3 pl-0 ">

                                            <input class="form-control form-control-sm form_bi" readonly name="place_of_birth" type="text">

                                        </div>
                                
                                    </div>
                                    
                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">
                                            
                                            <label class="pt-1"> Gender </label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <select name="gender" class="form-control form-control-sm form_bi" readonly>
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
                                            
                                            <input class="form-control form-control-sm form_bi" readonly name="religion" type="text">

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Citizenship </label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input type="text" name="citizenship" id="txt_citizenship" class="form-control form-control-sm form_bi" readonly>

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4 d-none" id="div_acr">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> A.C.R. No </label><label class="text-danger font-weight-bold">*</label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input type="text" name="acr_no" id="txt_acr" class="form-control form-control-sm form_bi" readonly>

                                        </div>
                                
                                    </div>
                                    
                                    <div class="row mt-4 d-none" id="div_passport">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Passport No </label><label class="text-danger font-weight-bold">*</label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input type="text" name="passport_no" id="txt_passport" class="form-control form-control-sm form_bi" readonly>

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Civil Status </label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <select name="civil_status" id="txt_civil_status" class="form-control form-control-sm form_bi" readonly>
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

                                            <input type="text" name="spouse" id="txt_citizenship" class="form-control form-control-sm form_bi" readonly>

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-lg-2  pl-3 pr-lg-0">

                                            <label class="pt-0 ">Working Student</label>     

                                                                    
                                        </div>

                                        <div class="col-lg-10 ">

                                            <select name="working" id="sel_profile_working_student" class="form-control form-control-sm form_bi" readonly>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>    

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4 d-none" id="div_company">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Company </label><label class="text-danger font-weight-bold"> *</label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input type="text" name="company" id="txt_bi_company" class="form-control form-control-sm form_bi" readonly>

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4 d-none" id="div_position">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Position </label><label class="text-danger font-weight-bold"> *</label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input type="text" name="position" id="txt_bi_position" class="form-control form-control-sm form_bi" readonly>

                                        </div>
                                
                                    </div>

                                    <div class="row mt-4 d-none" id="div_income">

                                        <div class="col-lg-2  pl-3">

                                            <label class="pt-1"> Income </label><label class="text-danger font-weight-bold"> *</label>
                                        
                                        </div>

                                        <div class="col-lg-10 ">

                                            <input type="text" name="income" id="txt_bi_income" class="form-control form-control-sm form_bi" readonly>

                                        </div>
                                
                                    </div>

                                    

                                    <div class="row mt-4">

                                        <div class="col text-right  pl-3">

                                            <a class="btn btn-sm btn-secondary" id="btn_bi_update" style="font-size: 10pt !important;">Update</a>
                                        
                                            <button class="btn btn-primary d-none btn-sm" type="submit" id="btn_bi_save">Save Changes</button>
                                        
                                        </div>
                                
                                    </div>

                                </form>

                            </div>

                        </div>

                    <!-- Program -->
                        <div class="tab-pane fade container tab_container" id="nav_application_degree" role="tabpanel">
                         
                            <div class="border-bottom text-secondary pb-2">

                                <h6 class="my-0">Program</h6>
                                <small class="text-secondary my-0">Choose the program you are applying to.</small>
                               
                            </div>

                            <form id="f_applicant_program">

                                <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN']?>">
                                <input type="hidden" name="applicant_id" value="<?php echo $_SESSION['uid']?>">

                                <div class="row mt-4">
                                        
                                    <div class="col-lg-2">
                                    
                                        <label class="pt-1"> School </label>
                                    
                                    </div>
                                    
                                    <div class="col-lg-10 text-left"> 
                                    
                                        <select id="sel_bi_school"  class="form-control form-control-sm"></select>
                                        
                                    </div>
                                    
                                </div>

                                <div class="row mt-4">
                                    
                                    <div class="col-lg-2">
                                        
                                        <label class="pt-1"> Program </label>
                                    
                                    </div>
                                    
                                    <div class="col-lg-10 text-left"> 
                                    
                                        <select name="program_id" id="sel_bi_program"  class="form-control form-control-sm"></select>
                                    
                                    </div>
                                    
                                </div>

                                <div class="row mt-4">

                                    <div class="col text-right">

                                        <button class="btn btn-primary btn-sm d-none" id="btn_program_submit" type="submit">Save Changes</button>

                                    </div>
                                    
                                </div>

                            </form>

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

                            <form id="f_applicant_address">

                                <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN']?>">
                                <input type="hidden" name="applicant_id" value="<?php echo $_SESSION['uid']?>">

                                <div class=" text-secondary">

                                    <div class="row">

                                        <div class="col mt-4 mb-0">

                                            <h6  class="text-center mb-3 pb-1" style="fontsize: 9pt !important;" >City Address</h6>

                                        </div>
                                    
                                    </div>

                                </div>  

                                <div class="row mt-1">

                                    <div class="col-lg-3 pl-3">

                                        <label class="pt-1 "> Bldg/No/St/Sbdv </label>      

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class="form-control form-control-sm form_address" name="city_no_st_sbdv" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">
                                    
                                    <div class="col-lg-3 pl-3">

                                        <label class="pt-1"> Barangay </label>   

                                    </div>

                                    <div class="col-lg-9 ">
                                        
                                        <input class=" form-control form-control-sm form_address" name="city_brgy" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3 pl-3">

                                        <label class="pt-1"> City </label>     

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form_address" name="city_city" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3 pl-3">

                                        <label class="pt-1"> Zip Code </label>       

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form_address" name="city_zipcode" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class=" text-secondary">

                                    <div class="row">

                                        <div class="col mt-4 mb-0">

                                            <h6 class="text-center mb-3 pb-1 border-bottom" style="fontsize: 9pt !important;" >Provincial Address</h6>

                                        </div>
                                    
                                    </div>

                                </div>  

                                

                                <div class="row mt-1">

                                    <div class="col-lg-3  pl-3">

                                        <label class="pt-1"> Bldg/No/St/Sbdv </label>        

                                    </div>

                                    <div class="col-lg-9  pl-3">

                                        <input class=" form-control form-control-sm form_address" name="province_no_st_sbdv" type="text" readonly>

                                    </div>
                            
                                </div>  

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3">

                                        <label class="pt-1"> Barangay </label>      

                                    </div>

                                    <div class="col-lg-9  pl-3">

                                        <input class=" form-control form-control-sm form_address" name="province_brgy" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3">

                                        <label class="pt-1"> City </label>    

                                    </div>

                                    <div class="col-lg-9 ">
                                        
                                        <input class=" form-control form-control-sm form_address" name="province_city" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3">

                                        <label class="pt-1"> Zip Code </label>     

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form_address" name="province_zipcode" type="text" readonly>

                                    </div>

                                </div>

                                <div class="row mt-4">

                                    <div class="col text-right  pl-3">
                                        
                                        <a class="btn btn-sm btn-secondary" id="btn_address_update">Update</a>

                                        <button class="btn btn-primary d-none btn-sm" type="submit" id="btn_address_save">Save Changes</button>

                                    </div>

                                </div>

                            </form>

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

                            <form id="f_applicant_family">

                                <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN']?>">
                                <input type="hidden" name="applicant_id" value="<?php echo $_SESSION['uid']?>">

                                <div class="row mt-4">

                                        <div class="col-lg-3  pl-3">

                                            <label class="pt-1 "> No. of Siblings </label>   

                                        </div>

                                        <div class="col-lg-9 ">

                                            <input class=" form-control form-control-sm form-fr" name="no_siblings" type="text" readonly>

                                        </div>
                                
                                    </div> 

                                    <div class="row mt-4">

                                        <div class="col-lg-3  pl-3">

                                            <label class="pt-1 "> Monthly Family Income </label>    

                                        </div>

                                        <div class="col-lg-9 ">

                                            <input name="monthly_income" id="" class="form-control form-control-sm form-fr" readonly></input>

                                        </div>
                                
                                    </div> 

                                <div class="row">

                                    <div class="col mt-4 mb-0">

                                        <h6  class="text-center text-secondary mb-3 pb-1 border-bottom" style="fontsize: 9pt !important;" >Father</h6>

                                    </div>
                                        
                                </div>

                                <div class="row">

                                    <div class="col-lg-3  pl-3 ">

                                        <label class="pt-1 "> Full Name </label> 

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="father_name" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3 ">

                                        <label class="pt-1 "> Occupation </label>        

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="father_occupation" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3 ">

                                        <label class="pt-1 "> Mobile No </label>        

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="father_mobile_no" type="text" readonly>

                                    </div>

                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3 ">

                                        <label class="pt-1 "> Email </label>        

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="father_email" type="text" readonly>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col mt-4 mb-0">

                                        <h6  class="text-center text-secondary mb-3 pb-1 border-bottom" style="fontsize: 9pt !important;" >Mother</h6>

                                    </div>
                                        
                                </div>

                                <div class="row">

                                    <div class="col-lg-3  pl-3">

                                        <label class="pt-1 "> Maiden Name </label>    

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="mother_name" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3 ">

                                        <label class="pt-1 "> Occupation </label> 

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="mother_occupation" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3 ">

                                        <label class="pt-1 "> Mobile No </label>        

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="mother_mobile_no" type="text" readonly>

                                    </div>

                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3 ">

                                        <label class="pt-1 "> Email </label>        

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="mother_email" type="text" readonly>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col mt-4 mb-0">

                                        <h6  class="text-center text-secondary mb-3 pb-1 border-bottom" style="fontsize: 9pt !important;" >Guardian</h6>

                                    </div>
                                        
                                </div>
                                
                                <div class="row">

                                    <div class="col-lg-3  pl-3">

                                        <label class="pt-1 "> Full Name </label>    

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="guardian_name" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3 ">

                                        <label class="pt-1 "> Occupation </label> 

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="guardian_occupation" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3 ">

                                        <label class="pt-1 "> Mobile No </label>        

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="guardian_mobile_no" type="text" readonly>

                                    </div>

                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-3  pl-3 ">

                                        <label class="pt-1 "> Email </label>        

                                    </div>

                                    <div class="col-lg-9 ">

                                        <input class=" form-control form-control-sm form-fr" name="guardian_email" type="text" readonly>

                                    </div>

                                </div>

                                <div class="row mt-4">

                                    <div class="col text-right  pl-3">
                                        
                                        <a class="btn btn-sm btn-secondary f_btn_update" form-class=".form-fr" submit-btn-name="#btn_family_save">Update</a>

                                        <button class="btn btn-primary d-none btn-sm" type="submit" id="btn_family_save">Save Changes</button>

                                    </div>

                                </div>

                            </form>

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

                            <div class="row">

                                <div class="col mt-4 mb-0">

                                    <h6  class="text-center text-secondary mb-3 pb-1 " style="fontsize: 9pt !important;" >High School</h6>

                                </div>
                                    
                            </div>

                            <div class="row mt-2">

                                <div class="col-lg-3  ">

                                    <label class="pt-0"> School Name</label>        

                                </div>

                                <div class="col-lg-9 ">

                                    <input class=" form-control form-control-sm" name="primary_school_address" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-3  ">

                                    <label class="pt-0"> School Address</label>        

                                </div>

                                <div class="col-lg-9 ">

                                    <input class=" form-control form-control-sm" name="primary_school_address" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-3  ">

                                    <label class="pt-0"> School Year Attended</label>        

                                </div>

                                <div class="col-lg-9 ">

                                    <input class=" form-control form-control-sm" name="primary_school_address" type="text">
                                    <p class="text-secondary" style="font-size: 8pt;"> Ex. ( 2015 - 2020 )</p> 

                                </div>
                          
                            </div> 

                            <div class="row mt-2">

                                <div class="col-lg-3  ">

                                    <label class="pt-0"> Honors Received</label>        

                                </div>

                                <div class="col-lg-9 ">

                                    <input  type="text" class=" form-control form-control-sm" data-role="tagsinput" name="primary_school_address">
                                    <p class="text-secondary" style="font-size: 8pt;"> Click outside textbox to add another</p> 

                                </div>
                          
                            </div> 

                            <div class="row mt-2">

                                <div class="col-lg-3  ">

                                    <label class="pt-0"> Group/Org/Club</label>        

                                </div>

                                <div class="col-lg-9 ">

                                    <input  type="text" class=" form-control form-control-sm" data-role="tagsinput" name="primary_school_address">
                                    <p class="text-secondary" style="font-size: 8pt;"> Ex. (Org. Name - Position) If applicable</p> 

                                </div>
                          
                            </div> 

                            <div class="row">

                                <div class="col mt-4 mb-0">

                                    <h6  class="text-center text-secondary mb-3 pb-1 border-bottom" style="fontsize: 9pt !important;" >Senior High School</h6>

                                </div>
                                    
                            </div>

                            <div class="row mt-2">

                                <div class="col-lg-3  ">

                                    <label class="pt-0"> School Name</label>        

                                </div>

                                <div class="col-lg-9 ">

                                    <input class=" form-control form-control-sm" name="primary_school_address" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-3  ">

                                    <label class="pt-0"> School Address</label>        

                                </div>

                                <div class="col-lg-9 ">

                                    <input class=" form-control form-control-sm" name="primary_school_address" type="text">

                                </div>
                          
                            </div> 

                            <div class="row mt-4">

                                <div class="col-lg-3  ">

                                    <label class="pt-0"> School Year Attended</label>        

                                </div>

                                <div class="col-lg-9 ">

                                    <input class=" form-control form-control-sm" name="primary_school_address" type="text">
                                    <p class="text-secondary" style="font-size: 8pt;"> Ex. ( 2015 - 2020 )</p> 

                                </div>
                          
                            </div> 

                            <div class="row mt-2">

                                <div class="col-lg-3  ">

                                    <label class="pt-0"> Honors Received</label>        

                                </div>

                                <div class="col-lg-9 ">

                                    <input  type="text" class=" form-control form-control-sm" data-role="tagsinput" name="primary_school_address">
                                    <p class="text-secondary" style="font-size: 8pt;"> Click outside textbox to add another</p> 

                                </div>
                          
                            </div> 

                            <div class="row mt-2">

                                <div class="col-lg-3  ">

                                    <label class="pt-0"> Group/Org/Club</label>        

                                </div>

                                <div class="col-lg-9 ">

                                    <input  type="text" class=" form-control form-control-sm" data-role="tagsinput" name="primary_school_address">
                                    <p class="text-secondary" style="font-size: 8pt;"> Ex. (Org. Name - Position) If applicable</p> 

                                </div>
                          
                            </div> 

                        </div>

                    <!-- Social Media & messenger -->
                        <div class="tab-pane fade container tab_container" id="nav-social_media" role="tabpanel">
                         
                            <div class="border-bottom text-secondary pb-2">

                                <h6 class="my-0">Social Media & Messenger Accounts</h6>
                                <small class="text-secondary my-0">We want to stay connected! Kindly enter your account names.</small>
                                
                            </div>

                            <form id="f_applicant_program">

                                <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN']?>">
                                <input type="hidden" name="applicant_id" value="<?php echo $_SESSION['uid']?>">

                                <div class="row mt-4">

                                    <div class="col mb-0">

                                        <h6  class="text-center text-secondary mb-3 pb-1 " style="fontsize: 9pt !important;" >Email</h6>

                                    </div>
                                        
                                </div>

                                <div class="row">

                                    <div class="col-lg-2  pl-3 ">

                                        <label class="pt-1 "> Email 1 </label>        

                                    </div>

                                    <div class="col-lg-10 ">

                                        <input class=" form-control form-control-sm form-fr" name="fathers_occupation" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-2  pl-3 ">

                                        <label class="pt-1 "> Email 2 </label>        

                                    </div>

                                    <div class="col-lg-10 ">

                                        <input class=" form-control form-control-sm form-fr" name="fathers_occupation" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row">

                                    <div class="col mt-4 mb-0">

                                        <h6  class="text-center text-secondary mb-3 pb-1 border-bottom" style="fontsize: 9pt !important;" >Messenger</h6>

                                    </div>
                                        
                                </div>

                                <div class="row  mt-2">

                                    <div class="col-lg-2  pl-3 ">

                                        <label class="pt-1 "> Viber </label>        

                                    </div>

                                    <div class="col-lg-10 ">

                                        <input class=" form-control form-control-sm form-fr" name="fathers_occupation" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-2  pl-3 ">

                                        <label class="pt-1 "> FB Messenger </label>        

                                    </div>

                                    <div class="col-lg-10 ">

                                        <input class=" form-control form-control-sm form-fr" name="fathers_occupation" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-2  pl-3 ">

                                        <label class="pt-1 "> Telegram </label>        

                                    </div>

                                    <div class="col-lg-10 ">

                                        <input class=" form-control form-control-sm form-fr" name="fathers_occupation" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row">

                                    <div class="col mt-4 mb-0">

                                        <h6  class="text-center text-secondary mb-3 pb-1 border-bottom" style="fontsize: 9pt !important;" >Social Media</h6>

                                    </div>
                                        
                                </div>

                                <div class="row">

                                    <div class="col-lg-2  pl-3 ">

                                        <label class="pt-1 "> Facebook </label>        

                                    </div>

                                    <div class="col-lg-10 ">

                                        <input class=" form-control form-control-sm form-fr" name="fathers_occupation" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-2  pl-3 ">

                                        <label class="pt-1 "> Twitter </label>        

                                    </div>

                                    <div class="col-lg-10 ">

                                        <input class=" form-control form-control-sm form-fr" name="fathers_occupation" type="text" readonly>

                                    </div>
                            
                                </div> 

                                <div class="row mt-4">

                                    <div class="col-lg-2  pl-3 ">

                                        <label class="pt-1 "> Instagram </label>        

                                    </div>

                                    <div class="col-lg-10 ">

                                        <input class=" form-control form-control-sm form-fr" name="fathers_occupation" type="text" readonly>

                                    </div>
                            
                                </div> 




                                <div class="row mt-4">

                                    <div class="col text-right">

                                        <button class="btn btn-primary btn-sm d-none" id="btn_program_submit" type="submit">Save Changes</button>

                                    </div>
                                    
                                </div>

                            </form>

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

