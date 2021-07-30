@extends('newLayout.app')

@section('content')
<div class="dashboard-list-box margin-top-0" style="padding-top: 7%">
    <h4>Active Listings</h4>
    <ul>
        <form id="approve" action="/approve" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="2">
            </form>
        @foreach ($complains as $property)
        <li>
            <div class="list-box-listing">
                <div class="list-box-listing-content">
                    <div class="inner">
                        <h3>Complain By : {{ App\Models\User::find($property['by'])['name'] }}</h3>
                        <span>Complain Against : {{ App\Models\User::find($property['against'])['name'] }}</span><br/>
                        <span>Text : {{ $property['Text'] }}</span><br/>
                    </div>
                </div>
            </div>
            <div class="buttons-to-right">
                <a onclick="document.getElementById('delete').submit()" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
            </div>
        </li>
        <form id="delete" action="complain/{{ $property['id'] }}" method="POST">
            @method('DELETE')
            @csrf
        </form>
        @endforeach
    </ul>
</div>
@endsection
