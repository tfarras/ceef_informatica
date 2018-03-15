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
    .short-desc img{
        display: none;
    }
    </style>
@stop
@section('content')
    <div class="divider"></div>
    <div class="content">
        <div class="container" >
                <h1>Evenimente</h1>
                <section class="posts-con" style="margin: auto" style="width: 80%">
                    <div class="row" >
                    @foreach($events as $event)
                        <article class="col-md-6" >
                            <div class="current-date">
                                <p>{{date('F',strtotime($event->date))}}</p>
                                <p class="date">{{date('d',strtotime($event->date))}}</p>
                            </div>
                            <div class="info">
                                <h3>{{$event->name}}</h3>
                                <p class="info-line"><span class="time">{{date('H:i',strtotime($event->date))}}</span></p>
                                <div class="short-desc">{!! $event->description !!}</div>
                                <a class="btn-blue"  href="{{route('eventShow',$event->id)}}">Deschide</a>
                            </div>
                        </article>
                    @endforeach
                    </div>
                    {{$events->links()}}
                </section>
            </div>
    </div>
@stop

@section('scripts')
    <script src="./js/layout.js" type="text/javascript"></script>
    <script>
        jQuery(".short-desc").each(function(){
            var review_full = jQuery(this).html();
            var review = review_full;

            if( review.length > 250 )
            {
                review = review.substring(0, 250);
                jQuery(this).html( review +'...');
            }
            jQuery(this).append('<div class="full_text" style="display: none;">' + review_full + '</div>');
        });
    </script>
@stop
