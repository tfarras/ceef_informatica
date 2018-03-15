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
            <div class="main-content">
                <h2>{{$event->name}}</h2>
                <section class="posts-con">
                        <article>
                            <div class="current-date">
                                <p>{{date('F',strtotime($event->date))}}</p>
                                <p class="date">{{date('d',strtotime($event->date))}}</p>
                            </div>
                            <div class="info">
                                <h3>{{$event->name}}</h3>
                                <p class="info-line"><span class="time">{{date('H:i',strtotime($event->date))}}</span></p>
                                {!! $event->description !!}
                            </div>
                        </article>
                </section>
            </div>
            <aside id="sidebar">
                <div class="hovereffect">
                    <img class="img-responsive" src="/{{\App\EventImage::where('event_id',$event->id)->first()->path}}" alt="">
                    <div class="overlay">
                        <a role="button" class="info" data-toggle="modal" data-target="#open_image">Open</a>
                    </div>
                </div>
                <div class="modal fade bs-example-modal-lg" tabindex="-1" id="open_image" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <img class="img-responsive" src="/{{\App\EventImage::where('event_id',$event->id)->first()->path}}" alt="">
                        </div>
                    </div>
                </div>
            </aside>
            </div>
    </div>
@stop

@section('scripts')
    <script src="./js/layout.js" type="text/javascript"></script>

@stop
