@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $p)
            <article class="post-item">
                @if ($p->featured_image_url)
                    <div class="post-item-image">
                        <a href="{{ route('posts.singlepost',$p->slug) }}">
                            <img src="{{ $p->featured_image_url }}" alt="{{ $p->title }}">
                        </a>
                    </div>
                @endif               
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2><a href="{{ route('posts.singlepost',$p->slug) }}">{{ $p->title }}</a></h2>
                            <p>{{ str_limit($p->body,300) }}</p>
                        </div>
    
                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="#"> {{ $p->author->name }}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> {{ $p->date }}</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('posts.singlepost',$p->slug) }}">Continue Reading &raquo;</a>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
           
            

            <nav>
              <ul class="pager">
                <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Newer</a></li>
                <li class="next"><a href="#">Older <span aria-hidden="true">&rarr;</span></a></li>
              </ul>
            </nav>
        </div>
        @include('layouts.sidebar')
    </div>
</div>
@endsection
  
