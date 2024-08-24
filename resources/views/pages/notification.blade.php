{{-- @extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>Notifications</h2>
        <div class="row">
            <div class="card" style="width: 100vw;">
                <ul class="list-group list-group-flush">
                    @foreach ($notifs as $notif)
                    <li class="list-group-item d-flex justify-content-between">
                        {{ $notif->message }}
                        <span>{{ $notif->created_at }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection --}}

@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>{{ __('notification.title') }}</h2>
        <div class="row">
            <div class="card" style="width: 100vw;">
                <ul class="list-group list-group-flush">
                    @foreach ($notifs as $notif)
                        <li class="list-group-item d-flex justify-content-between">
                            {{ $notif->message }}
                            <span>{{ $notif->created_at->format('Y-m-d H:i:s') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
