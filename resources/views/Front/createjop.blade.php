@extends('layouts.front_layout')
@section('content')
    @component('components.errors_component')
    @endcomponent
    <section id="post_job">
        <div class="vertical-space-100"></div>
        <div class="vertical-space-101"></div>
        <div class="container">
            <div class="list-box">
                <a href="#" class="font-color-black margin-right">@lang('main.Job') </a> >
                <a href="#" class="font-color-orange margin-left"> @lang('main.Post job')</a>
            </div>
            <a href="#" class="Save">@lang('main.Save')</a>
            <div class="vertical-space-60"></div>
            <div class="job-post-box">
                <form action="{{ route('create.post_job') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputJobtitle">@lang('main.Job title')</label>
                        <input type="text" name="name" class="form-control" id="exampleInputJobtitle"
                            placeholder="Enter your job title" required />
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="company_id" class="form-label">@lang('main.Company')</label>
                                <select class="form-select" aria-label="Default select example" name="company_id">
                                    <option selected value="">@lang('main.Select Company')</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="category_id" class="form-label">@lang('main.Category')</label>
                                <select class="form-select" aria-label="Default select example" name="category_id">
                                    <option selected value="">@lang('main.Select Category')</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group ">
                                <label>@lang('main.Jop image')</label>
                                <div class="box text-center">
                                    <input type="file" id="file-5" class="inputfile inputfile-4" name="jop_image"
                                        data-multiple-caption="{count} files selected" />
                                    <label for="file-5">
                                        <i>
                                            <img src="{{ asset('imags/job-post.png') }}" class="imtges" alt>
                                        </i>
                                        <span>@lang('main.Drop your file here, or click to browse') <i class="font-color-orange"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputShortDescription">@lang('main.Short Description')</label>
                        <textarea class="form-control small" id="exampleInputShortDescription" placeholder="Write short description"
                            name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tags" class="inline-block text-lg mb-2">
                            @lang('main.Tags (Comma Separated)')
                        </label>
                        <input type="text" class="form-control" name="tags"
                            placeholder="Example: Laravel, Backend, Postgres, etc" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mybtn" id="Job-Nature">
                                <label>@lang('main.Job Nature')</label>
                                <div class="form-check">
                                    <div class="col-lg-6 col-md-3">
                                        <input type="radio" class="Job-Nature" name="type" value="full-time">
                                        @lang('main.Full Time')
                                    </div>
                                    <div class="col-lg-6 col-md-4">
                                        <input type="radio" class="Job-Nature" name="type"
                                            value="part-time">@lang('main.Part Time')
                                    </div>
                                    <div class="col-lg-6 col-md-3">
                                        <input type="radio" class="Job-Nature" name="type"
                                            value="remotly">@lang('main.Remotly')
                                    </div>
                                    <div class="col-lg-6 col-md-3">
                                        <input type="radio" class="Job-Nature" name="type"
                                            value="freelancer">@lang('main.Freelancer')
                                    </div>
                                    <div class="col-lg-6 col-md-3">
                                        <input type="radio" class="Job-Nature" name="type"
                                            value="internship">@lang('main.Internship')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mybtn" id="Job-Nature">
                                <label>@lang('main.Job Status')</label>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <input type="radio" class="Job-Nature" name="status"
                                            value="active">@lang('main.Active')</input>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <input type="radio" class="Job-Nature" name="status"
                                            value="inactive">@lang('main.Inactive')</input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::check())
                        <button type="submit" class="btn Post-Job-Offer">@lang('main.Post Job Offer')</button>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-dark">@lang('main.Login To Post Jop')</a>
                    @endif

                </form>
            </div>
        </div>
    </section>
@endsection
