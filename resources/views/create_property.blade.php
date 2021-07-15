@extends('layouts.app')

@section('content')
    <div class="row justify-content-between" >

        {{-- SideBar --}}
        @include('layouts.sidebar')

        {{-- Main Operation--}}
        <div style="padding-right: 2%;padding-left: 2%" class="col-md-12">
            <div class="card">
                <div class="card-header">Add New Property For Sale/Rent</div>

                <div class="card-body">
                    <form method="POST" enctype='multipart/form-data' action="/property">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control " name="title" required autofocus="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">Location</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control " name="location" required>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="roleid" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-3">
                                <select id="roleid" class="form-control " name="roleid" required="">
                                    <option value="Rent">Rent</option>
                                    <option value="Sale">Sale</option>
                                  </select>
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="longitude" class="col-md-4 col-form-label text-md-right">Location</label>
                            <div class="map col-md-12" id="latlng">


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Images</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control col-md-6" name="image[]" multiple required ><br/>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        </div>
    </div>
    <script src="{{ asset('js/vue.js') }}"></script>
@endsection
