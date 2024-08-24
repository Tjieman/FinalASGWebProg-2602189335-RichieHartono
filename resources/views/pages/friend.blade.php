{{-- @extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>FRIENDS</h2>
        <div class="row">
            @foreach ($users as $user)
                @php
                    $username = str_replace('https://www.linkedin.com/in/', '', $user->linkedInUsername);
                @endphp
                @if (Auth::id() !== $user->id)
                    @if (Auth::user()->areMutualFollowers($user))
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
                @endif
            @endforeach
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection --}}

@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>{{ __('friends.friends') }}</h2>
        <div class="row">
            @foreach ($users as $user)
                @php
                    $username = str_replace('https://www.linkedin.com/in/', '', $user->linkedInUsername);
                @endphp
                @if (Auth::id() !== $user->id)
                    @if (Auth::user()->areMutualFollowers($user))
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
                                                    <i class="bi bi-hand-thumbs-up-fill"></i> {{ __('friends.followed') }}
                                                </button>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-hand-thumbs-down-fill"></i> {{ __('friends.unfollow') }}
                                                </button>
                                            </form>

                                            @if (Auth::user()->areMutualFollowers($user))
                                                <a href="{{ route('call', $user->id) }}" class="text-decoration-none">
                                                    <button class="btn btn-info d-flex">
                                                        <i class="bi bi-telephone-fill" style="color: white"></i>
                                                        <span class="ms-2" style="color: white">{{ __('friends.call') }}</span>
                                                    </button>
                                                </a>
                                            @endif
                                        @else
                                            <form action="{{ route('follow', $user->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary">
                                                    <i class="bi bi-hand-thumbs-up"></i> {{ __('friends.follow') }}
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
