@extends('layouts.dashboard')
@section('title', 'Companies')
@section('content')
    @component('components.alert_component')
    @endcomponent
    <button class="btn btn-dark mb-3"><a href="{{ route('companies.create') }}">Add Company</a></button>
    <button class="btn btn-dark mb-3"><a href=" ">Trash</a></button>
    {{-- <div class="row"> --}}
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($companies as $company)
            <div class="col">
                <div class="card">
                    <img src="{{ asset('files/company/' . $company->logo) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a
                                href="{{ route('companies.show', $company->slug) }}">{{ $company->name }}</a></h5>
                        <p class="card-text">{{ $company->description }}</p>
                        <p class="card-text">{{ count($company->jops) }} Jops in this company</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text mb-5">{{ $company->created_at->diffForHumans() }}</p>
                        @if (Auth::user() == $company->user)
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('companies.edit', $company->slug) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('companies.destroy', $company->slug) }}" method="post">
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
