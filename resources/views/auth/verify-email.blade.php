<x-guest-layout>
    <style>
        .resent_verify_btn {
            cursor: pointer;
            color: white;
            background: #34ad54;
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
            background: #197231;
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

    <div style="padding-top:20px">
        <a href="{{url('/')}}"><img src="{{asset('public/extra-pages')}}/login/email.png" style="width:75%" alt=""></a>
        <h5 style="color: #22b573;font-family:arial;font-size:14px">Your Registation Complete Successfully</h5>
    </div>
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
        </div>
    @endif
    <h5 style="color: #ffffff;margin: 10px 0px; font-family:arial;font-size:18px">Verification Link Sent to your Email </h5>
    <p style="color:#939393; margin-bottom:20px; padding:0px 15px; font-family:arial;font-size:14px;text-alizen:left">If you didn't receive the email, we will gladly send you another.</p>

    <div class="mt-4 flex items-center justify-between">
            <div>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                        <button type="submit" class="resent_verify_btn">{{ __('Resend Verification Email') }}</button>
                </form>
            </div>
            <div>
                <!--<a href="{{ route('profile.show') }}" class="underline text-sm text-gray-600 hover:text-gray-900"> {{ __('Edit Profile') }}</a>-->
            </div>
            <div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="loge_out_btn">{{ __('Log Out') }} </button>
                </form>
            </div>
    </div>
</x-guest-layout>
