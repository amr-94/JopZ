@extends('layouts.dashboard')
@section('title', 'Categories')
@section('content')
    @component('components.alert_component')
    @endcomponent
    <button class="btn btn-outline-dark mb-3"><a href="{{ route('categories.create') }}" style="color: rgb(170, 170, 170)">
            @lang('main.Add Category')</a></button>
    <button class="btn btn-outline-dark mb-3"><a href=" "
            style="color: rgb(170, 170, 170)">@lang('main.Trash')</a></button>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>@lang('main.image')</th>
                    <th>@lang('main.Name')</th>
                    <th>@lang('main.Description')</th>
                    <th>@lang('main.Parent')</th>
                    <th>@lang('main.# of Jops')</th>
                    <th>@lang('main.Created at')</th>
                    <th>@lang('main.Updated at')</th>
                    <th>@lang('main.Actions')</th>
                </tr>
            </thead>
            <tbody>
                @if (Auth::user()->categories)
                    @foreach (Auth::user()->categories as $category)
                        <tr>
                            <td>
                                <a href="{{ route('categories.show', $category->slug) }}">
                                    <img src="{{ asset('files/categories/' . $category->image) }}"
                                        alt="{{ $category->name }}" class="img-fluid" style="width: 100px">
                                </a>
                            </td>
                            <td><a href="{{ route('categories.show', $category->slug) }}"
                                    style="color: rgb(170, 170, 170)">{{ $category->name }}</a></td>
                            <td>
                                <p></p>{{ $category->description }}
                            </td>
                            <td>
                                <a href="{{ route('categories.show', $category->slug) }}" style="color: rgb(170, 170, 170)">
                                    {{ $category->parent->name ?? 'No Parent' }}</a>
                            </td>
                            <td>{{ count($category->jops) }}</td>
                            <td>{{ $category->created_at->diffforhumans() }}</td>
                            <td>{{ $category->updated_at->diffforhumans() }}</td>
                            <td>
                                @if (Auth::user()->id == $category->user_id)
                                    <button type="submit" class="btn btn-outline-success btn-sm">
                                        <a href="{{ route('categories.edit', $category->slug) }}"
                                            style="color: rgb(170, 170, 170)">@lang('main.Edit')</a></button>
                                @endif
                            </td>
                            <td>
                                @if (Auth::user()->id == $category->user_id)
                                    <form action="{{ route('categories.destroy', $category->slug) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn btn-outline-danger btn-sm">@lang('main.Delete')</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>@lang('main.no catrgory for you')</p>

                @endif

            </tbody>
        </table>
    </div>
    {{ $categories->links() }}

@endsection
