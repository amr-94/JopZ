@extends('layouts.dashboard')
@section('title', 'Trashed Jops')
@section('content')
    @component('components.alert_component')
    @endcomponent
    <button class="btn btn-outline-dark mb-3"><a href="{{ route('jops.create') }}" style="color: rgb(170, 170, 170)">Add
            Jop</a></button>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Company</th>
                    <th>Created_at</th>
                    <th>Deleted_at</th>
                    <th>Actions</th>
                </tr>
            </thead>


            <tbody>
                @foreach ($jops as $jop)
                    <tr>
                        <td>{{ $jop->id }}</td>
                        <td>
                            <a href="{{ route('jops.show', $jop->slug) }}">
                                <img src="{{ asset('files/jops/' . $jop->image) }}" alt="{{ $jop->name }}" class="img-fluid"
                                    style="width: 100px">
                            </a>
                        </td>
                        <td>{{ $jop->name }}</td>
                        <td>
                            <a href="{{ route('categories.show', $jop->category->slug) }}"
                                style="color: rgb(170, 170, 170)">
                                {{ $jop->category->name }}</a>
                        </td>
                        <td>{{ $jop->status }}</td>
                        <td>{{ $jop->company->name }}</td>
                        <td>{{ $jop->created_at->diffforhumans() }}</td>
                        <td>{{ $jop->deleted_at->diffforhumans() }}</td>


                        <td>
                            <form action="{{ route('jops.restore', $jop->slug) }}" method="POST">
                                @csrf
                                @method('post')
                                <button type="submit" class="btn btn-outline-success btn-sm">
                                    Restore
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('jops.force.destroy', $jop->slug) }}" method="POST"
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
    {{ $jops->links() }}

@endsection
