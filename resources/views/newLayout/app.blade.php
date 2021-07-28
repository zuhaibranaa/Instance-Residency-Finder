<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/listeo/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Feb 2021 18:03:18 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>{{ config('app.name', 'Laravel') }}</title>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
    .znav{
        background-color: rgba(255, 111, 92, 0.486)
    }
</style>
</head>

<body class="transparent-header">

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container">
	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="/"><img src="{{ asset('logo.png') }}" data-sticky-logo="{{ asset('logo.png') }}" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

                @guest
                            @if ((Route::has('login') || Route::has('register')))
                            <div class="clearfix"></div>
                                <!-- Main Navigation / End -->
                            </div>
                            <!-- Right Side Content / End -->
                            <div class="right-side">
                                <div class="header-widget">
                                    <a href="#sign-in-dialog" style="color: red; text-color: red" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In / Register</a>
                                </div>
                            </div>
                            <!-- Right Side Content / End -->
                            @endif
                @else
                         <!-- Main Navigation -->
                         @if (auth()->user()['role_id'] != 3)
                         <nav id="navigation" class="style-1">
                            <ul id="responsive">

                                <li><a class="znav {{Request::is('/') ? 'current' : ''}}" href="/">Home</a></li>

                                <li><a class="znav {{Request::is('property') ? 'current' : ''}}" href="{{ url('property') }}">Manage Properties</a></li>
                                @if (auth()->user()['role_id'] == 1)
                                <li><a class="znav {{Request::is('profile') ? 'current' : ''}}" href="{{ url('profile') }}">Manage Users</a></li>
                                @endif
                            </ul>
                        </nav>
                        @endif
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->
                    </div>
                    <!-- Left Side Content / End -->
							<!-- Right Side Content / End -->
							<div class="right-side">
								<!-- Header Widget -->
								<div class="header-widget">

									<!-- User Menu -->
									<div class="user-menu">
										<div class="user-name"><a style="color: red; text-color: red">Hi, {{ Auth::user()->name }} !</a></div>
										<ul>
											<li><a href="profile/{{ auth()->user()->id }}/edit"><i class="sl sl-icon-settings"></i> Profille</a></li>
											<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="sl sl-icon-power"></i> Logout</a></li>
										</ul>

                                        <!-- Logout Form -->
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        <!-- End Logout Form -->
									</div>
								</div>
								<!-- Header Widget / End -->
							</div>
							<!-- Right Side Content / End -->
                @endguest

			<!-- Sign In Popup -->
			<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

				<div class="small-dialog-header">
					<h3>Sign In</h3>
				</div>

				<!--Tabs -->
				<div class="sign-in-form style-1">

					<ul class="tabs-nav">
						<li class=""><a href="#tab1">Log In</a></li>
						<li><a href="#tab2">Register</a></li>
					</ul>

					<div class="tabs-container alt">

						<!-- Login -->
						<div class="tab-content" id="tab1" style="display: none;">
							<form method="post" class="login" action="{{ route('login') }}">
                                @csrf
								<div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="checkboxes margin-top-10 col-md-8 offset-md-4">
                                        <div class="form-check">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-row">
                                            <input type="submit" class="button border margin-top-5" name="login" value="Login" />
                                        </div>
                                    </div>
                                </div>

							</form>
						</div>

						<!-- Register -->
						<div class="tab-content" id="tab2" style="display: none;">

                                <form method="POST" class="register" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="text" placeholder="03001234567" pattern="[0-9]{11}" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cnic" class="col-md-4 col-form-label text-md-right">{{ __('CNIC') }}</label>

                                        <div class="col-md-6">
                                            <input id="cnic" type="text" placeholder="1234567890123" pattern="[0-9]{13}" class="form-control @error('cnic') is-invalid @enderror" name="cnic" required>

                                            @error('cnic')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="roleid" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                        <div class="col-md-6">
                                            <select id="roleid" class="form-control @error('roleid') is-invalid @enderror" name="roleid" required>
                                                <option value="2">Seller</option>
                                                <option value="3">Customer</option>
                                              </select>



                                            @error('roleid')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>




                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="button border fw margin-top-10">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
						</div>

					</div>
				</div>
			</div>
			<!-- Sign In Popup / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


@yield('content')

<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer">
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2021 Instance Residency Finder. All Rights Reserved.</div>
			</div>
		</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-migrate-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js')}}"></script>


<!-- Leaflet // Docs: https://leafletjs.com/ -->
<script src="{{ asset('js/leaflet.min.js')}}"></script>

<!-- Leaflet Maps Scripts -->
<script src="{{ asset('js/leaflet-markercluster.min.js')}}"></script>
<script src="{{ asset('js/leaflet-gesture-handling.min.js')}}"></script>
<script src="{{ asset('js/leaflet-listeo.js')}}"></script>

<!-- Leaflet Geocoder + Search Autocomplete // Docs: https://github.com/perliedman/leaflet-control-geocoder -->
<script src="{{ asset('js/leaflet-autocomplete.js')}}"></script>
<script src="{{ asset('js/leaflet-control-geocoder.js')}}"></script>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}


<!-- Typed Script -->
<script type="text/javascript" src="{{ asset('js/typed.js') }}"></script>
<script>
var typed = new Typed('.typed-words', {
strings: ["Flats"," Houses"," Hostels"],
	typeSpeed: 80,
	backSpeed: 80,
	backDelay: 4000,
	startDelay: 1000,
	loop: true,
	showCursor: true
});
</script>


<!-- Style Switcher
================================================== -->
<script src="{{ asset('js/switcher.js')}}"></script>
<script src="{{ asset('js/app.js')}}"></script>

<!-- Style Switcher / End -->


</body>

<!-- Mirrored from www.vasterad.com/themes/listeo/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Feb 2021 18:03:20 GMT -->
</html>
