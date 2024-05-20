@extends('layouts.dashboard')
@section('title', 'Show Category')
@section('content')
    <div class="row row-cols-1 row-cols-md-12 g-4">
        <div class="col">
            <div class="card">
                <img src="{{ asset('files/categories/' . $Category->image) }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Category Name / {{ $Category->name }}</h5>
                    <p class="card-text">Category Description / {{ $Category->description }}</p>
                    <p>Sub Category / {{ $Category->parent_id ?? 'No Sub Category' }}</p>
                    <p>Status / {{ $Category->status }}</p>
                    <p class="card-text">

                </div>
                <div class="card-footer">
                    <p class="card-text mb-5">{{ $Category->created_at->diffForHumans() }}</p>
                    @if (Auth::user() == $Category->user)
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('companies.edit', $Category->slug) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('companies.destroy', $Category->slug) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- Jop of category --}}

    <div class="row row-cols-1 row-cols-md-3 g-3">
        @foreach ($Category->jops as $jop)
            <div class="col">
                <div class="card">
                    <img src="{{ asset('files/jops/' . $jop->image) }}" class="card-img-top" alt="..."
                        style="height: 100%">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('jops.show', $jop->slug) }}">{{ $jop->name }}</a></h5>
                        <p class="card-text">{{ $jop->description }}</p>
                        <p class="card-text"> Type : {{ $jop->type }}</p>
                        <p class="card-text"> Status : {{ $jop->status }}</p>
                        <p class="card-text"> Category : {{ $jop->category->name }}</p>
                        <p class="card-text"> Company : {{ $jop->company->name }}</p>
                        <p class="card-text"> uploded by : {{ $jop->user->name }}</p>
                        @php
                            $tags = explode(',', $jop->tags);
                        @endphp
                        @foreach ($tags as $tag)
                            <span class="badge bg-primary">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <p class="card-text mb-5">{{ $jop->created_at->diffForHumans() }}</p>
                        @if (Auth::user() == $jop->user)
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
