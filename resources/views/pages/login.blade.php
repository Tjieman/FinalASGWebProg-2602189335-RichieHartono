{{-- @extends('layouts.registerLayout')

@section('content')
    <div class="row w-100">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col">
            <div class="row">
                <h3 class="text-center">
                    JOB FRIEND
                </h3>
            </div>
            <form action="/login" method="POST">
                <div class="row mt-2">
                    @csrf
                    <div class="row mt-2">
                        <label class="m-0 p-0" for="linkedInUsername">LinkedIn Username</label>
                        <input type="text" id="linkedInUsername" name="linkedInUsername"
                            class=" form-control @error('linkedInUsername') is-invalid @enderror"
                            placeholder="Ex: Username123" value="{{ old('linkedInUsername') }}">
                        @error('linkedInUsername')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label class="m-0 p-0" for="password">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <div class="col m-0 p-0">
                            Don't have an account?
                            <a href="/register"> Register!</a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
            </form>
        </div>
    </div>
@endsection --}}

@extends('layouts.registerLayout')

@section('content')
    <div class="row w-100">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col">
            <div class="row">
                <h3 class="text-center">
                    {{ __('login.title') }}
                </h3>
            </div>
            <form action="/login" method="POST">
                <div class="row mt-2">
                    @csrf
                    <div class="row mt-2">
                        <label class="m-0 p-0" for="linkedInUsername">{{ __('login.linkedin_username') }}</label>
                        <input type="text" id="linkedInUsername" name="linkedInUsername"
                            class="form-control @error('linkedInUsername') is-invalid @enderror"
                            placeholder="Ex: Username123" value="{{ old('linkedInUsername') }}">
                        @error('linkedInUsername')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label class="m-0 p-0" for="password">{{ __('login.password') }}</label>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <div class="col m-0 p-0">
                            {!! __('login.register_prompt') !!}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <button type="submit" class="btn btn-primary">{{ __('login.login_button') }}</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
