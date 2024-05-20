@extends('layouts.dashboard')
@section('title', 'Create Categories')
@section('content')
    @component('components.errors_component')
    @endcomponent
    <div class="container">
        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                    placeholder="Category Name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="parent_id" class="form-label">Parent</label>
                <select class="form-select" aria-label="Default select example" name="parent_id">
                    <option selected value="">Select Parent</option>
                    @if ($categories)
                        @foreach ($categories as $categories)
                            <option value="{{ $categories->parent_id }}">{{ $categories->name }}</option>
                        @endforeach
                    @endif

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
