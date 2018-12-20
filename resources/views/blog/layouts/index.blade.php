@extends('blog.layouts.master')

@section('page-header')
    <header class="masthead" style="background-image: url('{{ page_image($page_image) }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>{{ $title }}</h1>
                        <span class="subheading">{{ $subtitle }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {{-- 文章列表 --}}
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="{{ $post->url($tag) }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            @if ($post->subtitle)
                                <h3 class="post-subtitle">{{ $post->subtitle }}</h3>
                            @endif
                        </a>
                        <p class="post-meta">
                            Posted on {{ $post->published_at->format('Y-m-d') }}
                            @if ($post->tags->count())
                                in
                                {!! join(', ', $post->tagLinks()) !!}
                            @endif
                        </p>
                    </div>
                    <hr>
                @endforeach

                {{-- 分页 --}}
                <div class="clearfix">
                    {{-- Reverse direction --}}
                    @if ($reverse_direction)
                        @if ($posts->currentPage() > 1)
                            <a class="btn btn-primary float-left" href="{!! $posts->url($posts->currentPage() - 1) !!}">
                                &larr;
                                Previous {{ $tag->tag }} Posts
                            </a>
                        @endif
                        @if ($posts->hasMorePages())
                            <a class="btn btn-primary float-right" ref="{!! $posts->nextPageUrl() !!}">
                                Next {{ $tag->tag }} Posts
                                &rarr;
                            </a>
                        @endif
                    @else
                        @if ($posts->currentPage() > 1)
                            <a class="btn btn-primary float-left" href="{!! $posts->url($posts->currentPage() - 1) !!}">
                                &larr;
                                Newer {{ $tag ? $tag->tag : '' }} Posts
                            </a>
                        @endif
                        @if ($posts->hasMorePages())
                            <a class="btn btn-primary float-right" href="{!! $posts->nextPageUrl() !!}">
                                Older {{ $tag ? $tag->tag : '' }} Posts
                                &rarr;
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop