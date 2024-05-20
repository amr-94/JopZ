@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Notifications</h1>

        <div>
            @foreach ($notifications as $notifications)
                <div class="card my-2">
                    <div class="card-body">

                        @if ($notifications->unread())
                            <a href="{{ $notifications->data['url'] }}?notify_id={{ $notifications->id }}"
                                style="text-decoration: none;color: red">
                        @endif
                        <h4> Title : {{ $notifications->data['title'] }}</h4> </a>
                        <p>From : {{ $notifications->data['sender'] }}</p>
                        {{-- <p>Type : {{ $notifications->data['data'] }}</p> --}}
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
