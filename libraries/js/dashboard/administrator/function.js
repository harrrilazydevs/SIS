
// tbl_requirement?
$(document).ready(function(){
    
    load_requirements();
    load_buildings();
})




// REQUIREMENTS
    function load_requirements(){

        data = $('#form_applicant_set_program').serializeArray();
        data.push({name: 'action', value:'get'})
        
        $.ajax({

            type: 'post',
    
            url: 'api/dashboard/administrator/requirements.php',
    
            data: data,
    
            datatype: 'json',
    
            beforeSend: function() { },
    
            success: function (e) { 

                var toAppend;
                var count = 1;

                $.each(e, function(key,val){
                    toAppend += '<tr>';
                    toAppend += '<td class="text-center">'+count+'</td>';
                    toAppend += '<td>'+val.name+'</td>';
                    toAppend += '<td class="text-center">'+val.document_type+'</td>';
                    toAppend += '<td><i aria-name="'+val.name+'" aria-id="'+val.id+'" aria-document-type="'+val.document_type+'" class="md_edit far fa-edit fa-fw clickable text-primary"></i><i aria-id="'+val.id+'" class="md_delete far fa-trash-alt fa-fw clickable  text-primary"></i></td>';
                    toAppend += '</tr>';
                    count = count+1;
                })

                $('#tbl_requirement tbody').empty();
                $('#tbl_requirement tbody').append(toAppend);
            },

            complete: function () { 

                $('.md_delete').on('click', function(){
                    $('#md_admin_delete_requirement').attr('aria-id',$(this).attr('aria-id'))
                    $('#md_admin_delete_requirement').modal('show')
                });

                $('.md_edit').on('click', function(){
                    $('#md_admin_edit_requirement').attr('aria-id',$(this).attr('aria-id'))
                    $('#txt_name').val($(this).attr('aria-name'))
                    $('#sel_type').val($(this).attr('aria-document-type'))
                    $('#md_admin_edit_requirement').modal('show')
                });

            },
    
            error: function(xhr) { },
    
        });

    }

    $('form#f_admin_add_requirement').on('submit', function(e){
        e.preventDefault();
        data = $('#f_admin_add_requirement').serializeArray();
        data.push({name: 'action', value:'post'})
        $.ajax({
            type: 'post',
            url: 'api/dashboard/administrator/requirements.php',
            data:  data,
            dataType: 'json',
            beforeSend: function() {},
            success: function (e) {

                if (e == 200)
                {
                    $('#md_admin_add_requirement').modal('hide')
                    $('#modal_success .modal-body p').text('Requirement added successfully.')
                    $('#modal_success .modal-footer button').text('Close');
                    $('#modal_success .modal-footer button').addClass('click_reload');
                    $('#modal_success').modal('show')
                }
                if (e.status == 403 || e.status == 400 || e.status == 500)
                {
                    $('#md_admin_add_requirement').modal('hide')
                    $('#modal_fail .modal-body p').text(e.feedback)
                    $('#modal_fail .modal-footer button').text('Close');
                    $('#modal_fail').modal('show')
                }

                
            },
            complete: function() {

            
            },
            error: function(xhr) {  },
        });
    })

    $('form#f_admin_delete_requirement').on('submit', function(e){
        e.preventDefault();
        data = $('#f_admin_delete_requirement').serializeArray();
        data.push({name: 'action', value:'delete'})
        data.push({name: 'id', value:$('#md_admin_delete_requirement').attr('aria-id')})

        $.ajax({
            type: 'post',
            url: 'api/dashboard/administrator/requirements.php',
            data:  data,
            dataType: 'json',
            beforeSend: function() {},
            success: function (e) {

                if (e == 200)
                {
                    $('#md_admin_delete_requirement').modal('hide')
                    $('#modal_success .modal-body p').text('Requirement deleted successfully.')
                    $('#modal_success .modal-footer button').text('Close');
                    $('#modal_success .modal-footer button').addClass('click_reload');
                    $('#modal_success').modal('show')
                }
                if (e.status == 403 || e.status == 400 || e.status == 500)
                {
                    $('#md_admin_delete_requirement').modal('hide')
                    $('#modal_fail .modal-body p').text(e.feedback)
                    $('#modal_fail .modal-footer button').text('Close');
                    $('#modal_fail').modal('show')
                }

                
            },
            complete: function() {
            },
            error: function(xhr) {  },
        });
    })

    $('form#f_admin_edit_requirement').on('submit', function(e){

        e.preventDefault();
        data = $('#f_admin_edit_requirement').serializeArray();
        data.push({name: 'action', value:'put'})
        data.push({name: 'id', value:$('#md_admin_edit_requirement').attr('aria-id')})
        
        $.ajax({
            type: 'post',
            url: 'api/dashboard/administrator/requirements.php',
            data:  data,
            dataType: 'json',
            beforeSend: function() {},
            success: function (e) {

                if (e == 200)
                {
                    $('#md_admin_edit_requirement').modal('hide')
                    $('#modal_success .modal-body p').text('Requirement added successfully.')
                    $('#modal_success .modal-footer button').text('Close');
                    $('#modal_success .modal-footer button').addClass('click_reload');
                    $('#modal_success').modal('show')
                }
                if (e.status == 403 || e.status == 400 || e.status == 500)
                {
                    $('#md_admin_edit_requirement').modal('hide')
                    $('#modal_fail .modal-body p').text(e.feedback)
                    $('#modal_fail .modal-footer button').text('Close');
                    $('#modal_fail').modal('show')
                }

                
            },
            complete: function() {

            
            },
            error: function(xhr) {  },
        });
    })
