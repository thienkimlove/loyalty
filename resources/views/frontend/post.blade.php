@extends('frontend.layout')
@section('content')
    <section class="body pr">
        <div class="fixCen">
            <!--  start block-1 -->
            <div class="block-5 padding-bottom-200">
                <div class="breadcrumbs">
                    <ul>
                        <li> <a href="{{url('/')}}"> Home </a> </li>
                        <li> | </li>
                        <li> <a href="{{url($post->category->slug)}}"> {{$post->category->name}} </a>
                    </ul>
                </div>

                <div class="post-detail">
                    <div class="block-title">
                        <h2>{{$post->name}}</h2>
                    </div>
                    <div class="content">
                        {!! $post->content !!}
                    </div>

                    <div class="info">
                        <span class="user"> By {{$post->author}}</span>
                        <span class="time"> Posted {{$post->created_at->format('l jS \\of F Y')}}</span>
                    </div>


                    <div class="box-tags">
                        <span>Từ khóa: </span>
                        @foreach ($post->tags as $tag)
                            <a href="{{url('tu-khoa', $tag->slug)}}" title="">{{$tag->name}}</a>
                        @endforeach
                    </div>

                    <div class="social-bt">
                        <div class='fb-like' data-action='like' data-href='{{url($post->slug.'.html')}}' data-layout='button_count' data-share='true' data-show-faces='false' data-width='520'></div>
                        <g:plusone size="tall"></g:plusone>
                    </div>

                    <div class="comment-post">
                        <div class="tabs tabComment">
                            <a href="javascript:void(0)" class="fb-tab active" title="Bình luận Facebook" data-content=".fb-cmt-content">Bình luận facebook</a>
                            <a href="javascript:void(0)" class="default-tab" title="Bình luận" data-content=".default-comments">Bình luận</a>
                        </div>
                        <div class="fb-cmt-content cmtContent active">
                            <div class="title">Ý kiến của bạn</div>
                            <div class="fb-comments" data-href="{{url($post->slug.'.html')}}" data-numposts="2" data-width="450px, 100%"></div>
                        </div>
                        <div class="default-comments cmtContent">
                            <div class="title">Bình luận về bài viết</div>
                            <div class="content">
                                @foreach ($post->comments->where('status', 'ACCEPT') as $comment)
                                    <div class="old-cmt">
                                        <div class="name">{{$comment->name}} đã bình luận</div>
                                        <div class="date">{{$comment->created_at->toDateTimeString()}}</div>
                                        <div class="cmt-content">{{$comment->content}}</div>
                                        <a href="javascript:void(0)" class="your-answer-btn" title="Trả lời">Trả lời</a>
                                    </div>
                                @endforeach
                                <div class="new-cmt">
                                    <div class="title">Ý kiến của bạn</div>
                                    {!! Form::open(array('url' => 'saveComment', 'class' => 'cmt-form', 'id' => 'post_detail_comment_form')) !!}
                                    <input type="text" name="name" placeholder="Nhập tên của bạn">
                                    <input type="text" name="email" placeholder="Nhập email của bạn">
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <textarea name="content" id="" cols="30" rows="10" placeholder="Nhập nội dung"></textarea>
                                    <button id="post_detail_send_comment" class="send-cmt">Gửi bình luận</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="news-bt">
                        <div class="box-usual-ques">
                            <div class="custom-global-title">
                                <a href="#"> TIN LIÊN QUAN</a>
                            </div>
                            <div class="box-bd">
                                <ul class="list-post-07">
                                    @foreach ($post->related_posts as $rPost)
                                        <li>
                                        <div class="block-new style03">
                                            <div class="image">
                                                <img src="{{url($rPost->image)}}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="title">
                                                    <a href="{{url($rPost->slug.'.html')}}" title="{{$rPost->name}}">
                                                        {{$rPost->name}}
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <span class="user"> By {{$rPost->author}}</span>
                                                    <span class="time"> Posted {{$rPost->created_at->format('l jS \\of F Y')}}</span>
                                                    <span class="view">, {{$rPost->views}} views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>

                    </div>

                </div>


            </div>

        </div>

    </section>
@endsection