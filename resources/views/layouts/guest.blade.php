<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>
	
	<!-- Favicons -->
    <link href="{{asset('public/images')}}/favicon.png" rel="icon">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/extra-pages/login')}}/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>

</head>
<body>
    
    {{ $slot }}


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
    <!-- Include additional scripts if provided -->
    @stack('script')
</body>
</html>