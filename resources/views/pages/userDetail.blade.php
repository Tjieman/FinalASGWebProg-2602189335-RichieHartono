{{-- @extends('layouts.layout')

@section('content')
    <div class="container">
        @php
            $username = str_replace('https://www.linkedin.com/in/', '', $user->linkedInUsername);
        @endphp
        <h2>{{ $username }}</h2>
        <div class="row mt-2 mb-5">
            <div class="row mt-3 d-flex justify-content-center align-items-center" style="width: 90vw; height: 50vh;">
                <div class="" style="height: 100%; width: 50%;overflow: hidden;">
                    <img src="/images/{{ $user->image }}" alt=""
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
            <h3 class="text-center">
                {{ $username }}
            </h3>
        </div>
        <div class="row">
        </div>
    @endsection --}}

    @extends('layouts.layout')

@section('content')
    <div class="container">
        @php
            $username = str_replace('https://www.linkedin.com/in/', '', $user->linkedInUsername);
        @endphp
        <h2>{{ __('userdetail.username') }}: {{ $username }}</h2>
        <div class="row mt-2 mb-5">
            <div class="row mt-3 d-flex justify-content-center align-items-center" style="width: 90vw; height: 50vh;">
                <div class="" style="height: 100%; width: 50%;overflow: hidden;">
                    <img src="/images/{{ $user->image }}" alt=""
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
            <h3 class="text-center">
                {{ __('userdetail.username') }}: {{ $username }}
            </h3>
        </div>
        <div class="row">
        </div>
    </div>
@endsection
