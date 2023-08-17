<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/images')}}/favicon.png">
	<link rel="stylesheet" href="{{asset('public/extra-pages/comming-soon')}}/css/style-minimal-flat.css">
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/modernizr.custom.js"></script>
</head>
<body>

	<!-- Loading overlay -->
	<div id="loading" class="dark-back">
		<div class="loading-bar"></div>
		<span class="loading-text opacity-0">So Excited ?</span>
	</div>

	<!-- Canvas for particles animation -->
	<div id="particles-js"></div>

	<!-- Informations bar on top of the screen -->
	<div class="info-bar bar-intro opacity-0" style="padding: 20px 40px">

		<div class="row">

			<div class="col-xs-12 col-sm-6 col-lg-6 info-bar-left">

				{{-- <p>Grand Opening in <span id="countdown"></span> </p> --}}
				<a href="{{url('/')}}"><img data-wow-delay="0.9s" src="{{asset('public/images')}}/logo.png" style="max-width: 80px;"></a>

			</div>

			<div class="col-xs-12 col-sm-6 col-lg-6 info-bar-right">

				<!-- Text or Icons, as you want :-) / Uncomment the part you need and comment or delete the other one -->

				<!-- <p class="social-text">
					<a href="#" target="_blank">TWITTER</a> / 
					<a href="#" target="_blank">FACEBOOK</a> / 
					<a href="#" target="_blank">YOUTUBE</a>
				</p> -->

				<p class="social-icon" style="margin: 18px">
					<a href="#" style="color:#ff0000" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="#" style="color:#ff0000" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="#" style="color:#ff0000" target="_blank"><i class="fa fa-youtube"></i></a>
					<a href="#" style="color:#ff0000" target="_blank"><i class="fa fa-dribbble"></i></a>
					<a href="#" style="color:#ff0000" target="_blank"><i class="fa fa-linkedin"></i></a>
				</p>

			</div>
		</div>
	</div>
	<!-- END - Informations bar on top of the screen -->

	<!-- Slider Wrapper -->
	<div id="slider" class="sl-slider-wrapper">

		<div class="sl-slider">
		
			<!-- SLIDE 1 / Home -->
			<div class="sl-slide bg-1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
				
				<div class="sl-slide-inner">

					<div class="content-slide">

						<div class="container">
							<a href="{{ url()->previous() }}"><img src="{{asset('public/images')}}/logo.png" class="brand-logo text-intro opacity-0" alt=""></a>
						
							<h1 class="text-intro opacity-0"> 
								@if (Route::currentRouteName() == 'member-approve.padding')
									<span style="font-size: 32px;">Your request is pending for approval</span>
								@else
									Coming Soon
								@endif
							</h1>
						
							<p class="text-intro opacity-0">It may take up to 36 hours</p>

							{{-- <a data-dialog="somedialog" class="action-btn trigger text-intro opacity-0">Click Me !</a> --}}
							<a href="{{url('/')}}" data-dialog="somedialog" style="background:#ff0000;border:1px solid #ff0000;"  class="action-btn text-intro opacity-0">Click to home !</a>
						</div>
					</div>
				</div>
			</div>
			<!-- END - SLIDE 1 / Home -->

		</div>
		<!-- END - sl-slider -->

		

	</div>
	<!-- END - Slider Wrapper -->

	<!-- Newsletter Popup -->
	<div id="somedialog" class="dialog">

		<div class="dialog__overlay"></div>
				
		<!-- dialog__content -->
		<div class="dialog__content">

	
			<!-- Cross for closing the Newsletter Popup -->
			<button class="close-newsletter" data-dialog-close=""><i class="icon ion-android-close"></i></button>

		</div>
		<!-- END - dialog__content -->
					
	</div>
	<!-- END - Newsletter Popup -->

	<!-- //////////////////////\\\\\\\\\\\\\\\\\\\\\\ -->
	<!-- ********** List of jQuery Plugins ********** -->
	<!-- \\\\\\\\\\\\\\\\\\\\\\////////////////////// -->
	
	<!-- * Libraries jQuery, Easing and Bootstrap - Be careful to not remove them * -->
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/jquery.min.js"></script>
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/jquery.easings.min.js"></script>
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/bootstrap.min.js"></script>

	<!-- SlitSlider plugin -->
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/jquery.ba-cond.min.js"></script>
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/jquery.slitslider.js"></script>

	<!-- Newsletter plugin -->
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/notifyMe.js"></script>

	<!-- Popup Newsletter Form -->
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/classie.js"></script>
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/dialogFx.js"></script>

	<!-- Particles effect plugin on the right -->
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/particles.js"></script>

	<!-- Custom Scrollbar plugin -->
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/jquery.mCustomScrollbar.js"></script>


	<!-- Main application scripts -->
	<script src="{{asset('public/extra-pages/comming-soon')}}/js/main-flat.js"></script>

</body>

</html>