<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Favicons -->
    <link href="{{asset('public/images')}}/favicon.png" rel="icon">
    
    <!-- Datatable -->
    <link href="{{asset('public/backend')}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Sweetalert & Toaster-->
    <link href="{{asset('public/backend')}}/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="{{asset('public/backend')}}/vendor/toaster/css/toastr.min.css" rel="stylesheet">

    <!-- Chart -->
	<link href="{{asset('public/backend')}}/vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <!-- select2 -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/vendor/select2/css/select2.min.css">
    <!-- Gallery -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/vendor/lightgallery/css/lightgallery.min.css">

    <!-- Custom Stylesheet -->
	<link href="{{asset('public/backend')}}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{asset('public/backend')}}/css/style.css" rel="stylesheet">
    
    @stack('style')
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('layouts.partial.header')
        @include('layouts.partial.sidebar')

        
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
                <!-- row -->
                {{ $slot }}
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://iconisl.com" target="_blank">iconisl.com</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    {{-- <div id="loading" style="display: none; width: 100vw; height: 100vh; background: rgba(0, 0, 0, 0.7); color: white; position: fixed; top: 0; left: 0; display: flex; justify-content: center; align-items: center; z-index: 99999;">Loading...</div> --}}

    
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Jquery -->
    <script src="{{asset('public/backend')}}/js/jquery-3.5.1.min.js"></script>
    <!-- Required vendors -->
    <script src="{{asset('public/backend')}}/vendor/global/global.min.js"></script>
	<script src="{{asset('public/backend')}}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- Apex Chart -->
    <script src="{{asset('public/backend')}}/vendor/apexchart/apexchart.js"></script>
    <!-- Sweetalert -->
    <script src="{{asset('public/backend')}}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{asset('public/backend')}}/js/plugins-init/sweetalert.init.js"></script>
    <!-- Datatable -->
    <script src="{{asset('public/backend')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/backend')}}/js/plugins-init/datatables.init.js"></script>
    <!-- Select2 1 -->
    <script src="{{asset('public/backend')}}/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{asset('public/backend')}}/js/plugins-init/select2-init.js"></script>

    <!-- Dashboard 1 -->
    <script src="{{asset('public/backend')}}/js/dashboard/dashboard-1.js"></script>
    <script src="{{asset('public/backend')}}/js/deznav-init.js"></script>
    <script src="{{asset('public/backend')}}/js/demo.js"></script>
    <script src="{{asset('public/backend')}}/js/styleSwitcher.js"></script>
    <script src="{{asset('public/backend')}}/js/custom.min.js"></script>

    <!-- Light Gallery -->
    <script src="{{asset('public/backend')}}/vendor/lightgallery/js/lightgallery-all.min.js"></script>
    
    <!-- Start Toaster & Sweetalert -->
    <script src="{{asset('public/backend')}}/vendor/toaster/js/toastr.min.js"></script>
    <script src="{{asset('public/backend')}}/vendor/toaster/js/sweetalert.min.js"></script>

    <script>
        @if(Session::has('messege') || Session::has('info_update') )
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
                case 'update':
                    swal("Success Message Title", "Well done, you pressed a button", "success");
                    break;
                case 'fail':
                    swal("Error!", "{{ Session::get('messege') }}", "error");
                    break;
            }
        @endif
    </script>  
    <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    // swal("Safe Data!");
                  }
                });
            });
            
    </script>
    <!-- End Toaster & Sweetalert -->
    <script>
        $(document).ready(function() {
          $('.dropdwon_select').each(function () {
            $(this).select2({
              dropdownParent: $(this).parent()
            });
          });
        });
    </script>

    
    @stack('script')
    <div id='loading' style="background-color:#252525cc;display:none">
        <div id='loading-loader'>
            <span class='loading-loader'>
                <span class='loading-inner'></span>
            </span>
        </div>
    </div>
</body>
</html>