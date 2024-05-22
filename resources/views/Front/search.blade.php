@extends('layouts.front_layout')
@section('content')
    <section id="job-Details">
        <div class="container background-color-full-white job-Details">
            @if ($jops->count() > 0)
                @foreach ($jops as $jop)
                    <div class="Exclusive-Product">
                        <h3><a href="{{ route('jop', $jop->slug) }}">{{ $jop->name }}</a></h3>
                        <a href="{{ route('send_form_informations', $jop->slug) }}" class="Apply-Now">Apply Now</a>
                        <h6 class="font-color-orange">Company : {{ $jop->company->name ?? 'no company' }}</h6>
                        <p class="font-color-orange">
                            category : {{ $jop->category->name ?? 'no category' }}
                        </p>

                        <h6 class="font-color-orange">Type : {{ $jop->type }}</h6>
                        <i class="material-icons">place</i>
                        <span class="text">Location : {{ $jop->company->address ?? 'no address' }}</span>
                        <h4 class="font-color-orange">Short description</h4>
                        <p>{{ $jop->description }}</p>
                        <p class="font-color-orange">Status : {{ $jop->status }}</p>
                    </div>
                    <img src="{{ asset('files/jops/' . $jop->image) }}" alt class="img-circle"
                        style="width: 50%; height: 50%;">
                @endforeach
            @else
                <div class="Exclusive-Product">
                    <p>No jops found</p>
                </div>
            @endif

        </div>


    </section>
@endsection
