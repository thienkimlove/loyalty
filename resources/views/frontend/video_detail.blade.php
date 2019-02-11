@extends('frontend.layout')
@section('content')
    <section class="body pr">
        <div class="fixCen">
            <!--  start block-1 -->
            <div class="block-5 padding-bottom-200">
                <div class="block-title text-center">
                    <h2>GÓC MEDIA</h2>
                </div>

                <ul class="list-post-07">
                    <li class="main-video">
                        <div class="block-new style03">
                            <div class="image">

                                {!! $mainVideo->code !!}

                                <div class="content">
                                    <div class="title">
                                        <a href="{{url('video', $mainVideo->slug)}}" title="{{$mainVideo->name}}">
                                            {{$mainVideo->name}}
                                        </a>
                                    </div>

                                    <div class="sumary">
                                        {{$mainVideo->desc}}
                                    </div>
                                </div>
                            </div>

                            <div class="info">
                                <span class="user"> By {{$mainVideo->author}}</span>
                                <span class="time"> Posted {{$mainVideo->created_at->format('l jS \\of F Y')}}</span>
                                <span class="view">, {{$mainVideo->views}} views</span>
                            </div>
                        </div>
                    </li>

                    @foreach ($latestVideos as $latestVideo)

                    <li>
                        <ul class="video-detail-list">

                            <li>
                                <div class="block-new style03">
                                    <div class="content">
                                        <div class="title">
                                            <a href="{{url('video', $latestVideo->slug)}}" title="{{$latestVideo->name}}">
                                                {{$latestVideo->name}}
                                            </a>
                                        </div>
                                        <div class="info">
                                            <span class="user"> By {{$latestVideo->author}}</span>
                                            <span class="time"> Posted {{$latestVideo->created_at->format('l jS \\of F Y')}}</span>
                                            <span class="view">, {{$latestVideo->views}} views</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endforeach
                </ul>


            </div>

        </div>

    </section>
@endsection