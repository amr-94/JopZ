@extends('layouts.dashboard')
@section('title', 'All Jops')
@section('content')
    @component('components.alert_component')
    @endcomponent
    <button class="btn btn-dark mb-3"><a href="{{ route('jops.create') }}">Add Jop</a></button>
    <button class="btn btn-dark mb-3"><a href="{{ route('jops.trash') }}">Trash</a></button>
    <div class="row row-cols-1 row-cols-md-3 g-3">
        @foreach ($jops as $jop)
            <div class="col">
                <div class="card">
                    <img src="{{ asset('files/jops/' . $jop->image) }}" class="card-img-top" alt="..."
                        style="height: 100%">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('jops.show', $jop->slug) }}">{{ $jop->name }}</a></h5>
                        <p class="card-text">Description : {{ $jop->description }}</p>
                        <p class="card-text"> Type : {{ $jop->type }}</p>
                        <p class="card-text"> Status : {{ $jop->status }}</p>
                        <p class="card-text"> Category : <a
                                href="{{ route('categories.show', $jop->category->slug) }}">{{ $jop->category->name }}</a>
                        </p>
                        <p class="card-text"> Company : <a
                                href="{{ route('companies.show', $jop->company->slug) }}">{{ $jop->company->name }}</a>
                        </p>
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
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('jops.edit', $jop->slug) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('jops.destroy', $jop->slug) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $jops->links() }}
@endsection
