@extends('layouts.dashboard')
@section('title', 'Categories')
@section('content')
    @component('components.alert_component')
    @endcomponent
    <button class="btn btn-outline-dark mb-3"><a href="{{ route('categories.create') }}" style="color: rgb(170, 170, 170)">Add
            Category</a></button>
    <button class="btn btn-outline-dark mb-3"><a href=" " style="color: rgb(170, 170, 170)">Trash</a></button>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>image</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>parent_id</th>
                    <th>Status</th>
                    <th># of Jops</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Actions</th>
                </tr>
            </thead>


            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->slug) }}">
                                <img src="{{ asset('files/categories/' . $category->image) }}" alt="{{ $category->name }}"
                                    class="img-fluid" style="width: 100px">
                            </a>
                        </td>
                        <td><a href="{{ route('categories.show', $category->slug) }}"
                                style="color: rgb(170, 170, 170)">{{ $category->name }}</a></td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->slug) }}" style="color: rgb(170, 170, 170)">
                                {{ $category->parent->name ?? 'No Parent' }}</a>
                        </td>
                        <td>{{ $category->status }}</td>
                        <td>{{ count($category->jops) }}</td>
                        <td>{{ $category->created_at->diffforhumans() }}</td>
                        <td>{{ $category->updated_at->diffforhumans() }}</td>


                        <td>
                            <button type="submit" class="btn btn-outline-success btn-sm">
                                <a href="{{ route('categories.edit', $category->slug) }}"
                                    style="color: rgb(170, 170, 170)">Edit </a></button>

                        </td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->slug) }}" method="POST"
                                class="delete-form">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $categories->links() }}

@endsection
