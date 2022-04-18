<div class="tab-pane {{(old('tab') == 'editprofile') ?  'active' : (empty(old('tab')) && isset($tab) && $tab == 'editprofile') ? 'active' : (empty(old('tab')) && !isset($tab)) ? 'active' : ''}}" id="profile_info">
   <div class="card">
      <div class="card-header d-flex justify-content-between">
         <div class="header-title">
            <h4 class="card-title">Profile Information</h4>
         </div>
      </div>
      
      <div class="card-body">
         <div class="new-user-info">
         <form action="{{ route('editprofile') }}" method="post" id="profileform" name="profileform" class="form-horizontal @if($errors->any()) needs-validation was-validated @endif" enctype="multipart/form-data">
                  
            {{ csrf_field() }}
               <div class="row">
                  <div class="form-group col-md-6">
                     <label class="form-label" for="name">Name:</label>
                     <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ !empty(old('name')) ? old('name') : (isset($user->name) ? $user->name : '') }}" required>
                     <span class="text-danger @if($errors->has('name')) invalid-feedback-zz @endif">@error('name'){{ $message }} @enderror</span>
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="email">Email:</label>
                     <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ !empty(old('email')) ? old('email') : (isset($user->email) ? $user->email : '') }}" required>
                     <span class="text-danger @if($errors->has('email')) invalid-feedback-zz @endif">@error('email'){{ $message }} @enderror</span>
                  </div>                                                     

                  <div class="form-group col-md-6">
                     <label class="form-label" for="phone_number">Phone No.:</label>
                     <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Phone No." value="{{ !empty(old('phone_number')) ? old('phone_number') : (isset($user->phone_number) ? $user->phone_number : '') }}" required>
                     <span class="text-danger @if($errors->has('phone_number')) invalid-feedback-zz @endif">@error('phone_number'){{ $message }} @enderror</span>
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="altconno">Alternate Contact:</label>
                     <input type="tel" class="form-control" id="alternate_number" name="alternate_number" placeholder="Alternate Contact" value="{{ !empty(old('alternate_number')) ? old('alternate_number') : (isset($user->alternate_number) ? $user->alternate_number : '') }}">
                     <span class="text-danger @if($errors->has('alternate_number')) invalid-feedback-zz @endif">@error('alternate_number'){{ $message }} @enderror</span>
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="add1">Street Address 1:</label>
                     <input type="text" class="form-control" id="street_address" name="street_address" placeholder="Street Address 1" value="{{ !empty(old('street_address')) ? old('street_address') : (isset($user->street_address) ? $user->street_address : '') }}">
                     <span class="text-danger @if($errors->has('street_address')) invalid-feedback-zz @endif">@error('street_address'){{ $message }} @enderror</span>
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="add2">Street Address 2:</label>
                     <input type="text" class="form-control" id="street_address2" name="street_address2" placeholder="Street Address 2" value="{{ !empty(old('street_address2')) ? old('street_address2') : (isset($user->street_address2) ? $user->street_address2 : '') }}">
                     <span class="text-danger @if($errors->has('street_address2')) invalid-feedback-zz @endif">@error('street_address2'){{ $message }} @enderror</span>
                  </div>     

                  <div class="form-group col-sm-6">
                     <label class="form-label">Country: {{old('country_code')}}</label>
                     <select class="selectpicker form-control" id="country_code" name="country_code" data-style="py-0">
                        <option value="">Select Country</option>
                        @foreach ($countries as $c)
                        <option value="{{$c->country_code}}" {{ $c->country_code == (!empty(old('country_code')) ? old('country_code') : (isset($user->country_code) ? $user->country_code : '')) ? 'selected' : '' }} >{{$c->country}}</option>
                        @endforeach
                     </select>
                     <span class="text-danger @if($errors->has('country_code')) invalid-feedback-zz @endif">@error('country_code'){{ $message }} @enderror</span>
                  </div>

                  <div class="form-group col-sm-6">
                     <label class="form-label">State:</label>
                     <select id="state_code" name="state_code"  class="selectpicker form-control" data-style="py-0">
                        <option value="">Select State</option>
                        @foreach ($states as $s)
                        <option value="{{$s->state_code}}" {{ $s->state_code == (!empty(old('state_code')) ? old('state_code') : (isset($user->state_code) ? $user->state_code : '')) ? 'selected' : '' }} >{{$s->state}}</option>
                        @endforeach
                     </select>
                     <span class="text-danger @if($errors->has('state_code')) invalid-feedback-zz @endif">@error('state_code'){{ $message }} @enderror</span>
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="city">City:</label>
                     <input type="text" id="city_id" name="city_id" class="form-control" placeholder="Select City" autocomplete="false"  value="{{ !empty(old('city_id')) ? old('city_id') : (isset($user->city_id) ? $user->city_id : '') }}" />
                     <span class="text-danger @if($errors->has('city_id')) invalid-feedback-zz @endif">@error('city_id'){{ $message }} @enderror</span>
                  </div>
                  
                  <div class="form-group col-md-6">
                     <label class="form-label" for="pno">Zip Code:</label>
                     <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip Code" value="{{ !empty(old('zipcode')) ? old('zipcode') : (isset($user->zipcode) ? $user->zipcode : '') }}" >
                     <span class="text-danger @if($errors->has('zipcode')) invalid-feedback-zz @endif">@error('zipcode'){{ $message }} @enderror</span>
                  </div>                              
               </div>
               <hr>
               <input type="hidden" name="tab" value="editprofile"/>
               <button type="submit" class="btn btn-primary">Save</button>
            </form>
         </div>
      </div>
   </div>
</div>