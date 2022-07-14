<x-modal title="Add Category" modelId="createcategory">
    <form id="categoryForm" name="categoryForm" class="form-horizontal">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <input type="hidden" name="id" id="category_id">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                <input type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Enter Category Name" value="" maxlength="50">
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
</x-modal>