// REQUIREMENTS


// BUILDINGS
    function load_buildings(){

        data = ({action: 'get'});
        
        $.ajax({

            type: 'post',

            url: 'api/dashboard/administrator/building_maintenance.php',

            data: data,

            datatype: 'json',

            beforeSend: function() { },

            success: function (e) { 

                var toAppend;
                var count = 1;

                $.each(e, function(key,val){
                    toAppend += '<tr>';
                    toAppend += '<td class="text-center">'+count+'</td>';
                    toAppend += '<td class="text-center">'+val.building_number+'</td>';
                    toAppend += '<td>'+val.name+'</td>';
                    toAppend += '<td class="text-center">'+val.description+'</td>';
                    toAppend += '<td><i aria-description="'+val.description+'" aria-name="'+val.name+'" aria-building-no="'+val.building_number+'" class="md_edit far fa-edit fa-fw clickable text-primary"></i><i aria-id="'+val.id+'" class="md_delete far fa-trash-alt fa-fw clickable  text-primary"></i></td>';
                    toAppend += '</tr>';
                    count = count+1;
                })

                $('#tbl_buildings tbody').empty();
                $('#tbl_buildings tbody').append(toAppend);
            },

            complete: function () { 

                $('.md_delete').on('click', function(){
                    $('#md_admin_delete_building').attr('aria-id',$(this).attr('aria-id'))
                    $('#md_admin_delete_building').modal('show')
                });

                $('.md_edit').on('click', function(){
                    $('#md_admin_edit_building').attr('aria-id',$(this).attr('aria-id'))
                    $('#txt_building_number').val($(this).attr('aria-building-no'))
                    $('#txt_building_name').val($(this).attr('aria-name'))
                    $('#txt_building_description').val($(this).attr('aria-description'))
                    $('#md_admin_edit_building').modal('show')
                });

            },

            error: function(xhr) { },

        });

    }

    $('form#f_admin_add_building').on('submit', function(e){
        e.preventDefault();
        data = $('#f_admin_add_building').serializeArray();
        data.push({name: 'action', value:'post'})
        $.ajax({
            type: 'post',
            url: 'api/dashboard/administrator/building_maintenance.php',
            data:  data,
            dataType: 'json',
            beforeSend: function() {},
            success: function (e) {

                if (e == 200)
                {
                    $('#md_admin_add_building').modal('hide')
                    $('#modal_success .modal-body p').text('Building added successfully.')
                    $('#modal_success .modal-footer button').text('Close');
                    $('#modal_success .modal-footer button').addClass('click_reload');
                    $('#modal_success').modal('show')
                }
                if (e.status == 403 || e.status == 400 || e.status == 500)
                {
                    $('#md_admin_add_building').modal('hide')
                    $('#modal_fail .modal-body p').text(e.feedback)
                    $('#modal_fail .modal-footer button').text('Close');
                    $('#modal_fail').modal('show')
                }
            },
            complete: function() {
            },
            error: function(xhr) {  },
        });
    })

    $('form#f_admin_delete_building').on('submit', function(e){
        e.preventDefault();
        data = $('#f_admin_delete_building').serializeArray();
        data.push({name: 'action', value:'delete'})
        data.push({name: 'id', value:$('#md_admin_delete_building').attr('aria-id')})

        $.ajax({
            type: 'post',
            url: 'api/dashboard/administrator/building_maintenance.php',
            data:  data,
            dataType: 'json',
            beforeSend: function() {},
            success: function (e) {

                if (e == 200)
                {
                    $('#md_admin_delete_building').modal('hide')
                    $('#modal_success .modal-body p').text('Building deleted successfully.')
                    $('#modal_success .modal-footer button').text('Close');
                    $('#modal_success .modal-footer button').addClass('click_reload');
                    $('#modal_success').modal('show')
                }
                if (e.status == 403 || e.status == 400 || e.status == 500)
                {
                    $('#md_admin_delete_building').modal('hide')
                    $('#modal_fail .modal-body p').text(e.feedback)
                    $('#modal_fail .modal-footer button').text('Close');
                    $('#modal_fail').modal('show')
                }

                
            },
            complete: function() {},
            error: function(xhr) {},
        });
    })

    $('form#f_admin_edit_building').on('submit', function(e){

        e.preventDefault();
        data = $('#f_admin_edit_building').serializeArray();
        data.push({name: 'action', value:'put'})
        data.push({name: 'id', value:$('#md_admin_edit_building').attr('aria-id')})
        
        $.ajax({
            type: 'post',
            url: 'api/dashboard/administrator/building_maintenance.php',
            data:  data,
            dataType: 'json',
            beforeSend: function() {},
            success: function (e) {

                if (e == 200)
                {
                    $('#md_admin_edit_building').modal('hide')
                    $('#modal_success .modal-body p').text('Building updated successfully.')
                    $('#modal_success .modal-footer button').text('Close');
                    $('#modal_success .modal-footer button').addClass('click_reload');
                    $('#modal_success').modal('show')
                }
                if (e.status == 403 || e.status == 400 || e.status == 500)
                {
                    $('#md_admin_edit_building').modal('hide')
                    $('#modal_fail .modal-body p').text(e.feedback)
                    $('#modal_fail .modal-footer button').text('Close');
                    $('#modal_fail').modal('show')
                }

                
            },
            complete: function() {

            
            },
            error: function(xhr) {  },
        });
    })

// BUILDINGS



