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
                <a href="#" class="font-color-orange margin-left"> Post
                    job</a>
            </div>
            <a href="#" class="Save">Save</a>
            <div class="vertical-space-60"></div>
            <div class="job-post-box">
                <form action="{{ route('create.post_job') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputJobtitle">Job title</label>
                        <input type="text" name="name" class="form-control" id="exampleInputJobtitle"
                            placeholder="Enter your job title" required />
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="company_id" class="form-label">Company</label>
                                <select class="form-select" aria-label="Default select example" name="company_id">
                                    <option selected value="">Select Company</option>
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
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" aria-label="Default select example" name="category_id">
                                    <option selected value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="type" class="form-label">Job Type</label>
                                <select class="form-select" aria-label="Default select example" name="type">
                                    <option selected value="">Select Type</option>
                                    <option value="full-time">Full Time</option>
                                    <option value="part-time">Part Time</option>
                                    <option value="remotly">Remotly</option>
                                    <option value="internship">Internship</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group ">
                                <label>Jop image</label>
                                <div class="box text-center">
                                    <input type="file" id="file-5" class="inputfile inputfile-4" name="jop_image"
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
                    <div class="form-group">
                        <label for="exampleInputShortDescription">Short
                            Description</label>
                        <textarea class="form-control small" id="exampleInputShortDescription" placeholder="Write short description"
                            name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tags" class="inline-block text-lg mb-2">
                            Tags (Comma Separated)
                        </label>
                        <input type="text" class="form-control" name="tags"
                            placeholder="Example: Laravel, Backend, Postgres, etc" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mybtn" id="Job-Nature">
                                <label>Job Nature</label>
                                <div class="form-check">
                                    <div class="col-lg-3 col-md-3">
                                        <input type="radio" class="Job-Nature" name="type" value="full-time">Full
                                        Time</input>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <input type="radio" class="Job-Nature" name="type" value="part-time">Part
                                        Time</input>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <input type="radio" class="Job-Nature" name="type" value="remotly">Remotly
                                        </input>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <input type="radio" class="Job-Nature" name="type"
                                            value="freelancer">Freelancer</input>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <input type="radio" class="Job-Nature" name="type"
                                            value="internship">Internship</input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mybtn" id="Job-Nature">
                                <label>Job Status</label>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <input type="radio" class="Job-Nature" name="status"
                                            value="active">Active</input>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <input type="radio" class="Job-Nature" name="status"
                                            value="inactive">Inactive</input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::check())
                        <button type="submit" class="btn Post-Job-Offer">Post
                            Job Offer</button>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-dark">Login To Post Jop</a>
                    @endif

                </form>
            </div>
        </div>
    </section>
@endsection
