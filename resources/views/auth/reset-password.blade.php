<x-guest-layout>
<section class="container-fluid bg-circle" id="auth-login">
         <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 col-xl-4">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="d-flex justify-content-center mb-0">
                        <div class="card-body text-center">
                           <a href="{{route('dashboard')}}">
                              <img src="{{asset('images/favicon.png')}}" class="img-fluid logo-img mb-4" alt="img3">
                           </a>
                           <h2 class="mb-2 text-center">Reset Password</h2>
                           <p class=" text-center">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                           <form>
                           <div class="row text-start">
                              <div class="col-lg-12">
                                 <div class="floating-label form-group">
                                       <label for="email" class="form-label">Email</label>
                                       <input type="email" class="form-control" id="email" aria-describedby="email" placeholder=" ">
                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary">Reset</button>
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