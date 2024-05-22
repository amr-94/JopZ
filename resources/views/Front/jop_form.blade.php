@extends('layouts.front_layout')
@section('content')
    @component('components.errors_component')
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
                <form action="{{ route('send_form_informations', $jop->slug) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputJobtitle">message</label>
                        <textarea type="text" name="message" class="form-control" id="exampleInputJobtitle" placeholder="Enter your message"
                            required>
                        </textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group ">
                                <label>Your CV</label>
                                <div class="box text-center">
                                    <input type="file" id="file-5" class="inputfile inputfile-4" name="user_cv"
                                        data-multiple-caption="{count} files selected" />
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
                    @php
                        foreach ($jop->forms as $forms) {
                            if (Auth::user()->id == $forms->user_id) {
                                $userform = $forms;
                            }
                        }
                    @endphp
                    @if (isset($userform) && Auth::user()->id == $userform->user_id)
                        <p>you have been submit in this jop</p>
                    @else
                        <button type="submit" class="btn Post-Job-Offer">Send Informations</button>
                    @endif
                </form>
            </div>
        </div>
    </section>
@endsection
