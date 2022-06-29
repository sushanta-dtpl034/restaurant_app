$(function () {
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

   $('#image').change(function(){
      $("#preview").html('');
      let imgurl = window.URL.createObjectURL(this.files[0]);
      if(imgurl) {
         $("#preview").html('<img src="'+imgurl+'" width="100" />');
      }
  });

   let table = $('#datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: routesindex,
      columns: [{
         data: 'image',
         name: 'image',
         orderable: false,
         searchable: false,
         render: function( data, type, full, meta ) {
            return '<img class="bg-soft-primary rounded img-fluid me-3" src="' + data + '" height="50"/>';
        }
      },{
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

   $('#createNewcategory').click(function () {
      $('#saveBtn').val("create-category");
      $('#category_id').val('');
      $('#categoryForm').trigger("reset");
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

   $("#categoryForm").validate({
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
      let frm = $('#categoryForm');
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


   $('body').on('click', '.deletecategory', function () {
      let category_id = $(this).data("id");
      $('#showsuccess').hide('');
      $('#success_alert_message').html('');      
      confirm("Are You sure want to delete !");
      $.ajax({
         type: "DELETE",
         url: routesindex + '/' + category_id,
         success: function (data) {
            table.draw();
            $('#success_alert_message').html('Cuisine deleted successfully!');
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