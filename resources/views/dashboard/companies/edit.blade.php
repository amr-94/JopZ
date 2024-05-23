@extends('layouts.dashboard')
@section('title', 'Edit Company')
@section('content')
    @component('components.errors_component')
    @endcomponent
    <form action="{{ route('companies.update', $company->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">@lang('main.Name')</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}">
        </div>
        <div class="form-group">
            <label for="logo">@lang('main.Email')</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}">
        </div>
        <div class="form-group">
            <label for="logo">@lang('main.Description')</label>
            <textarea name="description" id="description" class="form-control">{{ $company->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="logo">@lang('main.Website')</label>
            <input type="text" name="website" id="website" class="form-control" value="{{ $company->website }}">
        </div>
        <div class="form-group">
            <label for="logo">@lang('main.Phone')</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $company->phone }}">
        </div>
        <div class="form-group">
            <label for="logo">@lang('main.Address')</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $company->address }}">
        </div>
        <div class="form-group">
            <label for="logo">@lang('main.Logo')</label>
            <input type="file" name="c_logo" id="c_logo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">@lang('main.Update')</button>
    </form>
@endsection
