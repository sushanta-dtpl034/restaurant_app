<x-app-layout>
   <div>
      <div class="row">
         <div class="col-sm-12">
            <div id="showsuccess" style="display:none;">
               <x-alert type="success" message="Subcategory saved successfully!" class="mb-4" />
            </div>
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Type of Cuisines</h4>
                  </div>
                  <a class="btn btn-success" href="javascript:void(0)" id="createNewcategory">Add New Cuisine</a>
               </div>
               <div class="card-body px-0">
                  <div class="table-responsive">

                     <table id="datatable" class="table table-striped" role="grid">
                        <thead>
                           <tr class="ligth">
                              <th>Image</th>
                              <th>Name</th>
                              <th style="min-width: 100px">Action</th>
                           </tr>
                        </thead>
                        <tbody></tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <div class="modal fade" id="ajaxModel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
               <form id="categoryForm" name="categoryForm" class="form-horizontal">
                  <div class="alert alert-danger print-error-msg" style="display:none">
                     <ul></ul>
                  </div>
                  <input type="hidden" name="id" id="category_id">
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Name</label>
                     <div class="col-sm-12">
                        <input type="text" autocomplete="false" class="form-control" id="name" name="name" placeholder="Enter Super Category" value="" maxlength="50">
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="image" class="col-sm-2 control-label">Image</label>
                     <div class="col-sm-12">
                        <input type="file" name="image" id="image" class="form-control">
                        <div id='preview' class="mt-3"></div>
                        <input type="hidden" name="oldimgpath" id="oldimgpath" />
                     </div>
                  </div>

                  <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <x-slot name="datatablescript">
      <script>
         var routesindex = "{{ route('supercategory.index') }}";
         var routesstore = "{{ route('supercategory.store') }}";
      </script>
      <script type="module" src="{{asset('js/libraries/jquery-validate1.19.3/jquery.validate.min.js')}}"></script>
      <script type="module" src="{{asset('js/libraries/jquery-validate1.19.3/additional-methods.min.js')}}"></script>
      <script type="module" src="{{asset('js/admin/supercategory/list.js')}}"></script>
   </x-slot>
</x-app-layout>