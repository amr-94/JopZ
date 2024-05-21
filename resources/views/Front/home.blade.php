@extends('layouts.front_layout')
@section('content')
    <section id="top-Job-Category">
        <div class="container">
            <h3 class="text-center">Choose Job Category</h3>
            <div class="vertical-space-30"></div>
            <p class="max-width">Lorem ipsum tempus amet conubia adipiscing fermentum viverra gravida, mollis
                suspendisse pretium dictumst inceptos mattis euismod
            </p>
            <div class="vertical-space-60"> </div>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-6 max-width-50">
                        <div class="box background-color-white-light">
                            <div class="circle">
                                <img class="img-circle elevation-2"
                                    src="{{ asset('files/categories/' . $category->image) }}" alt=""
                                    style="width: 100%;height: 100%;">

                            </div>
                            <h6 class="font-color-black">{{ $category->name }}</h6>
                            <a href="{{ route('category', $category->slug) }}" class="button job_post"
                                data-hover="View Jobs" data-active="I'M ACTIVE"><span>{{ count($category->jops) }}
                                    Job Posts </span></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="vertical-space-40"></div>
            <a href="" class="Brows-All-Category">Brows All Category</a>
        </div>
        <div class="vertical-space-85"></div>
    </section>


    <section id="v2-Jobtend">
        <div class="container">
            <div class="vertical-space-100"></div>
            <div class="row">
                <div class="col-lg-9 col-md-12 ">
                    <h3 class="title-jobted title font-color-white">Why Choose Jobtend</h3>
                    <div class="vertical-space-20"></div>
                    <p class="max-width font-color-white">Tristique velit phasellus sed auctor leo eros luctus nibh
                        fermentum, ad imperdiet rhoncus dolorhabitant purus velit aliquet donecurna ut in turpis
                    </p>
                    <div class="vertical-space-40"></div>
                    <ul class="max-width font-color-white">
                        <li class="list-item1 ">Tristique velit phasellus sed auctor leo eros luctus nibh fermentum, ad
                            imperdiet rhoncus dolorhabitant purus velit aliquet donecurna ut in turpis
                        </li>
                        <li class="list-item1 ">Rivastic stique velit phasellus sed auctor leo eros luctus nibh
                            fermentum, ad imperdiet rhoncus dolorhabitant purus </li>
                        <li class="list-item1 ">Lovistiq pue velit phasellus sed auctor leo eros luctus nibh fermentum,
                            ad imperdiet rhoncus dolorhabitant purus velit aliquet dolorhabitant purus velit aliquet
                            donecurna ut in turpis donecurna ut in turpis</li>
                        <li class="list-item1 ">Tristique velit phasellus sed auctor leo eros luctus nibh fermentum, ad
                            imperdiet rhoncus dolorhabitant purus velit aliquet donecurna ut in turpis</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 align-self-center">
                    <a href="#" data-toggle="modal" data-target="#myModal" class="display-flex">
                        <span class="fa fa-play-circle font-color-white font-size-48"></span>
                        <h4 class="font-color-white title align-self-center">Watch Video</h4>
                    </a>
                </div>
                <div class="vertical-space-80"></div>
            </div>
        </div>
    </section>


    <section id="v2-resent-job-post">
        <div class="vertical-space-85"></div>
        <div class="container text-center">
            <h3 class="text-center">Recent Job Post</h3>
            <div class="vertical-space-30"></div>
            <p class="max-width">Lorem ipsum tempus amet conubia adipiscing fermentum viverra gravida, mollis
                suspendisse pretium dictumst inceptos mattis euismod
            </p>
            <div class="vertical-space-60"></div>
            @foreach ($jops as $jop)
                <div class="detail">
                    <div class="media display-inline text-align-center">
                        <img src="{{ asset('files/jops/' . $jop->image) }}" alt="{{ $jop->name }}" class="mr-3 "
                            style="width: 8%;height: 8%;">
                        <div class="media-body text-left  text-align-center">
                            <h6> <a href="{{ route('jop', $jop->slug) }}" class="font-color-black">{{ $jop->name }}</a>
                            </h6>
                            <i class="large material-icons">account_balance</i>
                            @if ($jop->company)
                                <span class="text">
                                    <a
                                        href="{{ route('company', $jop->company->slug) }}">{{ $jop->company->name }}</a></span>
                                <br />
                            @else
                                No Company
                            @endif

                            <br> <span class="font-size font-bold">#{{ $jop->comments->count() }} Comments</span>
                            <br><span class="text font-size">Status : {{ $jop->status }} </span>
                            <p class="date-time">Created Since: {{ $jop->created_at->diffForHumans() }}</p>
                            @php
                                $tags = explode(',', $jop->tags);
                            @endphp
                            @foreach ($tags as $tag)
                                <span class="badge bg-primary" style="color: white">{{ $tag }}</span>
                            @endforeach
                            <div class="float-right margin-top text-align-center">

                                <a href="{{ route('jop', $jop->slug) }}" class="part-full-time">{{ $jop->type }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="job-list">
                <ul class="pagination justify-content-end margin-auto">
                    {{-- <li class="page-item"><a class="page-link pdding-none" href="javascript:void(0);"><i
                                class=" material-icons keyboard_arrow_left_right">keyboard_arrow_left</i></a></li>
                    <li class="page-item"><a class="page-link active" href="javascript:void(0);">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                    <li class="page-item">
                        <a class="page-link pdding-none" href="javascript:void(0);"> <i
                                class=" material-icons keyboard_arrow_left_right">keyboard_arrow_right</i></a>
                    </li> --}}
                    {{ $jops->links() }}
                </ul>
            </div>

        </div>
        <div class="vertical-space-60"></div>
    </section>


    <section id="v2-Featuread-Company" class="background-color-white">
        <div class="vertical-space-85"></div>
        <div class="container text-center">
            <h3 class="text-center">Featuread Company</h3>
            <div class="vertical-space-30"></div>
            <p class="max-width">Lorem ipsum tempus amet conubia adipiscing fermentum viverra gravida, mollis
                suspendisse pretium dictumst inceptos mattis euismod
            </p>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="owl-carousel Featuread-Company-carousel">
                        @foreach ($companies as $company)
                            <a href="{{ route('company', $company->slug) }}" class="Featuread-Company-item">
                                <div class="media text-align-center  media1">
                                    <img src="{{ asset('files/company/' . $company->logo) }}"
                                        style="width: 90%;height: 50%;" alt="{{ $company->name }}"
                                        class=" Featuread-Company-img margin-auto">
                                    <div class="media-body text-left text-align-center ">
                                        <h6>{{ $company->name }}</h6>
                                        <i class="material-icons">account_balance</i>
                                        <span class="text">{{ $company->name }}</span>
                                        <br />
                                        <i class=" material-icons">place</i>
                                        <span class="text font-size">{{ $company->address }}</span>
                                        <br />
                                        <i class=" material-icons">person</i>
                                        <span class="text font-size font-color-orange">{{ count($company->jops) }}
                                            Jops</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="vertical-space-85"></div>
        </div>
    </section>

    {{-- <section id="Trusted-by-Experts">
        <div class="vertical-space-85"></div>
        <div class="container">
            <h3 class="text-center">Trusted by Experts</h3>
            <div class="vertical-space-30"></div>
            <p class="max-width">Lorem ipsum tempus amet conubia adipiscing fermentum viverra gravida, mollis
                suspendisse pretium dictumst inceptos mattis euismod
            </p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="owl-carousel Trusted-by-Experts-carousel">
                    <div class="Trusted-by-Experts-item">
                        <div class="testimonial">
                            <div class="pic">
                                <img src="{{ asset('imags/Clients-Testimonial1.jpg') }}" alt="">
                            </div>
                            <h4 class="title">Farhana Istifa</h4>
                            <blockquote>
                                <p>
                                    Ye on properly handsome returned throwing am no whatever. In without wishing he of
                                    pictureno exposed talking minutes. Curiosity continual belonging offending so
                                    explained it exquisite. Do remember to followed yourself material mr recurred
                                    carriage.
                                </p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="Trusted-by-Experts-item">
                        <div class="testimonial">
                            <div class="pic">
                                <img src="{{ asset('imags/Clients-Testimonial2.jpg') }}" alt="">
                            </div>
                            <h4 class="title">Farhana Islam</h4>
                            <blockquote>
                                <p>
                                    Ye on properly handsome returned throwing am no whatever. In without wishing he of
                                    pictureno exposed talking minutes. Curiosity continual belonging offending so
                                    explained it exquisite. Do remember to followed yourself material mr recurred
                                    carriage.
                                </p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="Trusted-by-Experts-item">
                        <div class="testimonial">
                            <div class="pic">
                                <img src="{{ asset('imags/Clients-Testimonial3.jpg') }}" alt="">
                            </div>
                            <h4 class="title">Farhana Istifa</h4>
                            <blockquote>
                                <p>
                                    Ye on properly handsome returned throwing am no whatever. In without wishing he of
                                    pictureno exposed talking minutes. Curiosity continual belonging offending so
                                    explained it exquisite. Do remember to followed yourself material mr recurred
                                    carriage.
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vertical-space-85"></div>
        </div>
    </section> --}}
@endsection
