    <style>
        .resent_verify_btn {
            cursor: pointer;
            color: white;
            background: #ff0000;
            padding: 10px 20px;
            outline: none;
            border: none;
            font-size: 15px;
            font-family: arial;
            width: 100%;
        }
        .resent_verify_btn:hover {
            cursor: pointer;
            color: white;
            background: #a30000;
            transition: 1s;
        }
        .loge_out_btn {
            cursor: pointer;
            color: white;
            background: #272727;
            padding: 10px 20px;
            outline: none;
            border: none;
            font-size: 15px;
            font-family: arial;
            width: 50%;
            margin-top:10px;
            border: 0.5px solid #a3a3a3;
        }
        .loge_out_btn:hover {
            cursor: pointer;
            color: white;
            background: #0f0f0f;
        }
    </style>

<x-guest-layout>
    <div class="content-wrapper py-4" style="background-image: url('{{asset('public/images')}}/pages/registation-bg.avif'); background-attachment: fixed; overflow:hidden">
        <!-- STAR ANIMATION -->
        <div class="bg-animation">
            <div id='stars'></div>
            <div id='stars2'></div>
            <div id='stars3'></div>
            <div id='stars4'></div>
        </div><!-- / STAR ANIMATION -->
        <div class="login-form">
            <div class="logo">
                <a href="{{route('/')}}"><img src="{{asset('public/images')}}/logo.png" alt=""></a>
            </div>
            
            <div class="header">
                <h1 style="font-size: 24px;color: #ff0000;font-weight:500">Your Registation Complete Successfully</h1>
                @if (session('status') == 'verification-link-sent')
                    <p>{{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}</p>
                @endif
                <div class="bar"></div>
                <a href="{{url('/')}}"><img src="{{asset('public/images')}}/email.png" style="width:35%" alt=""></a>        
            </div>

            <!-- Message Show -->
            <h5 style="color: #4a00ad;margin: 10px 0px; font-family:arial;font-size:18px">Verification Link Sent to your Email </h5>
            <p style="color:#939393; margin-bottom:20px; padding:0px 15px; font-family:arial;font-size:14px;text-alizen:left">If you didn't receive the email, we will gladly send you another.</p>
        
            <!-- Action Button-->
            <div class="p-4 flex items-center justify-between">
                <div>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                            <button type="submit" class="resent_verify_btn">{{ __('Resend Verification Email') }}</button>
                    </form>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="loge_out_btn">{{ __('Log Out') }} </button>
                    </form>
                </div>
            </div>
        </>
    </div>
        
</x-guest-layout>
    