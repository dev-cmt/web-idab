<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>
	
	<!-- Favicons -->
	<link href="{{asset('public/frontend')}}/img/favicon.png" rel="icon">
	<link href="{{asset('public/frontend')}}/img/favicon.png" rel="icon">
	
</head>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{asset('public/extra-pages/login')}}/main.css">
    {{-- <link rel="stylesheet" href="{{asset('public/extra-pages/login')}}/style.css"> --}}
</head>

<body  style="background-image: url('{{asset('public/extra-pages/login')}}/background-bubble.jpg');">

    
    {{ $slot }}


    <script>
        /* show and hide the password */
        const reg_eyes = document.querySelectorAll(".eye");

        reg_eyes.forEach((eye) => {
            eye.addEventListener("click", () => {
                const pass_field = eye.previousElementSibling.previousElementSibling;
                if (pass_field.type === "password") {
                    pass_field.setAttribute("type", "text");
                    eye.classList.replace("fa-eye-slash", "fa-eye");
                } else {
                    pass_field.setAttribute("type", "password");
                    eye.classList.replace("fa-eye", "fa-eye-slash");
                }
            });
        });

    </script>
</body>

</html>