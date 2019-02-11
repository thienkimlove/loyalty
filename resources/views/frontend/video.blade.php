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
                    @foreach ($videos as $video)
                    <li>
                        <div class="block-new style03">
                            <div class="image">
                                {!! $video->code !!}
                            </div>
                            <div class="content">
                                <div class="title">
                                    <a href="{{url('video', $video->slug)}}" title="{{$video->name}}">
                                        {{$video->name}}
                                    </a>
                                </div>
                                <div class="info">
                                    <span class="user"> By {{$video->author}}</span>
                                    <span class="time"> Posted {{$video->created_at->format('l jS \\of F Y')}}</span>
                                    <span class="view">, {{$video->views}} views</span>
                                </div>
                                <div class="sumary">
                                    {{$video->seo_desc}}
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>

                @include('frontend.pagination', ['paginate' => $videos])
            </div>

        </div>

    </section>
@endsection