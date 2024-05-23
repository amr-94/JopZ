@extends('layouts.front_layout')
@section('content')
    <section id="Blog">
        <div class="vertical-space-100"> </div>
        <div class="vertical-space-101"> </div>
        <div class="container">
            <h3>
                <p class="font-color-orange font-bold">@lang('main.Company name') :</p> {{ $company->name }}
            </h3>
            <div class="vertical-space-20"></div>
            <p>
            <p class="font-color-orange font-bold">@lang('main.Company description') :</p>{{ $company->description }}</p>
            <div class="vertical-space-50"></div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <img src="{{ asset('files/company/' . $company->logo) }}" class="blog-image" alt="">
                    <div class="blog-box">
                        <a href="" class="font-color-black font-size">
                            <p class="font-color-orange font-bold">@lang('main.Company name') :</p>{{ $company->name }}
                        </a>
                        <br> <i class=" material-icons">place</i>
                        <span class="text font-size">@lang('main.Company address') : {{ $company->address }}</span>
                        <p class="float-left font-color-black width">
                        <p class="font-color-orange font-bold">@lang('main.Company email') :</p>
                        <a class="font-bold font-color-black" href="mailto:{{ $company->email }}">
                            {{ $company->email }} </a>
                        </p>
                        <p class="float-left font-color-black width">
                        <p class="font-color-orange font-bold">@lang('main.Company phone') :
                            <br> <a class="font-bold font-color-black" href="tel:{{ $company->phone }}">
                                {{ $company->phone }} </a>
                        </p>
                        <div class="vertical-space-20"></div>
                        <a href="#" class="font-color-orange font-bold"># <a class="font-bold font-color-black">
                                {{ count($company->jops) }}</a> @lang('main.jops in this Company')
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
            <h3 class="text-center">@lang('main.Recent Job Post in This Company')</h3>
            <div class="vertical-space-30"></div>
            <p class="max-width">{{ $company->description }}</p>
            <div class="vertical-space-60"></div>
            @foreach ($company->jops as $jop)
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
                                @if (Auth::user()->id !== $jop->user->id)
                                    <a href="{{ route('form_informations', $jop->slug) }}" class="part-full-time">
                                        @lang('main.Send Information')
                                    </a>
                                @endif
                                <p class="date-time">@lang('main.Created Since') : {{ $jop->created_at->diffForHumans() }}</p>
                                <p class="text">@lang('main.status') : {{ $jop->status }}</p>
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
