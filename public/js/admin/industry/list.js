$(function () {
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });   

   let table = $('#datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: routesindex,
      columns: [{
         data: 'name',
         name: 'name'
      },
      {
         data: 'action',
         name: 'action',
         orderable: false,
         searchable: false
      },
      ]
   });

   $('#createNewIndustry').click(function () {
      $(".print-error-msg").find("ul").html('');
      $(".print-error-msg").hide();
      $('#saveBtn').val("create-category");
      $('#industry_id').val('');
      $('#industryForm').trigger("reset");
      $("#preview").html('');
      $('#modelHeading').html("Add New Industry");
      $('#ajaxModel').modal('show');
      $('#showsuccess').hide();
   });

   $('body').on('click', '.editindustry', function () {
      $('#showsuccess').hide();
      $(".print-error-msg").find("ul").html('');
      $(".print-error-msg").hide();
      let industry_id = $(this).data('id');
      $.get(routesindex + '/' + industry_id + '/edit', function (data) {
         $('#modelHeading').html("Edit Industry");
         $('#saveBtn').val("edit-category");
         $('#ajaxModel').modal('show');
         $('#industry_id').val(data.id);
         $('#name').val(data.name);
         $('#oldimgpath').val(data.image);
      })
   });

   $("#industryForm").validate({
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
      },        
      messages: {
         name:"Industry name is required.",
      },
      submitHandler: function(form){
         submitform();
      }
   });

   function submitform(){    
      let frm = $('#industryForm');
      $.ajax({
         data: frm.serialize(),
         url: routesstore,
         type: "POST",
         dataType: 'json',         
         success: function (data) {            
            if ($.isEmptyObject(data.error)) {               
               frm.trigger("reset");
               $('#ajaxModel').modal('hide');
               $(".print-error-msg").find("ul").html('');
               table.draw();
               $('#success_alert_message').html('Industry saved successfully!');
               $('#showsuccess').show();               
            } else {
               printErrorMsg(data.error);
            }
         },
         error: function (data) {
            $('#saveBtn').html('Save Changes');
            printErrorMsg($.parseJSON(data.responseText).errors);
         }
      });            
   }

   $('body').on('click', '.deleteindustry', function () {
      let industry_id = $(this).data("id");
      $('#showsuccess').hide('');
      $('#success_alert_message').html('');      
      confirm("Are You sure want to delete !");
      $.ajax({
         type: "DELETE",
         url: routesindex + '/' + industry_id,
         success: function (data) {
            table.draw();
            $('#success_alert_message').html('Industry deleted successfully!');
            $('#showsuccess').show();
         },
         error: function (data) {
         }
      });
   });

});

function printErrorMsg(msg) {
   $(".print-error-msg").find("ul").html('');
   $(".print-error-msg").css('display', 'block');
   $.each(msg, function (key, value) {
      $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
   });
}