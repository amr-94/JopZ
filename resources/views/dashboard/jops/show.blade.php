@extends('layouts.dashboard')
@section('title', $jop->name . ' Jop Details')
@section('content')
    {{-- <div class="row row-cols-1 row-cols-md-12 "> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card mx-auto" style="width: 95%;">

                    <img src="{{ asset('files/jops/' . $jop->image) }}" class="card-img-top " alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jop title / {{ $jop->name }}</h5>
                        <p class="card-text">
                        <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">Jop
                            Description :
                        </p>{{ $jop->description }}</p>
                        <p class="card-text">
                        <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">Jop
                            Category :
                        </p><a href="{{ route('categories.show', $jop->category->slug) }}">{{ $jop->category->name }}</a>
                        </p>
                        <p class="card-text">
                        <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">jop
                            copmany :
                        </p><a href="{{ route('companies.show', $jop->company->slug) }}">{{ $jop->company->name }}</a></p>
                        <p class="card-text">
                        <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">jop
                            TAGS :
                            @foreach ($tags as $tag)
                                <span class="badge bg-primary">{{ $tag }}</span>
                            @endforeach
                        </p>
                        <p class="card-text">
                        <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">jop
                            uploded user :
                        </p>{{ $jop->user->name }}</p>
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
        </div>
    </div>

@endsection
