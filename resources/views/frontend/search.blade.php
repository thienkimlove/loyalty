@extends('frontend.layout')
@section('content')
    <section class="body pr">
        <div class="fixCen">
            <!--  start block-1 -->
            <div class="block-5 padding-bottom-200">
                <div class="block-title text-center">
                    <h2>{{strtoupper($keyword)}}</h2>
                </div>
                <ul class="list-post-07">
                    @foreach ($posts as $post)
                        <li>
                        <div class="block-new style03 style07">
                            <div class="image">
                                <img src="{{url($post->image)}}" alt="">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <a href="{{url($post->slug.'.html')}}" title="{{$post->name}}">
                                       {{$post->name}}
                                    </a>
                                </div>
                                <div class="info">
                                    <span class="user"> By {{$post->author}}</span>
                                    <span class="time"> Posted {{$post->created_at->format('l jS \\of F Y')}}</span>
                                    <span class="view">, {{$post->views}} views</span>
                                </div>
                                <div class="sumary">
                                   {{$post->desc}}
                                </div>
                                <div class="view-more"> <a href="{{url($post->slug.'.html')}}"> Chi tiết </a> </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>

                @include('frontend.pagination', ['paginate' => $posts])
            </div>

        </div>

    </section>
@endsection