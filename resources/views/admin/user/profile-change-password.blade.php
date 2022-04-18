<div class="tab-pane {{(old('tab') == 'changepassword') ?  'active' : (empty(old('tab')) && isset($tab) && $tab == 'changepassword') ? 'active' : ''}}" id="change_pass">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Change Password</h4>
            </div>
        </div>
        
        <div class="card-body">
            <div class="new-user-info">
                <form action="{{ route('change.password') }}" method="post" id="cpform" name="cpform" class="form-horizontal @if($errors->any()) needs-validation was-validated @endif" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label" for="current_password">Current Password:</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Old Password" required>
                            <span class="text-danger @if($errors->has('current_password')) invalid-feedback-zz @endif">@error('current_password'){{ $message }} @enderror</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label" for="password">New Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>
                            <span class="text-danger @if($errors->has('password')) invalid-feedback-zz @endif">@error('password'){{ $message }} @enderror</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label" for="password_confirmation">Confirm Password:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"  required>
                            <span class="text-danger @if($errors->has('password_confirmation')) invalid-feedback-zz @endif">@error('password_confirmation'){{ $message }} @enderror</span>
                        </div>
                        <input type="hidden" name="tab" value="changepassword"/>
                    </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>