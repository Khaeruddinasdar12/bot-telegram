@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-login">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('asset/image/login.jpg') }}" class="img-login">
                        </div>
                        <div class="col-md-6">
                            <div class="card-center">
                                <img src="{{ asset('asset/image/aps-logo.jpg') }}" class="logo-aps-login">
                                <h1>Welcome Admin</h1>
                            </div>

                            <div class="card-center">
                                <form method="POST" action="{{ route('login') }}" class="content-form">
                                        @csrf

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-login">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
