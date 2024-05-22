@extends('layouts.dashboard')
@section('title', 'Edit Jop Form')
@section('content')
    @component('components.alert_component')
    @endcomponent
    <section id="post_job">
        <div class="vertical-space-100"></div>
        <div class="vertical-space-101"></div>
        <div class="container">
            <div class="list-box">
                <a href="#" class="font-color-black margin-right">Job </a> >
                <a href="#" class="font-color-orange margin-left"> send information </a>
            </div>
            <a href="#" class="Save">Save</a>
            <div class="vertical-space-60"></div>
            <div class="job-post-box">
                <form action="{{ route('update_form_sended', $form_sended->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputJobtitle">message</label>
                        <textarea type="text" name="message" class="form-control" id="exampleInputJobtitle" placeholder="Enter your message"
                            required> {{ $form_sended->message }}
                        </textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group ">
                                <label>Your CV</label>
                                <div class="box text-center">
                                    <input type="file" id="file-5" class="inputfile inputfile-4" name="user_cv" />
                                    <label for="file-5">
                                        <i>
                                            <img src="{{ asset('imags/job-post.png') }}" class="imtges" alt>
                                        </i>
                                        <span>Drop your file here, or <i class="font-color-orange">Browse</i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">update form Informations</button>
                </form>
            </div>
        </div>
    </section>
@endsection
