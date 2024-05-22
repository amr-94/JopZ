@extends('layouts.dashboard')
@section('title', 'Jop Form')
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
                    <th>Message</th>
                    <th>CV</th>
                    <th>To jop</th>
                    <th>user of this jop</th>
                    <th>Send_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (Auth::user()->forms)
                    @foreach (Auth::user()->forms as $form)
                        <tr>
                            <td>
                                <a href="" style="color: rgb(170, 170, 170)">{{ $form->message }}</a>
                            </td>
                            <td><a href="{{ asset("files/forms/$form->cv") }}"
                                    style="color: rgb(170, 170, 170)">{{ $form->cv }}</a></td>
                            <td>
                                <a href="{{ route('jops.show', $form->jop->slug) }}"
                                    style="color: rgb(170, 170, 170)">{{ $form->jop->name }}</a>
                            </td>
                            <td>
                                <a href="{{ route('users.show', $form->jop->user->id) }}"
                                    style="color: rgb(170, 170, 170)">{{ $form->jop->user->name }}</a>
                            </td>
                            <td>{{ $form->created_at->diffforhumans() }}</td>
                            <td>
                                @if (Auth::user()->id == $form->user_id)
                                    <button type="submit" class="btn btn-outline-success btn-sm">
                                        <a href="{{ route('edit_form_sended', $form->id) }}"
                                            style="color: rgb(170, 170, 170)">Edit </a></button>
                                @endif
                            </td>
                            <td>
                                @if (Auth::user()->id == $form->user_id)
                                    <form action="{{ route('destroy_form_sended', $form->id) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p> no catrgory for you </p>

                @endif

            </tbody>
        </table>
    </div>

@endsection
