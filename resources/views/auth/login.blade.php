<x-guest-layout>
<section class="container-fluid bg-circle-login" id="auth-sign">
         <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 col-xl-4">
               <div class="card-body">
                  <a href="{{route('admindashboard')}}">
                     <img src="{{asset('images/favicon.png')}}" class="img-fluid logo-img" alt="img4">
                  </a>
                           <h2 class="mb-2 text-center">Sign In</h2>
                           <p class="text-center">Sign in to stay connected.</p>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                           <form method="POST" action="{{ route('login') }}">
                           @csrf
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <x-label for="email" class="form-label" :value="__('Email')" />
                                       <x-input id="email" class="form-control form-control-sm" type="email" aria-describedby="email" placeholder=" " name="email" :value="old('email')" required autofocus />
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">

                                       <x-label for="password" class="form-label" :value="__('Password')" />

                                       <x-input id="password" class="form-control form-control-sm"
                                       type="password"
                                       name="password"
                                       aria-describedby="password" placeholder=" "
                                       required autocomplete="current-password" />

                                    </div>
                                 </div>
                                 <div class="col-lg-12 d-flex justify-content-between">
                                    <div class="form-check mb-3">
                                       <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                       <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                                    </div>
                                     @if (Route::has('password.request'))
                                      <a href="{{ route('password.request') }}">
                                          {{ __('Forgot your password?') }}
                                      </a>
                                    @endif
                                    
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                              </div>
                              <p class="mt-3 text-center">
                                 Don’t have an account? <a href="{{route('register')}}" class="text-underline">Click here to sign up.</a>
                              </p>
                           </form>
                        </div>
            </div>
            <div class="col-md-12 col-lg-5 col-xl-8 d-lg-block d-none vh-100 overflow-hidden">
               <img src="{{asset('images/auth/09.png')}}" class="img-fluid sign-in-img" alt="images">
            </div>
         </div>
</section>
</x-guest-layout>