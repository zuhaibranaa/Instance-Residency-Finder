@extends('layouts.app')

@section('content')
<div class="row">
    @include('layouts.sidebar')
    <div class="col-sm-12" style="padding-inline: 2%">
        <div class="card">
            <div class="card-body">
                <div class="page-header d-flex justify-content-between">
                    <h1>Users</h1>
                </div>
                <table class="table table-striped table-sm table-responsive-md">
                    <caption>{{count($users)}} Users</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Created at</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($users as $post => $id)
                        <tr>
                            <td>{{$id['id']}}</td>
                            <td>{{$id['name']}}</td>
                            <td><a href="mailto:{{$id['email']}}">{{$id['email']}}</a></td>
                            <td><a href="callto:{{$id['phone']}}">{{$id['phone']}}</a></td>
                            <td>{{date_format(date_create($id['created_at']),'l d F Y g :i a')}}</td>
                            <td>{{App\Models\role::find($id['role_id'])['Name']}}</td>

                            <td>
                                <form method="POST" action="#" class="form-inline">
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
