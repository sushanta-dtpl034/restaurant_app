<x-guest-layout>
<section class="container-fluid bg-circle" id="auth-login">
         <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 col-xl-4">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="d-flex justify-content-center mb-0">
                        <div class="card-body text-center">
                           <a href="{{route('admindashboard')}}">
                              <img src="{{asset('images/favicon.png')}}" class="img-fluid logo-img mb-4" alt="img3">
                           </a>
                           <h2 class="mb-2 text-center">Reset Password</h2>
                           <p class=" text-center">
                              {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </p>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row text-start">
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <x-label for="email" class="form-label" :value="__('Email')" />
                                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus aria-autocomplete="FALSE" />
                                    </div>
                                </div>
                            </div>                                
                                <x-button type="submit"  class="btn btn-primary">
                                    {{ __('Email Password Reset Link') }}
                                </x-button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
             <div class="col-md-12 col-lg-5 col-xl-8 d-lg-block d-none vh-100 overflow-hidden">
               <div>
                  <img src="{{asset('images/auth/01.png')}}" class="hover-img rounded-circle first-img" alt="images">
                  <img src="{{asset('images/auth/02.png')}}" class="hover-img rounded-circle second-img" alt="images">
                  <img src="{{asset('images/auth/03.png')}}" class="hover-img rounded-circle third-img" alt="images">
                  <img src="{{asset('images/auth/04.png')}}" class="hover-img rounded-circle fourth-img" alt="images">
                  <img src="{{asset('images/auth/05.png')}}" class="hover-img rounded-circle fifth-img" alt="images">
                  <img src="{{asset('images/auth/06.png')}}" class="hover-img rounded-circle six-img" alt="images">
                  <img src="{{asset('images/auth/01.png')}}" class="hover-img rounded-circle seventh-img" alt="images">
                  <img src="{{asset('images/auth/02.png')}}" class="hover-img rounded-circle eight-img" alt="images">
               </div>
            </div>
         </div>
      </section>
</x-guest-layout>