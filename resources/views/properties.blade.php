@extends('newLayout.app')

@section('content')
<div class="dashboard-list-box margin-top-0" style="padding-top: 5%">
    <h4>Active Listings<a style="display: inline; margin-left: 70%" href="{{ url('property/create') }}" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a></h4>
    <ul>
        @foreach ($properties as $property)
        <li><?php $v = json_decode($property['image']); $v = $v[0] ?>
            <div class="list-box-listing">
                <div class="list-box-listing-img"><a href="#"><img src="{{ asset('images/gallery-images/'.$v) }}" alt="{{ $v }}"></a></div>
                <div class="list-box-listing-content">
                    <div class="inner">
                        <h3><a href="#">{{ $property['Title'] }}</a></h3>
                        <span>{{ $property['Location'] }}</span>
                        <div class="star-rating" data-rating="3.5">
                            <div class="rating-counter">{{ $property['Property_Type'] }}</div>
                    </div>
                </div>
            </div>
            <div class="buttons-to-right">
                @if (auth()->user()->id == $property['Seller_ID'])
                    <a href="/property/{{ $property['id'] }}/edit" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                @endif
                <a onclick="document.getElementById('delete').submit()" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
            </div>
        </li>
        <form id="delete" action="property/{{ $property['id'] }}" method="POST"> <input name="_method" type="hidden" value="DELETE">
            @csrf</form>
        @endforeach
    </ul>
</div>
@endsection
