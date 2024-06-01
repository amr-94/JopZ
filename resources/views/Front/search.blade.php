@extends('layouts.front_layout')
@section('content')
    <section id="job-Details">
        <div class="container background-color-full-white job-Details">
            @if ($jops->count() > 0)
                {{-- {{ dd($jops) }} --}}
                @foreach ($jops as $jop)
                    <div class="Exclusive-Product">
                        <h3><a href="{{ route('jop', $jop->slug) }}">{{ $jop->name }}</a></h3>
                        <a href="{{ route('form_informations', $jop->slug) }}" class="Apply-Now">@lang('main.Apply Now')</a>
                        <h6 class="font-color-orange">@lang('main.Company') : {{ $jop->company->name ?? 'no company' }}</h6>
                        <p class="font-color-orange">
                            @lang('main.Category') : {{ $jop->category->name ?? 'no category' }}
                        </p>

                        <h6 class="font-color-orange">@lang('main.Type') : {{ $jop->type }}</h6>
                        <i class="material-icons">place</i>
                        <span class="text">@lang('main.Location') : {{ $jop->company->address ?? 'no address' }}</span>
                        <h4 class="font-color-orange">@lang('main.Short Description')</h4>
                        <p>{{ $jop->description }}</p>
                        <p class="font-color-orange">@lang('main.Status') : {{ $jop->status }}</p>
                    </div>
                    <img src="{{ asset('files/jops/' . $jop->image) }}" alt class="img-circle"
                        style="width: 50%; height: 50%;">
                    @php
                        $tags = explode(',', $jop->tags);
                    @endphp
                    @foreach ($tags as $tag)
                        <a href="{{ route('tag', $tag) }}" class="badge bg-primary"
                            style="color: white">{{ $tag }}</a>
                    @endforeach
                    <hr width="100%" size="2" color="black" noshade>
                @endforeach
            @else
                <div class="Exclusive-Product">
                    <p>@lang('main.No jops found')</p>
                </div>
            @endif
            {{ $jops->links() }}

        </div>
    </section>
@endsection
