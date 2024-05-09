@extends('justnpot.customer-main')
@section('title', 'Home')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />

<div class="container">
            <div class="row">
                 <div class="col-lg-10 mx-auto mb-4">
                    <div class="section-title text-center mt-5">
                        @if (session('success'))
                        <div class="alert alert-success">
                          {{session('success')}}
                        </div>
                    @endif
                        <h3 class="top-c-sep">Manage Account</h3>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="career-search mb-60">
                        <div class="container" >
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">{{ __('Information') }}</div>

                                        <div class="card-body">
                                            @foreach($users as $user)
                                            <form method="POST" action="/updateacc/{{ auth()->user()->id }}" enctype="multipart/form-data">

                                                @csrf
                                                @method('PUT')

                                                <div class="row mb-3">
                                                    <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>

                                                    <div class="col-md-6">

                                                        <select class="form-select @error('type') is-invalid @enderror" aria-label="Default select example" name="type" id="type" required  required autocomplete="type" disabled >
                                                            <option class="opt1" value="" disabled selected hidden>Select User Type</option>
                                                            <option value="0" {{$user ->role == 0 ? 'selected' : ''}}>Customer</option>
                                                            <option value="2" {{$user ->role == 2 ? 'selected' : ''}}>Member</option>
                                                         </select>
                                                        @error('type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input value="{{ $user ->name }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" value="{{ $user ->email }}"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="row mb-3">
                                                    <label for="address"  class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="address" value="{{ $user ->address }}" type="text" class="form-control @error('address') is-invalid @enderror" name="address"  required autocomplete="address" autofocus>

                                                        @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Contact No.') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="mobile" value="{{ $user ->mobile }}"  type="text" pattern="\d*" maxlength="20" class="form-control @error('mobile') is-invalid @enderror" name="mobile"  required autocomplete="mobile" autofocus>

                                                        @error('mobile')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                                    <div class="col-md-6">
                                                        <select class="form-select" aria-label="Default select example" name="gender" id="gender" >
                                                            <option class="opt1" value="" disabled selected hidden>Select Gender</option>
                                                            <option value="0"  {{$user ->gender == 0 ? 'selected' : ''}}> Male</option>
                                                            <option value="1"  {{$user ->gender == 1 ? 'selected' : ''}}> Female</option>

                                                         </select>
                                                        @error('gender')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="age" value="{{ $user ->age }}"  type="number" class="form-control @error('age') is-invalid @enderror" name="age"  required autocomplete="age" autofocus>

                                                        @error('age')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="birthdate"  class="col-md-4 col-form-label text-md-end">{{ __('Birthdate') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="birthdate" value="{{ $user ->birthdate }}" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate"  required autocomplete="birthdate" autofocus>

                                                        @error('birthdate')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>





                                                <div class="row mb-3">
                                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Profile') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"   autocomplete="image" autofocus>

                                                        @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="row mb-3">
                                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-3">

                                                    <div class="col-md-4">

                                                    </div>
                                                    <div class="col-md-8 " style="font-size:16px !important;
                                                    border: 2px solid rgb(112, 112, 112);

                                                    border-radius: 10px; text-align:left; background-color:rgb(198, 255, 198) ">

                        Note: Password must contain this<br> <br>
                        • Must be at least 8 characters in length <br>
                        • Must contain at least one lowercase letter<br>
                        • Must contain at least one uppercase letter<br>
                        • Must contain at least one digit <br>
                        • Must contain a special character

                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                                    </div>
                                                </div>



                                                <div class="row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Update Information') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                    </div>

                </div>
            </div>

        </div>
        <script type="text/javascript">
            function click (e) {
              if (!e)
                e = window.event;
              if ((e.type && e.type == "contextmenu") || (e.button && e.button == 2) || (e.which && e.which == 3)) {
                if (window.opera)
                  window.alert("");
                return false;
              }
            }
            if (document.layers)
              document.captureEvents(Event.MOUSEDOWN);
            document.onmousedown = click;
            document.oncontextmenu = click;
            </script>
    @stop



