@extends('newLayout.app')

@section('content')
<div class="dashboard-list-box margin-top-0" style="padding-top: 5%">
    <h4>Active Listings<a style="display: inline; margin-left: 70%" href="{{ url('property/create') }}" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a></h4>
    <ul>
        @foreach ($properties as $property)
        <li><?php $v = json_decode($property['image']); $v = $v[0] ?>
            <div class="list-box-listing">
                <div class="list-box-listing-img"><a href="#"><img src="{{ asset('storage/images/'.$v) }}" alt="{{ $v }}"></a></div>
                <div class="list-box-listing-content">
                    <div class="inner">
                        <h3><a href="#">{{ $property['Title'] }}</a></h3>
                        <span>{{ $property['Location'] }}</span><br/>
                        <span><?php $user = App\Models\user::find($property['Seller_ID']) ?> Owner : {{ $user['name'] }}</span><br/>
                        <span>Contact : {{ $user['phone'] }}</span><br/>
                        <span>CNIC : {{ $user['cnic'] }}</span><br/>
                        <span>Posted For : {{ $property['Property_Type'] }}</span>
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
