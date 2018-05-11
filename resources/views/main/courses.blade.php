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
    article{
        height: 20em;
    }
    </style>
@stop
@section('content')
    <div class="divider"></div>
    <div class="content">
        <div class="container" >
                <h1>Cursuri</h1>
                <section class="posts-con" style="margin: auto" style="width: 80%">
                    <div class="row" >
                    @foreach($courses as $course)
                        <article class="col-md-6" >
                            <div class="current-date">
                                <p>{{date('F',strtotime($course->created_at))}}</p>
                                <p class="date">{{date('d',strtotime($course->created_at))}}</p>
                            </div>
                            <div class="info">
                                <h3>{{$course->title}}</h3>
                                <p class="info-line"><span class="time">{{date('H:i',strtotime($course->created_at))}}</span></p>
                                <div class="short-desc">{{ strip_tags($course->description) }}</div>
                            </div>
                            <a class="btn-blue" style="position: absolute; bottom: 1em; left: 0;" href="{{route('courseShow',$course->id)}}">Deschide</a>
                        </article>
                    @endforeach
                    </div>
                    {{$courses->links()}}
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
