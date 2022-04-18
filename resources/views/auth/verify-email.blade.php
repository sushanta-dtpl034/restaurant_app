<x-guest-layout>

<div class="container-fluid p-0">
        <div class="iq-maintenance text-center"> 
            <div>
                <img src="{{asset('images/auth/02.png')}}" class="rounded-circle nine-img" alt="images">
                <img src="{{asset('images/auth/01.png')}}" class="rounded-circle ten-img" alt="images">
                <img src="{{asset('images/auth/06.png')}}" class="rounded-circle eleven-img" alt="images">
                <img src="{{asset('images/auth/05.png')}}" class="rounded-circle twelve-img" alt="images">
                <img src="{{asset('images/auth/03.png')}}" class="rounded-circle thirteen-img" alt="images">
                <img src="{{asset('images/auth/04.png')}}" class="rounded-circle fifteen-img" alt="images">
            </div>
            <div class="user-img1">
                <svg width="1857"  viewBox="0 0 1857 327" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.05078 189.348C86.8841 109.514 348.951 -25.2523 734.551 74.3477C1120.15 173.948 1641.22 91.181 1853.55 37.3477" stroke="#EA6A12" stroke-opacity="0.3"/>
                <path d="M0.99839 152.331C90.9502 80.6133 364.495 -28.9952 739.062 106.31C1113.63 241.616 1640.16 208.056 1856.6 174.363" stroke="#EA6A12" stroke-opacity="0.3"/>
                </svg>
            </div>
            <div class="maintenance-bottom pb-0">
                
                <div class="" style="background: transparent; height: 320px;">
                    <div class="col-6 .col-md-4">
                        <div class="bottom-text general-zindex">
                            <h1 class="mb-2">Success!</h1>
                            <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?</p> 
                            <p>If you didn't receive the email, we will gladly send you another.</p>
                           
                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif

                            <div class="mt-4 flex items-center justify-between">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <div>
                                    <button type="submit" class="btn btn-primary rounded-pill ms-2">{{ __('Resend Verification Email') }}</button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-light rounded-pill mt-2">{{ __('Log Out') }}</button>
                            </form>
                        </div>
                        </div>
                        <div class="c xl-circle">
                            <div class="c lg-circle">
                                <div class="c md-circle">
                                <div class="c sm-circle">
                                    <div class="c xs-circle"></div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>            
        </div>
    </div>
</x-guest-layout>