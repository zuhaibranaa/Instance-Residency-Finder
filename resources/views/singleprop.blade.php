@extends('newLayout.app')

@section('content')
<div style="margin-top: 10%" class="container">

<!-- Slider
================================================== -->
    <?php
                $val = trim($property['image'],'[');
                $val = trim($val,']');
                $val = trim($val,'\"');
                $r = explode(',',$val);
                ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @for ($i = 0; $i < count($r); $i++)
            @if ($i == 0)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="active"></li>
            @else
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"></li>
            @endif
        @endfor
    </ol>
    <div class="carousel-inner">
        @foreach ($r as $image)
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('storage/images/'.$image) }}">
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>






<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>{{ $property->Title }} <span class="listing-tag">{{ $property->Property_Type }}</span></h2>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							{{ $property->Location }}
						</a>
					</span>
                    <h3>{{ $property->price }}</h3>
				</div>
                <div class="col-lg-6 col-md-6 verified-badge with-tip" data-tip-content="Listing has been verified and belongs the business owner or manager.">
                    <i class="sl sl-icon-check"></i> {{ App\Models\status::find($property->status)['name'] }}
                </div>
			</div>


		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-10 sticky">

			<!-- Book Now -->
			<div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
				<h3><i class="fa fa-calendar-check-o "></i> Booking</h3>
				<div class="row with-forms  margin-top-0">

					<!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
					<div class="col-lg-12">
						<input type="text" id="date-picker" value="{{ $user->name }}" readonly="readonly">
					</div>
                    <div class="col-lg-12">
						<input type="text" id="date-picker" value="{{ $user->phone }}" readonly="readonly">
					</div>
                    <div class="col-lg-12">
						<input type="text" id="date-picker" value="{{ $user->email }}" readonly="readonly">
					</div>

				</div>

				<!-- Book Now -->
			</div>
			<!-- Book Now / End -->
		</div>
		<!-- Sidebar / End -->

	</div>
</div>


@endsection
