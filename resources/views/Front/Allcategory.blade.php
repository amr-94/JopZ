@extends('layouts.front_layout')
@section('content')
    <section id="Blog">
        <div class="vertical-space-100"> </div>
        <div class="vertical-space-101"> </div>
        <div class="container">
            <h3>{{ $category->name }} Categories</h3>
            <div class="vertical-space-20"></div>
            <p> Description : {{ $category->description }}</p>
            <div class="vertical-space-50"></div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <img src="{{ asset('files/categories/' . $category->image) }}" class="blog-image" alt="">
                    <div class="blog-box">
                        <a href="" class="font-color-black font-size">{{ $category->name }}</a>
                        <p class="float-left font-color-black width"><a href="#"
                                class="font-color-black font-size-14">Created since :
                                {{ $category->created_at->diffForHumans() }}</a></p>
                        <div class="vertical-space-20"></div>
                        <a href="#" class="font-color-orange font-bold">#{{ count($category->jops) }} jops in this
                            category
                            <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="vertical-space-25"></div>
            </div>
        </div>
        <div class="vertical-space-60"> </div>
    </section>

    <section id="v2-resent-job-post">
        <div class="vertical-space-85"></div>
        <div class="container text-center">
            <h3 class="text-center">Recent Job Post in This Catefgory</h3>
            <div class="vertical-space-30"></div>
            <p class="max-width">{{ $category->description }}</p>
            <div class="vertical-space-60"></div>
            @foreach ($category->jops as $jop)
                <div class="detail">
                    <div class="media display-inline text-align-center">
                        <img src="{{ asset('files/jops/' . $jop->image) }}" alt="{{ $jop->name }}" class="mr-3 "
                            style="width: 8%;height: 8%;">
                        <div class="media-body text-left  text-align-center">
                            <h6> <a href="{{ route('jop', $jop->slug) }}" class="font-color-black">{{ $jop->name }}</a>
                            </h6>
                            <i class="large material-icons">account_balance</i>
                            <span class="text">{{ $jop->company->name }}</span>
                            <br />
                            <span class="text font-size"></span>
                            <div class="float-right margin-top text-align-center">
                                <a href="{{ route('jop', $jop->slug) }}" class="part-full-time">{{ $jop->type }}</a>
                                <p class="date-time">Created Since: {{ $jop->created_at->diffForHumans() }}</p>
                                <p class="text">status: {{ $jop->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="job-list">

            </div>

        </div>
        <div class="vertical-space-60"></div>
    </section>
@endsection
