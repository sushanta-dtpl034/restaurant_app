$(function () {

    $('#createNewcategory').click(function () {
        $('#saveBtn').val("create-category");
        $('#category_id').val('');
        $('#addForm').trigger("reset");
        $("#preview").html('');
        $('#modelHeading').html("Add New Cuisine");
        $('#frmModel').modal('show');
        $('#showsuccess').hide();
     });
  
     $('body').on('click', '.editcategory', function () {
        $('#showsuccess').hide();
        let category_id = $(this).data('id');
        $.get(routesindex + '/' + category_id + '/edit', function (data) {
           $('#modelHeading').html("Edit Cuisine");
           $('#saveBtn').val("edit-category");
           $('#frmModel').modal('show');
           $('#category_id').val(data.id);
           $('#name').val(data.name);
           $('#oldimgpath').val(data.image);
           $("#preview").html('<img src="'+data.imagepath+'" width="100" />');
        })
     });
  
     $("#addForm").validate({
        errorClass: 'invalid-input',
        errorElement: 'div',
        highlight: function(element, errorClass, validClass) {
           $(element).closest('form').addClass('was-validated');
        },
        unhighlight: function(element, errorClass, validClass) {
              $(element).closest('form').removeClass('was-validated');
        },
        rules:{
           name:"required",
           image: {
              extension: "jpg,jpeg,png",
              required: function(element){
                 return $("#oldimgpath").val()==="";
              }, 
           }
        },         
        messages: {
           name:"Cuisine name is required.",
           image: {
              extension: "Please upload .jpg or .png or .pdf file of notice.",
              required: "Please upload image.", 
           }
        },         
        submitHandler: function(form){
           submitform();		
        }
     });
  
     function submitform(){
        let frm = $('#addForm');
        let formData = new FormData(frm[0]);
        formData.append('file', $('input[type=file]')[0].files[0]);
  
        $.ajax({
           data: formData,
           url: routesstore,
           type: "POST",
           dataType: 'json',
           processData: false,
           contentType: false,
           success: function (data) {
              if ($.isEmptyObject(data.error)) {
                 
                 frm.trigger("reset");
                 $('#frmModel').modal('hide');
                 $(".print-error-msg").find("ul").html('');
                 table.draw();
                 $('#success_alert_message').html('Cuisine saved successfully!');
                 $('#showsuccess').show();               
              } else {
                 printErrorMsg(data.error);
              }
           },
           error: function (data) {
              $('#saveBtn').html('Save Changes');
           }
        });            
     }
});