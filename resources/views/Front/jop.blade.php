@extends('layouts.front_layout')
@section('content')
    <section id="intro">
        <div class="carousel-item active">
            <div class="carousel-background"><img src="{{ asset('imags/slider/slider1.jpg') }}" alt></div>
            <div class="carousel-container">
                <div class="carousel-content">
                    <h2 class="font-color-white">@lang('main.Job')</h2>
                    @if ($jop->category)
                        <p class="font-color-white width-100"><a href="{{ route('home') }}"
                                class="font-color-white">@lang('main.Home')
                                / </a><a href="{{ route('category', $jop->category->slug) }}" class="font-color-white">
                                {{ $jop->category->name }} </a>/ {{ $jop->name }}
                        </p>
                    @else
                        <p>@lang('main.no category for this jop')</p>
                    @endif

                </div>
            </div>
        </div>
    </section>

    <section id="job-Details">
        <div class="container background-color-full-white job-Details">
            <div class="Exclusive-Product">
                <h3>{{ $jop->name }}</h3>
                @if (Auth::check() && Auth::user()->id !== $jop->user->id)
                    <a href="{{ route('form_informations', $jop->slug) }}" class="Apply-Now">@lang('main.Send Information')</a>
                @endif
                @if ($jop->company)
                    <h6 class="font-color-orange">@lang('main.Company') : {{ $jop->company->name }}</h6>
                    <i class="material-icons">place</i>
                    <span class="text">@lang('main.Location') : {{ $jop->company->address }}</span>
                @else
                    <p>@lang('main.no company for this job')</p>
                @endif
                <h6 class="font-color-orange">@lang('main.Type') : {{ $jop->type }}</h6>
                <h4>@lang('main.Short Description')</h4>
                <p>@lang('main.Job Description') : {{ $jop->description }}</p>
                <p>@lang('main.Status') : {{ $jop->status }}</p>
            </div>
            <img src="imags/job-detail.jpg" alt class="job-detail-img">
            <div class="Job-Description">
                <h4>@lang('main.Job Description')</h4>
                <ul>
                    <li class="list-style">Et vestibulum ullamcorper curae
                        tellus consectetur erat pharetra et cubilia Nibh est
                        auctor lacus nam lacinia aptent</li>
                    <li class="list-style">
                        Vitae sociosqu a nisi cubilia vulputate aliquam
                        vulputate imperdiet tempor arcu fames</li>
                    <li class="list-style">
                        Odio habitasse senectus morbi dapibus mauris non
                        primis, nisl ante hendrerit consectetur nulla
                        phasellus eleifend, ad at scelerisque vulputate
                        habitant tempor</li>
                    <li class="list-style">
                        Dictum tortor praesent aliquam lectus est
                        vestibulum, viverra arcu fringilla lectus luctus
                        proin conubia, et porta pellentesque donec mollisEt
                        vestibulum ullamcorper curae tellus consectetur erat
                        pharetra et cubilia</li>
                    <li class="list-style">
                        Vitae sociosqu a nisi cubilia vulputate aliquam
                        vulputate imperdiet tempor arcu fames</li>
                    <li class="list-style">
                        Odio habitasse senectus morbi dapibus mauris non
                        primis, nisl ante hendrerit consectetur nulla
                        phasellus eleifend, ad at scelerisque vulputate
                        habitant tempor</li>
                    <li class="list-style">
                        Dictum tortor praesent aliquam lectus est
                        vestibulum, viverra arcu fringilla lectus luctus
                        proin conubia</li>
                </ul>
                <div class="vertical-space-20"></div>
                <h4>Experience & Requirement</h4>
                <p class="margin-bottom">Suspendisse augue pulvinar placerat
                    himenaeos odio nec turpis augue sem maecenas, faucibus
                    erat lacinia consectetur sapien suscipit vestibulum
                    venenatis himenaeos elit etiam lobortis luctus tempor
                    phasellus vitae aliquam aenean tincidunt suscipit
                    rhoncus mauris, lectus duis aenean fermentum aptent
                    laoreet habitant suspendisse donec malesuada lectus
                    quisque primis tristique donec mattis, per euismod
                    quisque urna proin ornare, convallis litora curae
                    dictumst.</p>
                <ul>
                    <li class="list-style">Et vestibulum ullamcorper curae
                        tellus consectetur erat pharetra et cubilia Nibh est
                        auctor lacus nam lacinia aptent</li>
                    <li class="list-style">
                        Et vestibulum ullamcorper curae tellus consectetur
                        erat pharetra et cubilia Nibh est auctor lacus nam
                        lacinia aptent</li>
                    <li class="list-style">
                        Vitae sociosqu a nisi cubilia vulputate aliquam
                        vulputate imperdiet tempor arcu fames</li>
                    <li class="list-style">
                        Odio habitasse senectus morbi dapibus mauris non
                        primis, nisl ante hendrerit consectetur nulla
                        phasellus eleifend, ad at scelerisque vulputate
                        habitant temmollis</li>
                </ul>
            </div>
        </div>
    </section>
    <section id="comment" class="background-color-full-white-light">
        <div class="container">
            <div class="max-width-80">
                <h4>@lang('main.Comments')</h4>
                @if (count($jop->comments) > 0)
                    @foreach ($jop->comments as $comment)
                        <div class="media border p-3">
                            <img src="{{ asset('files/profile/images/' . $comment->from_user->image) }}" alt="John Doe"
                                class="mr-3 rounded-circle imagess" style="width:60px;">
                            <div class="media-body">
                                <h6>{{ $comment->from_user->name }}</h6>
                                <p>{{ $comment->comment }}</p>
                                <a href="{{ asset('files/comment/' . $comment->file) }}">{{ $comment->file }}</a>
                            </div>
                            @if (Auth::check() && $comment->from_user_id == Auth::id())
                                <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger">@lang('main.Delete')</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                @else
                    <p>@lang('main.No comments Yet')</p>
                @endif
                <div class="media border p-3 padding-none border-none">
                    <img src="{{ asset('files/profile/images/' . $jop->user->image) }}" alt="John Doe"
                        class="mr-3 rounded-circle imagess" style="width:60px;">
                    <div class="media-body">
                        <form action="{{ route('comment.store', $jop->slug) }}" method="post">
                            @csrf
                            <input type="hidden" name="jop_id" value="{{ $jop->id }}">
                            @if (Auth::check())
                                <input type="hidden" name="from_user_id" value="{{ Auth::id() }}">
                            @endif
                            <input type="hidden" name="to_user_id" value="{{ $jop->user->id }}">
                            <input type="text" name="title" id="title" placeholder="Title" name="title">
                            <textarea name="comment" id="comment" placeholder="Type commeny" required name="comment"></textarea>
                            <input type="file" name="file" id="comment_file" placeholder="Title" name="title">

                            @if (Auth::check())
                                <button class="Post">@lang('main.Post')</button>
                            @else
                                <a href="{{ route('login') }}">@lang('main.Login to Comment')</a>
                            @endif

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
