@extends('layouts.front_layout')
@section('content')
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
                            <br> <span class="font-size font-bold">#{{ $jop->forms->count() }} Forms has send</span>
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
                                @if (Auth::user()->id !== $jop->user->id)
                                    <a href="{{ route('form_informations', $jop->slug) }}" class="part-full-time">Send
                                        Information</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="job-list">
                <ul class="pagination justify-content-end margin-auto">
                    {{ $jops->links() }}
                </ul>
            </div>
        </div>
        <div class="vertical-space-60"></div>
    </section>
@endsection