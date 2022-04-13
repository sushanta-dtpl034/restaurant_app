$(function () {
   $(document).ready(function() {
      hideShowParentBlk()
      $("input[name$='category_type']").click(function() {
         hideShowParentBlk();
      });

      function hideShowParentBlk(){
         let parent_block = $('#parent_blk');
         $("input[name='category_type']:checked").val() == 'sub_category' ? parent_block.show() : parent_block.hide();
      }

      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      const ms = $('#parent_id_m').magicSuggest({
         data: autourl,
         allowDuplicates: false,
         minChars: 3,
	      maxSelection: 1,
         value:parent_value
      });

      $(ms).on('selectionchange', function(e, cb){
         const data = this.getSelection();
         let parent_id = '';
         if (typeof data[0] !== "undefined") {
            parent_id = data[0].id;
         }
         $('#parent_id').val(parent_id);
      });

   });

   /*$("#categoryForm").validate({
      errorClass: 'invalid-input',
      errorElement: 'div',
      highlight: function (element, errorClass, validClass) {
         $(element).closest('.form-group').addClass('was-validated');
      },
      unhighlight: function (element, errorClass, validClass) {
         $(element).closest('.form-group').removeClass('was-validated');
      },
      rules: {
         category_type: "required",
         parent_category: {
            required: function (element) {
               return $("#category_type").val() == "sub_category";
            },
         },
         name: "required",
         image: {
            extension: "jpg,jpeg,png",
            required: function (element) {
               return $("#oldimgpath").val()==="";
            },
         }
      },
      messages: {
         category_type: "Sub-category name is required.",
         parent_category: "Parent category is required.",
         name: "Category name is required.",
         image: {
            extension: "Please upload .jpg or .png or .pdf file of notice.",
            required: "Please upload image.",
         }
      },
      submitHandler: function (form) {
         submitform();
      }
   });*/
});