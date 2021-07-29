@extends('newLayout.app')

@section('content')
<div class="dashboard-list-box margin-top-0" style="padding-top: 5%">
    <h4>Pending Listings</h4>
    <ul>

        @foreach ($properties as $property)
        <form id="approve" action="/approve/{{ $property['id'] }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="2">
        </form>
        <li>
            <?php
                $val = trim($property['image'],'[');
                $val = trim($val,']');
                $val = trim($val,'\"');
                $r = explode(',',$val);?>
            <div class="list-box-listing">
                <div class="list-box-listing-img"><a href="/property/{{ $property['id'] }}"><img src="{{ asset('storage/images/'.$r[0] ) }}" alt="{{ gettype($property['image']) }}"></a></div>
                <div class="list-box-listing-content">
                    <div class="inner">
                        <h3><a href="/property/{{ $property['id'] }}">{{ $property['Title'] }}</a></h3>
                        <span>{{ $property['Location'] }}</span><br/>
                        <span><?php $user = App\Models\user::find($property['Seller_ID']) ?> Owner : {{ $user['name'] }}</span><br/>
                        <span>Contact : {{ $user['phone'] }}</span><br/>
                        <span>CNIC : {{ $user['cnic'] }}</span><br/>
                        <span>Posted For : {{ $property['Property_Type'] }}</span><br/>
                        <span>Status : {{ App\Models\status::find($property['status'])['name'] }}</span>
                    </div>
                </div>
            </div>
            <div class="buttons-to-right">
                <a href="#" onclick="document.getElementById('approve').submit()" class="button gray"><i class="sl sl-icon-note"></i> Approve</a>
                <a onclick="document.getElementById('delete').submit()" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
            </div>
        </li>
        <form id="delete" action="property/{{ $property['id'] }}" method="POST"> <input name="_method" type="hidden" value="DELETE">
            @csrf</form>
        @endforeach
    </ul>
</div>
@endsection
