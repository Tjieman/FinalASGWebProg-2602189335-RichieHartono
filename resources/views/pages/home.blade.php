{{-- @extends('layouts.layout')

@section('content')
    <div class="container">
        <form action="{{ route('search') }}" method="GET" class="row mb-3">
            <div class="col-7">
                <div class="form-group mr-2">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group mr-2">
                    <select class="form-control" name="gender">
                        <option value="">All</option>
                        <option value="male" {{ request()->input('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ request()->input('gender') == 'female' ? 'selected' : '' }}>Female
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group mr-2">
                    <select class="form-control" name="job">
                        <option value="">Job</option>
                        @foreach ($jobs as $job)
                            <option value="{{ $job->id }}" {{ request()->input('job') == $job->id ? 'selected' : '' }}>
                                {{ $job->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary">Search</button>

            </div>
        </form>
        <div class="row">
            @foreach ($users as $user)
                @php
                    $username = str_replace('https://www.linkedin.com/in/', '', $user->linkedInUsername);
                @endphp
                @if (Auth::id() !== $user->id)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <a href="{{ route('user.detail', $user->id) }}" class="text-decoration-none">
                                <img src="/images/{{ $user->image }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $username }}</h5>
                                <p class="card-text">
                                    @foreach ($user->fieldOfWorks->take(3) as $field)
                                        <span class="badge bg-primary">{{ $field->name }}</span>,
                                    @endforeach

                                    @if ($user->fieldOfWorks->count() > 3)
                                        <span class="badge bg-secondary">...</span>
                                    @endif
                                </p>
                                @auth
                                    @if (Auth::user()->follows($user))
                                        <form action="{{ route('unfollow', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">
                                                <i class="bi bi-hand-thumbs-up-fill"></i> Followed
                                            </button>
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-hand-thumbs-down-fill"></i> Unfollow
                                            </button>
                                        </form>

                                        @if (Auth::user()->areMutualFollowers($user))
                                            <a href="{{ route('call', $user->id) }}" class="text-decoration-none">
                                                <button class="btn btn-info d-flex">
                                                    <i class="bi bi-telephone-fill" style="color: white"></i>
                                                    <span class="ms-2" style="color: white">Call</span>
                                                </button>
                                            </a>
                                        @endif
                                    @else
                                        <form action="{{ route('follow', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary">
                                                <i class="bi bi-hand-thumbs-up"></i> Follow
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection --}}

@extends('layouts.layout')

@section('content')
    <div class="container">
        <form action="{{ route('search') }}" method="GET" class="row mb-3">
            <div class="col-7">
                <div class="form-group mr-2">
                    <input type="text" class="form-control" name="search" placeholder="{{ __('home.search_placeholder') }}">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group mr-2">
                    <select class="form-control" name="gender">
                        <option value="">{{ __('home.all') }}</option>
                        <option value="male" {{ request()->input('gender') == 'male' ? 'selected' : '' }}>{{ __('home.male') }}</option>
                        <option value="female" {{ request()->input('gender') == 'female' ? 'selected' : '' }}>{{ __('home.female') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group mr-2">
                    <select class="form-control" name="job">
                        <option value="">{{ __('home.job') }}</option>
                        @foreach ($jobs as $job)
                            <option value="{{ $job->id }}" {{ request()->input('job') == $job->id ? 'selected' : '' }}>
                                {{ $job->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary">{{ __('home.search') }}</button>
            </div>
        </form>
        <div class="row">
            @foreach ($users as $user)
                @php
                    $username = str_replace('https://www.linkedin.com/in/', '', $user->linkedInUsername);
                @endphp
                @if (Auth::id() !== $user->id)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <a href="{{ route('user.detail', $user->id) }}" class="text-decoration-none">
                                <img src="/images/{{ $user->image }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $username }}</h5>
                                <p class="card-text">
                                    @foreach ($user->fieldOfWorks->take(3) as $field)
                                        <span class="badge bg-primary">{{ $field->name }}</span>,
                                    @endforeach

                                    @if ($user->fieldOfWorks->count() > 3)
                                        <span class="badge bg-secondary">...</span>
                                    @endif
                                </p>
                                @auth
                                    @if (Auth::user()->follows($user))
                                        <form action="{{ route('unfollow', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">
                                                <i class="bi bi-hand-thumbs-up-fill"></i> {{ __('home.followed') }}
                                            </button>
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-hand-thumbs-down-fill"></i> {{ __('home.unfollow') }}
                                            </button>
                                        </form>

                                        @if (Auth::user()->areMutualFollowers($user))
                                            <a href="{{ route('call', $user->id) }}" class="text-decoration-none">
                                                <button class="btn btn-info d-flex">
                                                    <i class="bi bi-telephone-fill" style="color: white"></i>
                                                    <span class="ms-2" style="color: white">{{ __('home.call') }}</span>
                                                </button>
                                            </a>
                                        @endif
                                    @else
                                        <form action="{{ route('follow', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary">
                                                <i class="bi bi-hand-thumbs-up"></i> {{ __('home.follow') }}
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
