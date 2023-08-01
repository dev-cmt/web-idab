<x-guest-layout>
    <header>
        <h5 style="color: #34ad54; margin-top: 15px;">New Password</h5>
    </header>
    <x-jet-validation-errors style="color:red; margin-bottom:15px;"/>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="field space">
            <span class="fas fa-envelope"></span>
            <input type="email" name="email" id="email" placeholder="Email" type="email" name="email" value="{{old('email', $request->email)}}" required autofocus>
        </div>
        <div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password" name="password" id="password" class="pass-key" placeholder="Password" required autocomplete="new-password">
            <span class="show">SHOW</span>
        </div>
        <div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password" class="pass-key" placeholder="Confirm Password"  id="password_confirmation" name="password_confirmation" required autocomplete="new-password" >
            <span class="show">SHOW</span>
        </div>
        <div class="field space">
            <input type="submit" value="Reset Password">
        </div>
    </form>
</x-guest-layout>

