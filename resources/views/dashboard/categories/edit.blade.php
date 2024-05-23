@extends('layouts.dashboard')
@section('title', 'Edit ' . $category->name . ' Category')
@section('content')
    @component('components.errors_component')
    @endcomponent
    <div class="container">
        <form action="{{ route('categories.update', $category->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">@lang('main.Name')</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                    placeholder="Category Name" value="{{ $category->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">@lang('main.Description')</label>
                <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">@lang('main.Status')</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected value="">@lang('main.Select Status')</option>
                    <option value="active" {{ $category->status === 'active' ? 'selected' : '' }}>@lang('main.Active')</option>
                    <option value="inactive" {{ $category->status === 'inactive' ? 'selected' : '' }}>@lang('main.Inactive')
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="parent_id" class="form-label">@lang('main.Parent')</label>
                <select class="form-select" aria-label="Default select example" name="parent_id">
                    <option selected value="">@lang('main.Select Parent')</option>
                    @foreach ($categories as $categories_parent)
                        <option value="{{ $categories_parent->id }}"
                            {{ $category->parent_id == $categories_parent->id ? 'selected' : '' }}>
                            {{ $categories_parent->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="category_image" class="form-label">@lang('main.Category Image')</label>
                <input class="form-control" type="file" id="category_image" name="category_image">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">@lang('main.Submit')</button>
            </div>


        </form>
    </div>

@endsection
