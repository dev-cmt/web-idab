<x-guest-layout>
    <header>
        <h5 style="color: #34ad54; margin-top: 15px;">Member Login</h5>
    </header>
    <x-jet-validation-errors style="color:red; margin-bottom:15px;"/>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="field">
            <span class="fa fa-user"></span>
            <input type="email" name="email" id="email" placeholder="Email or Phone" :value="old('email')" required autofocus>
        </div>
        <div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password" name="password" id="password" class="pass-key" placeholder="Password" required autocomplete="current-password">
            <span class="show">SHOW</span>
        </div>
        <div class="pass">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
        <div class="field">
            <input type="submit" value="LOGIN">
        </div>
    </form>
    <div class="signup">Don't have account?
        <a href="{{ route('register') }}">Signup Now</a>
    </div>
</x-guest-layout>