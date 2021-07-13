@extends('layouts.app')

@section('content')
    <div class="row justify-content-between">

        {{-- SideBar --}}
        @include('layouts.sidebar')

        {{-- Main Operation--}}
        <div style="padding-right: 2%;padding-left: 2%" class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $role['Name'] }} Dashboard
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($role['id'] == 1)
                        Admin Dashboard
                    @elseif ($role['id'] == 2)
                        Seller Dashboard
                    @else
                            @foreach ($data as $dat)
                                {{ $dat->id }}<br/>
                                {{ $dat->Title }}<br/>
                                {{ $dat->Location }}<br/>
                                {{ $dat->Property_Type }}<br/>
                                {{ $dat->Seller_ID }}<br/>
                                {{ $dat->Latitude }}<br/>
                                {{ $dat->Longitude }}<br/>
                            @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
