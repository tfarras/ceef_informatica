@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="/css/gallery.css">
    <style>
    .btn{
    color: #7d8797;
    border-radius: 4px;
    background: #fff;
    font-size: 16px;
    height: 46px;
    line-height: 46px;
    display: inline-block;
    padding: 0 21px;
    border: none;
    }
    .btn-blue{
    color: #fff !important;
    border-radius: 4px;
    background: #008bc4;
    font-size: 16px;
    height: 46px;
    line-height: 46px;
    display: inline-block;
    padding: 0 21px;
    border: none;
    }
    </style>
@stop
@section('content')
    <div class="divider"></div>
    <div class="content">
        <div class="container" >
            <aside id="sidebar">
                <img class="img-responsive" src="/images/news.svg">
            </aside>
            <div class="main-content">
                <h2>{{$article->title}}</h2>
                <section class="posts-con">
                        <article>
                            <div class="current-date">
                                <p>{{date('F',strtotime($article->created_at))}}</p>
                                <p class="date">{{date('d',strtotime($article->created_at))}}</p>
                            </div>
                            <div class="info">
                                <h3>{{$article->title}}</h3>
                                <p class="info-line"><span class="time">{{date('H:i',strtotime($article->created_at))}}</span></p>
                                {!! $article->description !!}
                            </div>
                        </article>
                </section>
            </div>

            </div>
    </div>
@stop

@section('scripts')
    <script src="./js/layout.js" type="text/javascript"></script>

@stop
