@extends('layouts.app')

@section('content')
<div class="row">
    @include('layouts.sidebar')
    <div class="col-sm-12" style="padding-inline: 2%">
        <div class="card">
            <div class="card-body">
                <div class="page-header d-flex justify-content-between">
                    <h1>Properties</h1>
                </div>
                <table class="table table-striped table-sm table-responsive-md">
                    <caption>{{ count($properties) }} Properties</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Property For</th>
                            <th>Seller ID</th>
                            <th>Seller Name</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $post => $id)
                            <tr>
                            <td>{{$id['id']}}</td>
                            <td>{{$id['Title']}}</td>
                            <td>{{$id['Location']}}</td>
                            <td>{{$id['Property_Type']}}</td>
                            <td>{{$id['Seller_ID']}}</td>
                            <td>{{App\Models\User::find($id['Seller_ID'])['name']}}</td>
                            <td>{{$id['Latitude']}}</td>
                            <td>{{$id['Longitude']}}</td>

                            <td>
                                <form method="POST" action="property/{{ $id['id'] }}" class="form-inline">
                                    <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <button class="btn btn-danger btn-sm" name="submit" type="submit"><i
                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






@endsection
