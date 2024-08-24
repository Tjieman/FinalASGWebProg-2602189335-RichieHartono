{{-- @extends('layouts.registerLayout')

@section('content')
    <div class="row w-100">
        <div class="col">
            <div class="row">
                <h3 class="text-center">
                    ONE MORE STEP TO UNLOCK YOUR ACCOUNT
                </h3>
            </div>

            <div class="row mt-3 d-flex justify-content-center align-items-center" style="width: 90vw; height: 50vh;">
                <div class="" style="height: 100%; width: 50%;overflow: hidden;">
                    <img src="/images/{{ Auth::user()->image }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
            <h5 class="text-center">
                Your Avatar
            </h5>
            <form action="/register2" method="POST">
                @csrf
                <div class="row mt-2">
                    <div class="row mt-2">
                        <label class="m-0 p-0" for="paymentAmount">Payment Amount -> {{ Auth::user()->paymentAmount }}</label>
                            <input type="number" id="paymentAmount" name="paymentAmount"
                                class="form-control @error('paymentAmount') is-invalid @enderror" placeholder="">
                        @error('paymentAmount')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
            </form>
        </div>
    </div>
@endsection --}}

@extends('layouts.registerLayout')

@section('content')
    <div class="row w-100">
        <div class="col">
            <div class="row">
                <h3 class="text-center">
                    {{ __('register2.title') }}
                </h3>
            </div>

            <div class="row mt-3 d-flex justify-content-center align-items-center" style="width: 90vw; height: 50vh;">
                <div class="" style="height: 100%; width: 50%;overflow: hidden;">
                    <img src="/images/{{ Auth::user()->image }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
            <h5 class="text-center">
                {{ __('register2.avatar') }}
            </h5>
            <form action="/register2" method="POST">
                @csrf
                <div class="row mt-2">
                    <div class="row mt-2">
                        <label class="m-0 p-0" for="paymentAmount">
                            {{ __('register2.payment_amount', ['amount' => Auth::user()->paymentAmount]) }}
                        </label>
                        <input type="number" id="paymentAmount" name="paymentAmount"
                            class="form-control @error('paymentAmount') is-invalid @enderror" placeholder="">
                        @error('paymentAmount')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary">{{ __('register2.register') }}</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
