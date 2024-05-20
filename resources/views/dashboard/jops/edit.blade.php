@extends('layouts.dashboard')
@section('title', 'Create Jop')
@section('content')
    @component('components.errors_component')
    @endcomponent
    <div class="container">
        <form action="{{ route('jops.update', $jop->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="jop Name"
                    value="{{ $jop->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $jop->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="form-control" name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc" value="{{ $jop->tags }}" />
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected value="">Select Status</option>
                    <option value="active" {{ $jop->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $jop->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type of this jop</label>
                <select class="form-select" aria-label="Default select example" name="type">
                    <option selected value="">Select Type</option>
                    <option value="full-time" {{ $jop->type == 'full-time' ? 'selected' : '' }}>Full Time</option>
                    <option value="part-time" {{ $jop->type == 'part-time' ? 'selected' : '' }}>Part Time</option>
                    <option value="remotly" {{ $jop->type == 'remotly' ? 'selected' : '' }}>Remotly</option>
                    <option value="internship" {{ $jop->type == 'internship' ? 'selected' : '' }}>Internship</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    <option selected value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $jop->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="company_id" class="form-label">Company</label>
                <select class="form-select" aria-label="Default select example" name="company_id">
                    <option selected value="">Select Company</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $jop->company_id == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jop_image" class="form-label">Jop Image</label>
                <input class="form-control" type="file" id="jop_image" name="jop_image">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit </button>
            </div>


        </form>
    </div>

@endsection
