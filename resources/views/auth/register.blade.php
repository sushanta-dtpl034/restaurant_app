<x-guest-layout>
<section class="container-fluid bg-circle-login">
         <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 col-xl-4">               
               <div class="d-flex justify-content-center mb-0">
                  <div class="card-body mt-5" style="z-index:1;">
                     <a href="#">
                        <img src="{{asset('images/favicon.png')}}" class="img-fluid logo-img" alt="img5">
                     </a>
                     <h2 class="mb-2 text-center">Sign Up</h2>
                     <p class="text-center">Create your Restaurant account.</p>
                     <!-- Validation Errors -->
                     <x-auth-validation-errors class="mb-4" :errors="$errors" />

                     <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <x-label for="name" class="form-label" :value="__('Name')" />
                                 <x-input id="name" class="form-control form-control-sm" type="text" name="name" :value="old('name')" required autofocus />
                              </div>
                           </div>
                           
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <x-label for="email" class="form-label" :value="__('Email')" />
                                 <x-input id="email" class="form-control form-control-sm" type="email" name="email" :value="old('email')" required />
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="phone" class="form-label">Phone No.</label>
                                 <input type="text" class="form-control form-control-sm" id="phone" placeholder=" ">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">

                                 <x-label for="password" class="form-label" :value="__('Password')" />
                                 <x-input id="password" class="form-control form-control-sm"
                                                  type="password"
                                                  name="password"
                                                  required autocomplete="new-password" />

                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <x-label class="form-label" for="password_confirmation" :value="__('Confirm Password')" />
                                 <x-input id="password_confirmation" class="form-control form-control-sm"
                                    type="password"
                                    name="password_confirmation" required />
                              </div>
                           </div>
                           <div class="col-lg-12 d-flex justify-content-center">
                              <div class="form-check mb-3">
                                 <input type="checkbox" class="form-check-input" id="customCheck1">
                                 <label class="form-check-label" for="customCheck1">I agree with the terms of use</label>
                              </div>
                           </div>
                        </div>
                        <div class="d-flex justify-content-center">
                           <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                        </div>
                        <p class="mt-3 text-center">
                           Already have an Account <a href="{{route('login')}}" class="text-underline">Sign In</a>
                        </p>
                     </form>
                  </div>
               </div>          
            </div>  
            <div class="col-md-12 col-lg-5 col-xl-8 d-lg-block d-none vh-100 overflow-hidden">
               <img src="{{asset('images/auth/09.png')}}" class="img-fluid sign-in-img" alt="images">
            </div>
         </div>
      </section>
</x-guest-layout>