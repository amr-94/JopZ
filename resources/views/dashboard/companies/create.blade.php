@extends('layouts.dashboard')
@section('title', 'Create Company')
@section('content')
    @component('components.errors_component')
    @endcomponent
    <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="logo">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="logo">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="logo">Website</label>
            <input type="text" name="website" id="website" class="form-control">
        </div>
        <div class="form-group">
            <label for="logo">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="logo">Address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" name="c_logo" id="c_logo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
