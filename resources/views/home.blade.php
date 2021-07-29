@extends('newLayout.app')

@section('content')
<div class="main-search-container centered" data-background-image="{{ asset('main-search-background-01.jpg') }}">
	<div class="main-search-inner">

		<div class="container">
			<div class="row">
                <div class="col-md-12">
					<h2>
						Find Nearby
						<!-- Typed words can be configured in script settings at the bottom of this HTML file -->
						<span class="typed-words">Restaurants</span><span class="typed-cursor typed-cursor--blink">|</span>
					</h2>
					<h4>Expolore top-rated attractions, activities and more</h4>

                    <form id="kwSearch" method="GET" action="/search/">
					<div class="main-search-input">

						<div class="main-search-input-item">
							<select data-placeholder="All Categories" class="chosen-select" name="cat">
								<option >All Categories</option>
								<option value="Sale">Sale</option>
								<option value="Rent">Rent</option>
							</select>
                        </div>

                        <div class="main-search-input-item">
                            <input type="text" name="price" placeholder="Enter Price" >
                        </div>

						<div class="main-search-input-item location">
							<div id="autocomplete-container">
                                    {{-- @csrf --}}
                                    <input id="autocomplete-input" type="text" name="keywords" placeholder="Location">
                                </form>
							</div>
							<a href="#"><i class="fa fa-map-marker"></i></a>
						</div>

						<button class="button" onclick="window.location.href='listings-half-screen-map-list.html'">Search</button>

					</div>
				</div>










			</div>

		</div>

	</div>
</div>

<!-- Info Section -->
<section class="fullwidth padding-top-75 padding-bottom-70" data-background-color="#f9f9f9">
<div class="container">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="headline centered headline-extra-spacing">
				<strong class="headline-with-separator">Plan The Residency of Your Dreams</strong>
				<span class="margin-top-25">Explore some of the best locations from around the world from our partners. Discover some of the most popular listings!</span>
			</h3>
		</div>
	</div>

	<div class="row icons-container">
		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Map2"></i>
				<h3>Find Interesting Place</h3>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Mail-withAtSign"></i>
				<h3>Contact a Few Owners</h3>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2">
				<i class="im im-icon-Checked-User"></i>
				<h3>Make a Reservation</h3>
			</div>
		</div>
	</div>

</div>
</section>
<!-- Info Section / End -->
@endsection
