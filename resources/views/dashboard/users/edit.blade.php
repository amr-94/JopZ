@extends('layouts.dashboard')
@section('title', 'Edit User ')
@section('content')
    @component('components.errors_component')
    @endcomponent
    <div class="container">
        <form action="{{ route('users.update', Auth::user()->name) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                    value="{{ $user->name }}" placeholder="Full Name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="formGroupExampleInput"
                    value="{{ $user->email }}" placeholder="user@gmail.com">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">phone</label>
                <input type="text" name="phone" class="form-control" id="formGroupExampleInput"
                    value="{{ $user->phone }}" placeholder="01234567890">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="formGroupExampleInput"
                    value="{{ $user->address }}" placeholder="">
            </div>
            <div class="mb-3">
                <label for="jop_image" class="form-label">Image</label>
                <input class="form-control" type="file" id="user_image" name="user_image">
            </div>
            <div class="mb-3">
                <label for="jop_image" class="form-label">Attach</label>
                <input class="form-control" type="file" id="attach" name="user_attach[]" multiple>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit </button>
            </div>


        </form>
    </div>
@endsection
