<?php
!isset($_SESSION) ? session_start() : '';
?>
<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="modal_login">
            
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content ">
    
            <div class="modal-body text-center py-5">
    
                <p style="font-size: 15pt;"></p>
    
                <i class="far fa-check-circle fa-2x" style="color: green !important;"></i>
    
            </div>
    
            <div class="modal-footer text-center">
    
                <a  class="btn btn-primary" href="index.php" >Go to Dashboard</a>
    
            </div>
    
        </div>
    
    </div>

</div>


<!-- <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="modal_user">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center pt-3 pb-0">
               <h6> Requirement Information </h6>
            </div>
            <form id="form_modal_applicant_requirement" enctype="multipart/form-data">
                <div class="modal-body"></div>
                <div class="modal-footer text-center">
                    <div class="row">
                        <div class="col px-0 btn-full-width">
                            <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->

<div class="modal fade" id="modal_input_enrollee" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

        <form id="form_input_enrollee" enctype="multipart/form-data">
            <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">Import Data</h5>

            </div>
           
            <div class="modal-body" style="max-height: 350px !important; overflow-y: scroll;">

                <div class="container py-2" style="font-size: 10pt;">

                        <label class="mt-1"> Student No.</label>
                        <input type="text" name="student_no" class="form-control form-control-sm">

                        <label class="mt-2">Name</label>
                        <input type="text" name="student_name" class="form-control form-control-sm">

                        <label class="mt-2">Department/School</label>
                        <select class="form-control form-control-sm" name="school_id"> 
                           <option value="1">School of Law</option>
                           <option value="2">School of Graduate Studies</option>
                           <option value="3">School of Engineering</option>
                           <option value="4">School of Architecture</option>
                           <option value="5">School of Criminal Justice</option>
                           <option value="6">SMART</option>
                        </select>

                        <label class="mt-2">Year</label>
                        <select class="form-control form-control-sm" name="year"> 
                            <option value="1ST">1st</option>
                            <option value="2ND">2nd</option>
                            <option value="3RD">3rd</option>
                            <option value="4TH">4th</option>
                            <option value="5TH">5th</option>
                        </select>

                        <label class="mt-2">Academic Year</label>
                        <input type="text" class="form-control form-control-sm" name="academic_year" value="AY 2021-2022">

                        <label class="mt-2">Semester</label>
                        <select class="form-control form-control-sm" name="semester"> 
                            <option value="1ST SEM">1st sem</option>
                            <option value="2ND SEM">2nd sem</option>
                        </select>   

                        <label class="mt-2">Enrollment Type</label>
                        <select class="form-control form-control-sm" name="enrollment_type"> 
                            <option>WALK-IN</option>
                            <option>ONLINE</option>
                        </select> 

                        <label class="mt-2">Inputted by</label>
                        <select class="form-control form-control-sm" name="inputted_by"> 
                            <option value="ARMIE">Armie</option>
                            <option value="GERALDINE">Geraldine</option>
                            <option value="LAICA">Laica</option>
                            <option value="JUDY">Judy</option>
                        </select> 

                        <label class="mt-2">Date Enrolled</label>
                        <input type="date" class="form-control form-control-sm" name="date_enrolled" value="AY 2021-2022">

                        <label class="mt-2">Subject Enrolled</label>
                        <textarea class="form-control form-control-sm" name="course_list" id="" cols="30" rows="4"></textarea>

                        <label class="mt-2">Attachment</label> <br>
                        <input type="file" id="file" name="file"/>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>

                <button type="submit" class="btn btn-sm btn-primary" >Submit</button>

               

            </div>

            </form>

        </div>

    </div>

</div>


<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="modal_success">
            
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
    
            <div class="modal-body text-center py-5">
    
                <p style="font-size: 15pt;"></p>
    
                <i class="far fa-check-circle fa-2x" style="color: green !important;"></i>
    
            </div>
    
            <div class="modal-footer text-center">
    
               <button class="btn btn-secondary click_reload" data-dismiss="modal" id="btn_modal"></button>
    
            </div>
    
        </div>
    
    </div>

</div>

