@extends('layouts.app')
@section('styles')
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
                <img class="img-responsive" src="/images/course.svg">
            </aside>
            <div class="main-content">
                <h2>{{$course->title}}</h2>
                <section class="posts-con">
                        <article>
                            <div class="current-date">
                                <p>{{date('F',strtotime($course->created_at))}}</p>
                                <p class="date">{{date('d',strtotime($course->created_at))}}</p>
                            </div>
                            <div class="info">
                                <h3>{{$course->title}}</h3>
                                <p class="info-line"><span class="time">{{date('H:i',strtotime($course->created_at))}}</span></p>
                                {!! $course->description !!}
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
