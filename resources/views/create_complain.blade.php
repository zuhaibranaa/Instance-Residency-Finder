@extends('newLayout.app')

@section('content')

<form method="POST" enctype='multipart/form-data' id="create-property" action="/complain">
        @csrf

<div id="add-listing" style="margin-top: 5%">
    <div class="add-listing-section">

        <!-- Headline -->
        <div class="add-listing-headline">
            <h3><i class="sl sl-icon-doc"></i> File A Complain</h3>
        </div>

        <!-- Title -->
        <div class="row with-forms">
            <div class="col-md-12">
                <h5>Title <i class="tip" data-tip-content="Descibe Your Complain Details "><div class="tip-content">Complain Text</div><div class="tip-content">Complain Details</div></i></h5>
                <textarea id="title" name="text" class="search-field" rows="4" required></textarea>
            </div>
        </div>


        <div class="row with-forms">

            <div class="col-md-12">
                <h5>Against User</h5>
                <select id="roleid" class="search-field " name="against" required="">
                    @foreach ($user as $u)
                        <option value="{{ $u['id'] }}">{{ $u['name'] }}</option>
                    @endforeach
                  </select>
            </div>

    </div>
    <!-- Section / End -->

    <a href="#" style="margin-inline: 45%" onclick="document.getElementById('create-property').submit()" class="button preview">Save <i class="fa fa-arrow-circle-right"></i></a>
</form>


</div>

@endsection