<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="modal_fail">
            
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
    
            <div class="modal-body text-center py-5">
    
                <p style="font-size: 15pt;"></p>
    
                <i class="far fa-times-circle fa-2x" style="color: red !important;"></i>
    
            </div>
    
            <div class="modal-footer text-center">
    
               <button class="btn btn-secondary" data-dismiss="modal"></button>
    
            </div>
    
        </div>
    
    </div>

</div>


<!-- APPLICANT MODALS -->
    <div class="modal fade input-modal shadow"  data-backdrop="static" data-keyboard="false" tabindex="-1" id="md_applicant_post_requirement">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="">
                <div class="modal-header text-center pt-3 pb-0">
                <h6> Submit Requirement </h6>
                </div>
                <form id="form_modal_applicant_requirement" enctype="multipart/form-data">

                    <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN']?>">
                    <input type="hidden" name="applicant_id" id="txt_applicant_id">
                    <input type="hidden" name="requirement_id" id="txt_requirement_id">
                    <input type="hidden" name="record_id" id="txt_record_id">

                    <div class="modal-body container" style="" >

                        <div class="requirement-status d-none">
                            <label>Requirement Status</label>
                            <p id="txt_status" class="font-weight-bold pl-1"></p>
                        </div>

                        <label>Requirement</label>
                        <p id="txt_requirement" class="font-weight-bold pl-1 "></p>

                        <div class="attach-document">
                            <label class="">Attach Document</label><br>
                            <div class="border py-2 px-1 rounded">
                                <input type="file" name="file" id="applicant_post_file" accept=".xls,.xlsx,.pdf,.doc,.docx" >
                            </div>
                        </div>

                        <div class="attached-document d-none">
                            <label class="mt-1">Attached Document</label><br>
                            <div class="px-1">
                                <p class="font-weight-bold pl-1 mb-3 pb-0 file_name"></p>
                            </div>
                        </div>

                        <div class="controls d-none">
                            <label>Controls</label>
                            <ul class="list-group list-group-flush border rounded ">
                                <li class="list-group-item py-1"><a class="pl-1 mb-0 pb-0"  id="btn_dl_attachment"><i class="fa-fw pr-1 fas fa-file-download"></i> Download attachment</a></li>
                                <li class="list-group-item py-1"><a class="pl-1 mb-0 pb-0"  id="btn_e_attachment"><i class="fa-fw pr-1 fas fa-pencil-alt"></i> Edit attachment</a></li>
                                <li class="list-group-item py-1"><a class="pl-1 mb-0 pb-0"  id="btn_r_attachment"><i class="fa-fw pr-1 fas fa-trash-alt"></i> Remove attachment</a></li>
                            </ul>
                        </div>

                    </div>

                    <div class="modal-footer text-center" style="border: none !important">
                        <div class="row">
                            <div class="col px-0 btn-full-width">
                                <button class="btn btn-sm btn-secondary d-none" type="button" id="btn_back">Back</button>
                                <button class="btn btn-sm btn-secondary" data-dismiss="modal"  type="button">Close</button>
                                <button class="btn btn-sm btn-primary" type="submit" >Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="modal fade input-modal shadow"  data-backdrop="static" data-keyboard="false" tabindex="-1" id="md_confirm">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="">
                <div class="modal-header text-center pt-3 pb-0">
                <h6> Confirm </h6>
                </div>
                <form id="form_modal_applicant_remove_requirement" enctype="multipart/form-data">
                    <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN']?>">
                    <input type="hidden" id="txt_id" name='id' value="">
                    <div class="modal-body" style="" >
                        <p class="pl-3 my-2"></p>
                    </div>

                    <div class="modal-footer text-center">
                        <div class="row">
                            <div class="col px-0 btn-full-width">
                                <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-sm btn-primary" type="submit" >Confirm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CHANGE PASSWORD -->
    <div class="modal fade shadow"  data-backdrop="static" data-keyboard="false" tabindex="-1" id="md_applicant_change_password">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content " style="">
                <div class=" text-center pt-4 pb-0">
                    <h5>WELCOME TO MLQU!</h5>
                </div>

                <div class="modal-body">

                    <p>Warm greetings applicant! Aenean tempus id nulla eu sollicitudin. Aliquam gravida lacus a nisl ullamcorper, vitae iaculis leo fermentum. In et sodales eros, hendrerit egestas justo. Integer magna eros, laoreet at dictum in, viverra eget turpis. Aliquam euismod enim id nisi viverra, rhoncus suscipit nibh ultricies. Sed condimentum et ante vitae bibendum. Fusce tempus eros vel leo hendrerit gravida. Suspendisse est nunc</p> <br>

                    <p>Get started by changing your password.</p>

                </div>
               


                <div class="modal-footer text-center" style="border: none !important">
                    <div class="row">
                        <div class="col px-0 btn-full-width">
                            <button class="btn btn-sm btn-secondary" data-dismiss="modal"  type="button">Okay</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- FIRST LOGIN -->
    <div class="modal fade shadow"  data-backdrop="static" data-keyboard="false" tabindex="-1" id="md_applicant_first_login">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content " style="">
                <div class=" text-center pt-4 pb-0">
                    <h5>WELCOME TO MLQU!</h5>
                </div>



                <div class="modal-body">

        <hr>        

                    <p>Warm greetings applicant! Aenean tempus id nulla eu sollicitudin. Aliquam gravida lacus a nisl ullamcorper, vitae iaculis leo fermentum. In et sodales eros, hendrerit egestas justo. Integer magna eros, laoreet at dictum in, viverra eget turpis. Aliquam euismod enim id nisi viverra, rhoncus suscipit nibh ultricies. Sed condimentum et ante vitae bibendum. Fusce tempus eros vel leo hendrerit gravida. Suspendisse est nunc</p> <br>


                    <p>You have 3 days to complete your application.</p>

                </div>
               


                <div class="modal-footer text-center" style="border: none !important">
                    <div class="row">
                        <div class="col px-0 btn-full-width">
                            <button class="btn btn-sm btn-secondary" data-dismiss="modal"  type="button">Okay</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- NOT FILIPINO MODAL -->
    <div class="modal fade input-modal shadow"  data-backdrop="static" data-keyboard="false" tabindex="-1" id="md_not_filipino">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="">
                <div class="modal-header text-center pt-3 pb-0">
                <h6> Information </h6>
                </div>

                <div class="modal-body">
                Foreign students needs to enter their ACR and PASSPORT Number.
                </div>

                  
              

                    <div class="modal-footer text-center">
                        <div class="row">
                            <div class="col px-0 btn-full-width">
                                <button class="btn btn-sm btn-secondary" type="button"  data-dismiss="modal">Okay</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

     <!-- SELECT PROGRAM MODAL -->
     <div class="modal fade input-modal shadow"  data-backdrop="static" data-keyboard="false" tabindex="-1" id="md_applicant_sel_program">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="">
                <div class="modal-header text-center pt-3 pb-0">
                    <h6> Set Applicant Type </h6>
                </div>

                <form id="form_applicant_set_program">

                    <div class="modal-body">

                        <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN']?>">
                        <input type="hidden" name="applicant_id" value="<?php echo $_SESSION['uid']?>">

                        <label class="pt-1 "> Applicant Type </label>
                        <select name="applicant_type"  class="form-control form-control-sm mb-3">
                            <option value="FROSH">Frosh</option>
                            <option value="TRANSFEREE">Transferee</option>
                        </select>

                        <label class="pt-1"> School </label>
                        <select id="sel_school"  class="form-control form-control-sm"></select>

                        <label class="pt-1 mt-2"> Program </label>
                        <select name="program_id" id="sel_program"  class="form-control form-control-sm"></select>
                    
                    </div>

                    <div class="modal-footer text-center">
                        <div class="row">
                            <div class="col px-0 btn-full-width">
                                <button class="btn btn-sm btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<!-- APPLICANT MODALS -->



