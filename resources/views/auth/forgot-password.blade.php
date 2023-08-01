<x-guest-layout>
    <header>
        <h5 style="color: #34ad54; margin-top: 15px;">Forgot Password</h5>
    </header>
    @if (session('status'))
        <div style="color:green; margin-bottom:15px;">
            {{ session('status') }}
        </div>
    @endif
    <x-jet-validation-errors style="color:red; margin-bottom:15px;"/>

    
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="field">
            <span class="fa fa-user"></span>
            <input type="email" id="email" name="email" :value="old('email')" required autofocus placeholder="Enter your email!">
        </div>
        <div class="field" style="margin-top:10px;">
            <input type="submit" value="Reset Link">
        </div>
    </form>
    <h6 style="color:white;margin-top:10px;font-family:Arial, Helvetica, sans-serif;">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h6>

</x-guest-layout>