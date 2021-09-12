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
                    <input type="hidden" name="applicant_id"  id="txt_applicant_id">
                    <input type="hidden" name="requirement_id"  id="txt_requirement_id">
                    <input type="hidden" name="record_id"  id="txt_record_id">

                    <div class="modal-body container" style="" >

                        <div class="requirement-status d-none">
                            <label>Requirement Status</label>
                            <p id="txt_status" class="font-weight-bold pl-1"></p>
                        </div>

                        <label>Requirement</label>
                        <p id="txt_requirement" class="font-weight-bold pl-1"></p>

                        <div class="attach-document">
                            <label class="mt-1">Attach Document</label><br>
                            <div class="border py-2 px-1 rounded">
                                <input type="file" name="file" id="applicant_post_file" accept=".xls,.xlsx,.pdf,.doc,.docx" >
                            </div>
                        </div>

                        <div class="attached-document d-none">
                            <label class="mt-1">Attached Document</label><br>
                            <div class="px-1">
                                <p class="font-weight-bold pl-1 mb-0 pb-0"></p>
                                <a class="pl-1 mb-0 pb-0"  id="btn_dl_attachment"><i class="fas fa-file-download pr-1"></i> Download attachment</a>
                            </div>
                        </div>


                        

                    </div>

                    <div class="modal-footer text-center" style="border: none !important">
                        <div class="row">
                            <div class="col px-0 btn-full-width">
                                <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade input-modal shadow"  data-backdrop="static" data-keyboard="false" tabindex="-1" id="md_applicant_view_requirement">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="">
                <div class="modal-header text-center pt-3 pb-0">
                <h6> Submit Requirement </h6>
                </div>
                <form id="form_modal_applicant_requirement" enctype="multipart/form-data">

                    <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN']?>">
                    <input type="hidden" name="applicant_id"  id="txt_applicant_id">
                    <input type="hidden" name="requirement_id"  id="txt_requirement_id">
                    <input type="hidden" name="record_id"  id="txt_record_id">

                    <div class="modal-body container" style="" >
                    <embed src="../storage/files/1ff4e739e9613123969a297dc77bfe4a2b258298.pdf" width="600px" height="500px" />
                    </div>

                    <div class="modal-footer text-center" style="border: none !important">
                        <div class="row">
                            <div class="col px-0 btn-full-width">
                                <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>




<!-- APPLICANT MODALS -->


