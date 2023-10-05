
<style>
    .field {
        position: relative;
    }
    .field span {
        position: absolute;
        font-size: 23px;
        background: #353535;
        padding: 10px 15px;
        color: #fff;
    }
    .field input {
        width: 100%;
        border:1px solid #353535;
        outline:none;
        padding: 10px 20px 10px 55px;
    }
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
            <h1 style="font-size: 24px;color: #ff0000;font-weight:500">Forgot Password</h1>
            @if (session('status') == 'verification-link-sent')
                <p>{{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}</p>
            @endif
            <a href="{{url('/')}}"><img src="{{asset('public/images')}}/email.png" style="width:35%" alt=""></a>        
        </div>

        <!-- Message Show -->
        <h5 style="color: #4a00ad;margin: 10px 0px; font-family:arial;font-size:18px">Verification Link Sent to your Email </h5>
    
        <!-- Action Button-->
        <div class="p-4 flex items-center justify-between">
            @if (session('status'))
                <div style="color:green; margin-bottom:15px;">
                    {{ session('status') }}
                </div>
            @endif
            <x-jet-validation-errors style="color:red; margin-bottom:15px;"/>
            
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="field">
                    <span class="fa fa-envelope"></span>
                    <input type="email" id="email" name="email" :value="old('email')" required autofocus placeholder="Enter your email!">
                </div>
                <div class="field" style="margin-top:10px;">
                    <input type="submit" class="resent_verify_btn" value="Reset Link">
                </div>
            </form>
            <p style="color:#939393; margin-bottom:20px; padding: 0px 15px; font-family:arial;font-size: 14px; text-alizen:left">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

        </div>
    </div>
</div>
    
</x-guest-layout>

