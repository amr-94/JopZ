@extends('layouts.dashboard')
@section('title', 'Show Company')
@section('content')
    <div class="row row-cols-1 row-cols-md-12 g-4">
        <div class="col">
            <div class="card">
                <img src="{{ asset('files/company/' . $company->logo) }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">@lang('main.COMPANY NAME') : {{ $company->name }}</h5>
                    <p class="card-text">
                    <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">
                        @lang('main.COMPANY DESCRIPTION') :
                    </p>{{ $company->description }}</p>
                    <p class="card-text">
                    <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">@lang('main.COMPANY WEBSITE') :
                    </p>{{ $company->website }}</p>
                    <p class="card-text">
                    <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">@lang('main.COMPANY ADDRESS') :
                    </p>{{ $company->address }}</p>
                    <p class="card-text">
                    <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">@lang('main.COMPANY PHONE') :
                    </p>{{ $company->phone }}</p>
                    <p class="card-text">
                    <p class="fw-bold" style="color: rgb(134, 132, 132);font-weight: bold;">@lang('main.COMPANY EMAIL') :
                    </p>{{ $company->email }}</p>
                </div>
                <div class="card-footer">
                    <p class="card-text mb-5">{{ $company->created_at->diffForHumans() }}</p>
                    @if (Auth::user()->id == $company->user_id)
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('companies.edit', $company->slug) }}"
                                class="btn btn-primary">@lang('main.Edit')</a>
                            <form action="{{ route('companies.destroy', $company->slug) }}" method="post">
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

    {{-- Jop of company --}}
    <div class="row row-cols-1 row-cols-md-3 g-3">
        @foreach ($company->jops as $jop)
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
                        <div class="d-flex justify-content-between">
                            <p class="card-text mb-5">@lang('main.Created since') : {{ $jop->created_at->diffForHumans() }}</p>
                            <p class="card-text mb-5">@lang('main.Updated at') :{{ $jop->updated_at->diffForHumans() }}</p>
                        </div>
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
