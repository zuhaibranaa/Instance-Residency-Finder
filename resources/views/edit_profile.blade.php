@extends('newLayout.app')

@section('content')
    <div class="row justify-content-between" >
        {{-- Main Operation--}}
        <div style="padding-inline: 2%" class="col-md-12 ">

        <div class="card">
            <div class="card-body">
                <div class="page-header d-flex justify-content-between">
                    <h1>Profile</h1>
                    <form method="POST" action="/profile/{{$user['id']}}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete Account') }}
                        </button>
                    </form>
                </div>
                <form method="POST" action="/profile/{{$user['id']}}">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{$user['name']}}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" value="{{ $user['phone'] }}" type="tel" placeholder="03001234567" pattern="[0-9]{11}" class="search-field @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @if (auth()->user()['role_id'] != 1)
                    <div class="form-group row">
                        <label for="roleid" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                        <div class="col-md-6">
                            <select id="roleid" class="search-field @error('roleid') is-invalid @enderror" name="roleid" required>
                                <option value="2" @if (auth()->user()['role_id'] == 2)
                                    selected
                                @endif>Seller</option>
                                <option value="3" @if (auth()->user()['role_id'] == 3)
                                    selected
                                @endif>Customer</option>
                              </select>



                            @error('roleid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    @endif

                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        </div>
    </div>
@endsection
