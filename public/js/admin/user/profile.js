import { getStates,getcities } from '../../common/statecities.js';
$(function () {
   $(document).ready(function () {
      let country_ele = 'country_code';
      let city_ele = 'city_id';
      let state_ele = 'state_code';

      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      $(document).on('change', '#'+country_ele, function (e) {
         let code = this.value;
         $("#state_code").html('');
         let params = {state_url: stateurl, state_ele: 'state_code', code: code, city_ele: 'city_id'};
         getStates(params);
      });//

      $(document).on('change', '#state_code', function (e) {
         let params = { city_url: cityurl, city_ele: city_ele, state_code: this.value, country_code: $('#'+country_ele).val() };
         $('#token-input-'+city_ele).closest('ul').remove();
         getcities(params);
      });
      if (state_code !== '') {        
         console.log(city_value); 
         let params = { city_url: cityurl, city_ele: city_ele, state_code: $('#'+state_ele).val(), country_code: $('#'+country_ele).val(), pre_populate: city_value };
         getcities(params);
      }

      $('.nav-tabs').find('a').on('shown.bs.tab', function () {
         if ($(this).data('id') == 'tab_changepassword'){
            $('#tab_changepassword').addClass('active');
            $('#tab_profile_info').removeClass('active');
         } else if ($(this).data('id') == 'tab_profile_info'){
            $('#tab_profile_info').addClass('active');
            $('#tab_changepassword').removeClass('active');
         }
      });

   });

   $('#imageUpload').on('submit',(function(e) {
      e.preventDefault();
      
   }));

   $("#ImageBrowse").on("change", function() {
      $("#showsuccess").html('');
      let frm = $('#imageUploadForm');
      let formData = new FormData(frm[0]);
      formData.append('file', $('input[type=file]')[0].files[0]);

      $.ajax({
         data: formData,
         url: updateimgurl,
         type: "POST",
         dataType: 'json',
         processData: false,
         contentType: false,
         success: function (data) {
            if ($.isEmptyObject(data.errors)) {
               $('#showsuccess').html('<div class="alert alert-success">'+data.success+'</div>');
               $('#showsuccess').show();               
            } else {
               printErrorMsg(data.errors);
            }
         },
         error: function (data) {
            printErrorMsg($.parseJSON(data.responseText).errors);
         }
      });
   });

   function printErrorMsg(msg) {
      $("#showsuccess").html('');
      $("#showsuccess").css('display', 'block');
      $("#showsuccess").html('<div class="alert alert-danger"><ul></ul></div>');
      $.each(msg, function (key, value) {
         $("#showsuccess").find("ul").append('<li>' + value + '</li>');
      });
   }

});