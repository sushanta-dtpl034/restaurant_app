<x-modal title="Add Bussiness Type" modelId="record_form">
    <form id="addForm" name="addForm" class="form-horizontal">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <input type="hidden" name="id" id="record_id">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                <input type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Enter Bussiness Type" value="" maxlength="60">
                </div>
            </div>
            
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save</button>
            </div>
    </form>
</x-modal>