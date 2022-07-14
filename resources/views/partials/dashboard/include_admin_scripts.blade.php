@isset($include_admin_script)
<script>
$(function () {
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
});
</script>
{{ $include_admin_script }}
@endisset