@extends('newLayout.app')

@section('content')

<!-- Content
================================================== -->
<div style="margin-top: 10%" class="container">
	<div class="row">

		<!-- Search -->
		<div class="main-search-input">

            <div class="main-search-input-item location">
                <div id="autocomplete-container">
                    <form id="kwSearch" method="GET" action="/search/">
                        {{-- @csrf --}}
                        <input id="autocomplete-input" type="text" name="keywords" placeholder="Location">
                    </form>
                </div>
                <a href="#"><i class="fa fa-map-marker"></i></a>
            </div>

            <button class="button" onclick="document.getElementById('kwSearch').submit()">Search</button>
        </div>
		<!-- Search Section / End -->


		<div class="col-md-12">

			<!-- Sorting - Filtering Section -->
			<div class="row margin-bottom-25 margin-top-30">

				<div class="col-md-6">
					<div class="fullwidth-filters">

					</div>
				</div>

			</div>
			<!-- Sorting - Filtering Section / End -->


			<div class="row">
                @foreach ($data as $dat)
                <?php
                $val = trim($dat->image,'[');
                $val = trim($val,']');
                $val = trim($val,'\"');
                // $val = trim($val,'"');
                $r = explode(',',$val);?>
				<!-- Listing Item -->
				<div class="col-lg-4 col-md-6">
					<a href="listings-single-page.html" class="listing-item-container compact">
						<div class="listing-item">
							<img src="{{ asset("storage/images/".trim($r[0],'\"'))}}" alt="{{ $r[0] }}">

							<div class="listing-badge now-closed">Rs.{{ $dat->price }}</div>

							<div class="listing-item-content">
								<div class="numerical-rating" data-rating="{{ $dat->Property_Type }}"></div>
								<h3>{{ $dat->Title }}</h3>
								<span>{{ $dat->Location }}</span>
							</div>
							<span class="like-icon"></span>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->

                @endforeach

			</div>

		</div>

	</div>
</div>

@endsection