$(function () {
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

   let table = $('#datatable').DataTable({
      columnDefs: [{
         "defaultContent": "-",
         "targets": "_all"
       }],
      processing: true,
      serverSide: true,
      ajax: routesindex,
      columns: [{
         data: 'thumb',
         name: 'image',
         orderable: false,
         searchable: false,
         render: function (data, type, full, meta) {
            return '<img class="bg-soft-primary rounded img-fluid me-3" src="' + data + '" height="50"/>';
         }
      }, {
         data: 'name',
         name: 'name'
      }, {
         data: 'parent',
         name: 'parent'
      },
      {
         data: 'action',
         name: 'action',
         orderable: false,
         searchable: false
      },
      ]
   });

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