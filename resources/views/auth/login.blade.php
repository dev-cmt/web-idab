<x-guest-layout>

    <div class="content-wrapper py-4" style="background-image: url('{{asset('public/images')}}/pages/registation-bg.avif'); background-attachment: fixed;">
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
                <h1>Member Login</h1>
                <div class="bar"></div>
            </div>
        
            <!-- Validation Errors -->
            <x-jet-validation-errors style="color:red; margin-bottom:15px;"/>
            <form method="POST" action="{{ route('login') }}" class="px-4 py-2">
                @csrf
    
                <div class="input-group">
                    <input type="text" name="email" id="email" class="input-elem" placeholder=" " :value="old('email')" required autofocus/>
                    <label for="email">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="input-elem" placeholder=" " required  autocomplete="current-password"/>
                    <label for="password">Password</label>
                    <i class="fas fa-eye-slash eye"></i>
                </div>
                <div class="d-flex justify-content-between pb-4">
                    <a href="{{ route('password.request') }}" class="reg_link">Forgot your password?</a>
                </div>
                <button type="submit" class="btn btn-register">Login</button>
                <div class="py-3">Don't have account?
                    {{-- <a href="{{ route('register') }}" class="text-success">Signup in Now</a> --}}
                    <a href="{{ route('member_register.create') }}" class="text-success">Signup in Now</a>
                </div>
            </form>
        </div>
    </div>
        
    </x-guest-layout>
    