@extends('layouts.dashboard')
@section('title', $user->name . ' ' . 'profile')
@section('content')
    @component('components.alert_component')
    @endcomponent
    <div class="row row-cols-1 row-cols-md-12 g-4">
        <div class="col">
            <div class="card">
                <img src="{{ asset('files/profile/images/' . $user->image) }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">user name : {{ $user->name }}</h5>
                    <p class="card-text">
                    <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">User
                        Email :
                    </p>{{ $user->email }}</p>
                    <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">User
                        Address :
                    </p>{{ $user->address }}</p>
                    <p class="card-text">
                    <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">User
                        Phone :
                    </p>{{ $user->phone }}</p>
                    <ul>
                        Attach :
                        @if ($user->attach == null)
                            <li>No attach</li>
                        @else
                            @foreach ($user->attach as $attach)
                                <li>
                                    <a href="{{ asset('files/profile/attach' . $attach ?? '') }}"> {{ $attach }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                @if (Auth::user()->id == $user->id)
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('users.edit', $user->name) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    {{-- Jop of user  --}}
    <h3 class="text-center">Jop of user {{ $user->name }}</h3>
    <div class="row row-cols-1 row-cols-md-3 g-3">
        @foreach ($user->jops as $jop)
            <div class="col">
                <div class="card">
                    <img src="{{ asset('files/jops/' . $jop->image) }}" class="card-img-top" alt="..."
                        style="height: 10%;width: 10%">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('jops.show', $jop->slug) }}">{{ $jop->name }}</a></h5>
                        <p class="card-text">{{ $jop->description }}</p>
                        <p class="card-text"> Type : {{ $jop->type }}</p>
                        <p class="card-text"> Status : {{ $jop->status }}</p>
                        @if ($jop->category)
                            <p class="card-text"> Category : {{ $jop->category->name }}</p>
                        @else
                            No Category
                        @endif
                        @if ($jop->company)
                            <p class="card-text"> Company : {{ $jop->company->name }}</p>
                        @else
                            <p> no company </p>
                        @endif
                        @php
                            $tags = explode(',', $jop->tags);
                        @endphp
                        @foreach ($tags as $tag)
                            <span class="badge bg-primary">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <p class="card-text mb-5">creted since : {{ $jop->created_at->diffForHumans() }}</p>
                            <p class="card-text mb-5">last updated since :{{ $jop->updated_at->diffForHumans() }}</p>
                        </div>
                        @if (Auth::user()->id == $jop->user_id)
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('jops.edit', $jop->slug) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('jops.destroy', $jop->slug) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
