@extends('newLayout.app')

@section('content')

<form method="POST" enctype='multipart/form-data' id="create-property" action="/property">
        @csrf

<div id="add-listing" style="margin-top: 5%">
    <div class="add-listing-section">

        <!-- Headline -->
        <div class="add-listing-headline">
            <h3><i class="sl sl-icon-doc"></i> Basic Information</h3>
        </div>

        <!-- Title -->
        <div class="row with-forms">
            <div class="col-md-12">
                <h5>Title <i class="tip" data-tip-content="Name of your business"><div class="tip-content">Title for your property</div><div class="tip-content">Name of your business</div></i></h5>
                <input id="title" name="title" class="search-field" type="text" value="{{ $property['Title'] }}" required>
            </div>
        </div>


        <div class="row with-forms">

            <div class="col-md-6">
                <h5>Category</h5>
                <select id="roleid" class="search-field " name="roleid" required="">
                    <option value="Rent" @if ($property['Property_Type'] == 'Rent') selected @endif>Rent</option>
                    <option value="Sale"@if ($property['Property_Type'] == 'Sale') selected @endif>Sale</option>
                  </select>
            </div>

            <div class="col-md-6">
                <h5>Price </h5>
                <input id="price" name="price" class="search-field" type="text" value="{{ $property['price'] }}" required>
            </div>
        </div>

        <div class="row with-forms">
            <!-- Address -->
            <div class="main-search-input">

                <div class="main-search-input-item location">
                    <div id="autocomplete-container">
                        <input name="location" value="{{ $property['Location'] }}" id="autocomplete-input" type="text" placeholder="Location" autocomplete="off"><div id="leaflet-geocode-cont"><ul></ul></div>
                    </div><span class="type-and-hit-enter">type and hit enter</span>
                </div>


            </div>

        </div>


        <!-- Row / End -->

        <div class="row with-forms">

            <div class="col-md-12">
                <h5>Images</label>
                <input style="padding-top: 1%" id="image" type="file" class="search-field" name="image[]" multiple required ><br/>
            </div>
        </div>
    </div>
    <!-- Section / End -->

    <a href="#" onclick="document.getElementById('create-property').submit()" class="button preview">Save <i class="fa fa-arrow-circle-right"></i></a>
</form>


</div>

@endsection
