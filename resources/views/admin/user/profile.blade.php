<x-app-layout>
    <div>
        <div class="row">
            @if(session('success') || session('fail'))
            <div id="showsuccess">
                <x-alert :type="session('fail')? 'danger' : 'success'" :message="session('fail')? session('fail') : session('success')" class="mb-4" />
            </div>
            @endif
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <form>
                                <div class="profile-img-edit position-relative">
                                    <img class="profile-pic rounded avatar-100" src="{{asset('images/avatars/01.png')}}" alt="profile-pic">
                                    <div class="upload-icone bg-primary">
                                        <svg class="upload-button" width="14" height="14" viewBox="0 0 24 24">
                                            <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                        </svg>
                                        <input class="file-upload" type="file" accept="image/*">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <ul id="top-tab-list" class="profile-tabs p-0 row list-inline nav nav-tabs">
                            <li id="tab_profile_info" class="mb-2 text-start {{(old('tab') == 'editprofile') ?  'active' : (empty(old('tab')) && isset($tab) && $tab == 'editprofile') ? 'active' : (empty(old('tab')) && !isset($tab)) ? 'active' : ''}}">
                                <a href="#profile_info" data-id='tab_profile_info' class="{{(old('tab') == 'editprofile') ?  'active' : (empty(old('tab')) && isset($tab) && $tab == 'editprofile') ? 'active' : (empty(old('tab')) && !isset($tab)) ? 'active' : ''}}" data-toggle="tab">
                                    <div class="iq-icon me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li id="tab_changepassword" class="text-start mb-2 {{(old('tab') == 'changepassword') ?  'active' : (empty(old('tab')) && isset($tab) && $tab == 'changepassword') ? 'active' : ''}}">
                                <a href="#change_pass" data-id='tab_changepassword' class="{{(old('tab') == 'changepassword') ?  'active' : (empty(old('tab')) && isset($tab) && $tab == 'changepassword') ? 'active' : ''}}" data-toggle="tab">
                                    <div class="iq-icon me-2">
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <span>Password</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-8 tab-content">
                @include('admin.user.profile-edit')
                @include('admin.user.profile-change-password')
            </div>

        </div>
    </div>
    
<x-slot name="include_admin_script">
   <link rel="stylesheet" href="{{asset('plugins/tokeninput/token-input.css')}}" />
   <script type="text/javascript" src="{{asset('plugins/tokeninput/jquery.tokeninput.js')}}"></script>
   <script>
      let stateurl = "{{route('fetchstate')}}";
      let cityurl = "{{route('fetchcity')}}";
      let city_value = {{Js::from($city_value)}};
      let state_code = "{{ (!empty(old('state_code')) ? old('state_code') : (isset($user->state_code) ? $user->state_code : '')) }}";
   </script>
   <script type="module" src="{{ URL::asset('js/admin/user/profile.js') }}"></script>
</x-slot>
</x-app-layout>