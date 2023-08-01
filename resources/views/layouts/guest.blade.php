<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/backend')}}/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('public/extra-pages/login')}}/style.css">
</head>
<body>
    <div class="bg-img" style="background: url('{{asset('public/extra-pages/login')}}/pune_club.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
        <div class="content">
            <div style="background: #e8f0fe;margin-left: -20px;margin-right: -20px;padding-top: 8px;">
                <a href="{{url('/')}}"><img src="{{asset('public/frontend')}}/images/pune_logo.png" style="width:75%" alt=""></a>
            </div>
            {{ $slot }}
        </div>
    </div>
    
    <script>
        const pass_field = document.querySelector('.pass-key');
        const showBtn = document.querySelector('.show');
        showBtn.addEventListener('click', function(){
            if(pass_field.type === "password"){
                pass_field.type = "text";
                showBtn.textContent = "HIDE";
                showBtn.style.color = "#3498db";
            }else{
                pass_field.type = "password";
                showBtn.textContent = "SHOW";
                showBtn.style.color = "#222";
            }
        });
    </script>

    
</body>
</html>
