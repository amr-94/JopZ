@extends('layouts.dashboard')
@section('title', 'Show Category')
@section('content')
    <div class="row row-cols-1 row-cols-md-12 g-4">
        <div class="col">
            <div class="card">
                <img src="{{ asset('files/categories/' . $Category->image) }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title"> @lang('main.Category Name') / {{ $Category->name }} </h5>
                    <p class="card-text">@lang('main.Category Description') / {{ $Category->description }}</p>
                    <p>@lang('main.Sub Category') / {{ $Category->parent_id ?? 'No Sub Category' }}</p>
                    <p>Status / {{ $Category->status }}</p>
                    <p class="card-text">

                </div>
                <div class="card-footer">
                    <p class="card-text mb-5">{{ $Category->created_at->diffForHumans() }}</p>
                    @if (Auth::user()->id == $Category->user_id)
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('companies.edit', $Category->slug) }}"
                                class="btn btn-primary">@lang('main.Edit')</a>
                            <form action="{{ route('companies.destroy', $Category->slug) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">@lang('main.Delete')</button>
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
                        <p class="card-text"> @lang('main.Type') : {{ $jop->type }}</p>
                        <p class="card-text"> @lang('main.Status') : {{ $jop->status }}</p>
                        @if ($jop->category)
                            <a href="{{ route('categories.show', $jop->category->slug) }}">{{ $jop->category->name }}</a>
                        @else
                            @lang('main.No Category')
                        @endif
                        </p>
                        <p class="card-text"> @lang('main.Company') :
                            @if ($jop->company)
                                <a href="{{ route('companies.show', $jop->company->slug) }}">{{ $jop->company->name }}</a>
                            @else
                                @lang('main.No Company')
                            @endif
                        </p>
                        <p class="card-text"> @lang('main.uploded by') : {{ $jop->user->name }}</p>
                        @php
                            $tags = explode(',', $jop->tags);
                        @endphp
                        @foreach ($tags as $tag)
                            <span class="badge bg-primary">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <p class="card-text mb-5">{{ $jop->created_at->diffForHumans() }}</p>
                        @if (Auth::user()->id == $jop->user_id)
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('jops.edit', $jop->slug) }}"
                                    class="btn btn-primary">@lang('main.Edit')</a>
                                <form action="{{ route('jops.destroy', $jop->slug) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">@lang('main.Delete')</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
