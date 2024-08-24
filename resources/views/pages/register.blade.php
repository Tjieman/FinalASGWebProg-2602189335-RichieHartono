{{-- @extends('layouts.registerLayout')

@section('content')
    <div class="row w-100">
        <div class="col">
            <div class="row">
                <h3 class="text-center">
                    JOB FRIEND
                </h3>
            </div>
            <form action="/register" method="POST">
                <div class="row mt-2">
                    @csrf
                    <label class="m-0 p-0" for="gender">Gender:</label>
                    <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option value="">Select a gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mt-2">
                    <label class="m-0 p-0" for="linkedInUsername">LinkedIn Username</label>
                    <input type="text" id="linkedInUsername" name="linkedInUsername"
                        class=" form-control @error('linkedInUsername') is-invalid @enderror" placeholder="Ex: Username123"
                        value="{{ old('linkedInUsername') }}">
                    @error('linkedInUsername')
                        <div class="invalid-feedback">
                            {{ $message }}

                        </div>
                    @enderror
                </div>
                <div class="row mt-2">
                    <label class="m-0 p-0" for="mobileNumber">Mobile Number</label>
                    <input type="text" id="mobileNumber" name="mobileNumber"
                        class="form-control @error('mobileNumber') is-invalid @enderror" placeholder="Ex: 081212348976"
                        value="{{ old('mobileNumber') }}">

                    @error('mobileNumber')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row mt-2">
                    <label for="fieldOfWork" class="m-0 p-0">Field of Work (Hold Control to Select)</label>
                    <select name="fieldOfWork[]" id="fieldOfWork" multiple
                        class="form-select @error('fieldOfWork') is-invalid @enderror">
                        @foreach ($fieldsOfWork as $field)
                            <option value="{{ $field->id }}">{{ $field->name }}</option>
                        @endforeach
                    </select>

                    @error('fieldOfWork')
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
                    <label class="m-0 p-0" for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row mt-2">
                    <div class="col m-0 p-0">
                        Already have an account?
                        <a href="/login"> Login!</a>
                    </div>
                </div>
                <div class="row mt-2">
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
                    {{ __('register.title') }}
                </h3>
            </div>
            <form action="/register" method="POST">
                <div class="row mt-2">
                    @csrf
                    <label class="m-0 p-0" for="gender">{{ __('register.gender') }}</label>
                    <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option value="">{{ __('register.select_gender') }}</option>
                        <option value="male">{{ __('register.male') }}</option>
                        <option value="female">{{ __('register.female') }}</option>
                    </select>

                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mt-2">
                    <label class="m-0 p-0" for="linkedInUsername">{{ __('register.linkedin_username') }}</label>
                    <input type="text" id="linkedInUsername" name="linkedInUsername"
                        class="form-control @error('linkedInUsername') is-invalid @enderror" placeholder="Ex: Username123"
                        value="{{ old('linkedInUsername') }}">
                    @error('linkedInUsername')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mt-2">
                    <label class="m-0 p-0" for="mobileNumber">{{ __('register.mobile_number') }}</label>
                    <input type="text" id="mobileNumber" name="mobileNumber"
                        class="form-control @error('mobileNumber') is-invalid @enderror" placeholder="Ex: 081212348976"
                        value="{{ old('mobileNumber') }}">

                    @error('mobileNumber')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row mt-2">
                    <label for="fieldOfWork" class="m-0 p-0">{{ __('register.field_of_work') }}</label>
                    <select name="fieldOfWork[]" id="fieldOfWork" multiple
                        class="form-select @error('fieldOfWork') is-invalid @enderror">
                        @foreach ($fieldsOfWork as $field)
                            <option value="{{ $field->id }}">{{ $field->name }}</option>
                        @endforeach
                    </select>

                    @error('fieldOfWork')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row mt-2">
                    <label class="m-0 p-0" for="password">{{ __('register.password') }}</label>
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mt-2">
                    <label class="m-0 p-0" for="password_confirmation">{{ __('register.confirm_password') }}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row mt-2">
                    <div class="col m-0 p-0">
                        {{ __('register.already_have_account') }}
                        <a href="/login">{{ __('register.login') }}</a>
                    </div>
                </div>
                <div class="row mt-2">
                    <button type="submit" class="btn btn-primary">{{ __('register.register') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
