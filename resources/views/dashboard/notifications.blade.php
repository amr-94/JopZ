@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Notifications</h1>

        <div>
            @foreach ($notifications as $notifications)
                <div class="card my-2">
                    <div class="card-body">

                        @if ($notifications->unread())
                            <a href="{{ route('notifications', $notifications->id) }}"
                                style="text-decoration: none;color: red">
                        @endif
                        <h4> Title : {{ $notifications->data['title'] }}</h4> </a>
                        <p>From : <a
                                href="{{ route('users.show', $notifications->data['sender'] ?? $notifications->data['Apply_by']) }}">
                                {{ $notifications->data['sender'] ?? $notifications->data['Apply_by'] }}</p></a>
                        @if (isset($notifications->data['data']['message']))
                            <p>message of apply : {{ $notifications->data['data']['message'] }}</p>
                            <a href="{{ asset('files/forms/' . $notifications->data['data']['cv']) }}">CV :
                                {{ $notifications->data['data']['cv'] }}</a>
                        @elseif (isset($notifications->data['data']))
                            <p>Comment : {{ $notifications->data['data'] }}</p>
                        @endif

                        <p class="text-muted">{{ $notifications->created_at->diffForhumans() }}</p>

                    </div>
                    <form action="{{ route('notification.destroy', $notifications->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete Notification</button>
                    </form>


                </div>
            @endforeach
        </div>
        @if ($notifications->count() !== 0)
            <form action="{{ route('notification.destroyall') }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-primary" type="submit">Clear all Notifications</button>
            </form>
        @endif


    </div>
@endsection
