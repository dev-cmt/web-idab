<x-guest-layout>
<div class="content-wrapper my-4">
    <div class="registration-form">
        <div class="logo">
            <img src="{{asset('public/images')}}/logo.png" alt="">
        </div>
        
        <div class="header">
            <h1>Membership Registration </h1>
            <p>You can use this account to log in to any of our service</p>
            <div class="bar"></div>
        </div>
    
        <!-- Validation Errors -->
        <x-jet-validation-errors style="color:red; margin-bottom:15px;"/>
        {{-- <form method="POST" action="{{ route('member_register.store') }}" class="px-4 py-2"> --}}
        <form method="POST" action="" class="px-4 py-2">
            @csrf
    
            <div class="input-group">
                <input type="text" name="name" id="name" class="input-elem" placeholder=" " :value="old('name')" required autofocus/>
                <label for="name">Name</label>
            </div>
            <div class="input-group">
                <input type="text" name="contact_number" id="contact_number" class="input-elem" placeholder=" " :value="old('contact_number')" required autofocus/>
                <label for="contact_number">Contact Number</label>
            </div>
            <div class="input-group">
                <input type="text" name="email" id="email" class="input-elem" placeholder=" " :value="old('email')" required autofocus/>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="" id="password" class="input-elem" placeholder=" " required autocomplete="new-password"/>
                <label for="password">Password</label>
                <i class="fas fa-eye-slash eye"></i>
            </div>
            <div class="input-group">
                <input type="password" name="password_confirmation" id="password_confirmation" class="input-elem" placeholder=" " required autocomplete="new-password"/>
                <label for="password_confirmation">Confirm Password</label>
                <i class="fas fa-eye-slash eye"></i>
            </div>
            <div class="d-flex justify-content-between pb-4">
                <div class="agreements">
                    <input type="checkbox" name="" id="rem_pass" />
                    <label for="rem_pass" class="gray">Remember Password</label>
                </div>
                <a href="#" class="reg_link">Forgot your password?</a>
            </div>
            <a href="{{route('member_register.create')}}" class="btn btn-register">NEXT</a>
            {{-- <button type="submit" class="btn btn-register">NEXT</button> --}}
            <div class="py-3">Already have account?
                <a href="{{ route('login') }}" class="text-success">Sign in Now</a>
            </div>
        {{-- </form> --}}
    </div>
</div>
    
    
</x-guest-layout>