<!-- ADMINISTRATOR MODALS -->

    <!-- REQUIREMENTS -->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="md_admin_add_requirement">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center pt-3 pb-0">
                    <h6>Add Requirement</h6>
                    </div>
                    <form id="f_admin_add_requirement" enctype="multipart/form-data" class="form_design">
                        <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN'];?>">
                        <div class="modal-body">

                            <label for="">Requirement</label>
                            <input type="text" name="name" class="form-control form-control-sm">

                            <label for="">Document Type</label>
                            <select name="document_type" class="form-control form-control-sm">
                                <option value="PDF">PDF</option>
                                <option value="PHOTO">Photo</option>
                            </select>

                        </div>
                        <div class="modal-footer text-center">
                            <div class="row">
                                <div class="col px-0 ">
                                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" data-backdrop="static" data-keyboard="false" aria-id="" tabindex="-1" id="md_admin_delete_requirement">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center pt-3 pb-0">
                    <h6> Confirm </h6>
                    </div>
                    <form id="f_admin_delete_requirement" enctype="multipart/form-data">
                        <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN']?>">
                        <div class="modal-body" style="" >
                            <p class="pl-3 my-2">Do you want to delete this requirement?</p>
                        </div>

                        <div class="modal-footer text-center">
                            <div class="row">
                                <div class="col px-0 btn-full-width">
                                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-sm btn-primary" type="submit" >Confirm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" data-backdrop="static" data-keyboard="false" aria-id="" tabindex="-1" id="md_admin_edit_requirement">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center pt-3 pb-0">
                    <h6>Edit Requirement</h6>
                    </div>
                    <form id="f_admin_edit_requirement" enctype="multipart/form-data" class="form_design">
                        <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN'];?>">
                        <div class="modal-body">

                            <label for="">Requirement</label>
                            <input type="text" name="name" id="txt_name" class="form-control form-control-sm">

                            <label for="">Document Type</label>
                            <select name="document_type" id="sel_type" class="form-control form-control-sm">
                                <option value="PDF">PDF</option>
                                <option value="PHOTO">Photo</option>
                            </select>

                        </div>
                        <div class="modal-footer text-center">
                            <div class="row">
                                <div class="col px-0 ">
                                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- REQUIREMENTS -->

    <!-- BUILDING MAINTENANCE -->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="md_admin_add_building">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-center pt-3 pb-0">
                        <h6>Add Building</h6>
                        </div>
                        <form id="f_admin_add_building" enctype="multipart/form-data" class="form_design">
                            <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN'];?>">
                            <div class="modal-body">

                                <label for="">Building Number</label>
                                <input type="text" name="building_number" class="form-control form-control-sm">

                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control form-control-sm">

                                <label for="">Description</label>
                                <input type="text" name="description" class="form-control form-control-sm">

                            </div>
                            <div class="modal-footer text-center">
                                <div class="row">
                                    <div class="col px-0 ">
                                        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                        <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" data-backdrop="static" data-keyboard="false" aria-id="" tabindex="-1" id="md_admin_delete_building">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-center pt-3 pb-0">
                        <h6> Confirm </h6>
                        </div>
                        <form id="f_admin_delete_building" enctype="multipart/form-data">
                            <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN']?>">
                            <div class="modal-body" style="" >
                                <p class="pl-3 my-2">Do you want to delete this building?</p>
                            </div>

                            <div class="modal-footer text-center">
                                <div class="row">
                                    <div class="col px-0 btn-full-width">
                                        <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-sm btn-primary" type="submit" >Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" data-backdrop="static" data-keyboard="false" aria-id="" tabindex="-1" id="md_admin_edit_building">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-center pt-3 pb-0">
                        <h6>Edit Building</h6>
                        </div>
                        <form id="f_admin_edit_building" enctype="multipart/form-data" class="form_design">
                            <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN'];?>">
                            <div class="modal-body">

                                <label for="">Building Number</label>
                                <input type="text" name="building_number" id="txt_building_number" class="form-control form-control-sm">

                                <label for="">Name</label>
                                <input type="text" name="name" id="txt_building_name" class="form-control form-control-sm">

                                <label for="">Description</label>
                                <input type="text" name="description" id="txt_building_description" class="form-control form-control-sm">

                            </div>
                            <div class="modal-footer text-center">
                                <div class="row">
                                    <div class="col px-0 ">
                                        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                        <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <!-- BUILDING MAINTENANCE -->



<!-- ADMINISTRATOR MODALS -->



