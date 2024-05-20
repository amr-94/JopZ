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
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                    placeholder="Category Name" value="{{ $category->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected value="">Select Status</option>
                    <option value="active" {{ $category->status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $category->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="parent_id" class="form-label">Parent</label>
                <select class="form-select" aria-label="Default select example" name="parent_id">
                    <option selected value="">Select Parent</option>
                    @foreach ($categories as $categories_parent)
                        <option value="{{ $categories_parent->id }}"
                            {{ $category->parent_id == $categories_parent->id ? 'selected' : '' }}>
                            {{ $categories_parent->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="category_image" class="form-label">Category Image</label>
                <input class="form-control" type="file" id="category_image" name="category_image">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit </button>
            </div>


        </form>
    </div>

@endsection
