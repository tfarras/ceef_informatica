@extends('layouts.app')

@section('styles')
    <style>
        .text-news p img{
            display: none;
        }
        .event-name{
            color: #008bc3;
            font-size: 14px;
            line-height: 20px;
            font-weight: bold;
        }
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


    <div class="slider">
        <ul class="bxslider">
            <li>
                <div class="container" style=" text-align: center">
                        <img class="svgslide"  src="/images/slide_inf.svg">
                </div>
                <!-- / content -->
            </li>
        </ul>
        <div class="bg-bottom"></div>
    </div>

    <section class="posts">
        <div class="container" align="center" style="width: 100%; text-align: center;">
            <h2>Profesori</h2>
            <div class="col-lg-12 col-md-4 col-xs-6 ">
                @foreach($teachers as $teacher)
                    <a href="{{route('teacher.show',['id' => $teacher->id])}}">
                <div class="ch-item1 ch-img effect" style="background-image: url('/images/teachers/{{$teacher->image}}')">
                    <div class="ch-info1">
                    </div>
                    <div class="caption">
                        <h4>{{$teacher->last_name}} {{$teacher->first_name}}</h4>
                    </div>
                </div></a>
                @endforeach
            </div>
        </div>

        <!-- / container -->
    </section>
    <section class="news posts" style="padding: 57px 0 0 0; background: #2c4167 url(/images/bg_white_arrow.png) no-repeat 50% 0;">
        <div class="container" style="margin: 0px auto;">
            <h2></h2>
            <article>
                <div class="pic"><img width="121" src="images/2.png" alt=""></div>
                <div class="info">
                    <h3>Cele mai bune metode de predare</h3>
                    <p>"Orice educație este auto-educație, iar noi, ca dascăli și educatori, creăm de fapt doar contextul în care copilul se autoeducă. Trebuie să realizăm contextul optim, pentru ca, prin noi, copilul să se educe singur, așa cum trebuie să se educe el prin propriul său destin lăuntric".- Rudolf Steiner</p>

                    <a href="{{route('plansIndex')}}" class="btn">Vezi planuri de învățământ</a>
                </div>
            </article>
            <article>
                <div class="pic"><img width="121" src="images/3.png" alt=""></div>
                <div class="info">
                    <h3>Rezultate extraordinare a studenților</h3>
                    <p>Omul este un lucru imperfect ce tinde fără încetare la ceva mai bun și mai mare decât el însuși, menționa Descartes. Fiecare dintre noi prin încercarea de-a ne perfecționa, perfecționăm lumea în care trăim. Învățătura este cea care ne face să vedem lucrurile cu alți ochi. Perfecțiunea vine din învățătură. </p>
                    <a class="btn" href="{{route('absolventIndex')}}">Vezi absolvenții noștri</a>
                </div>
            </article>
<div></div>
        </div>

        <div class="bg-bottom" style="margin-top: 6em;"></div>
        <!-- / container -->
    </section>
@if(count($news)>0)
    <section class="news with-bg-bottom" style="  background: #2c4167 url(/images/bg_white_arrow.png) no-repeat 50% 0;">
        <div class="container" style="margin: 0px auto;">
            <h2 style="margin-top: 1em;">ultimele noutăți</h2>
            <article class="col-md-6" style="">
                <div class="pic"><img src="images/ico_information.png" alt=""></div>
                <div class="info" style="">
                    <h4>{{$news[0]->title}} </h4>
                    <p class="date">{{date('d M Y',strtotime($news[0]->created_at))}}</p>
                    <div class="text-news"> {!!$news[0]->description !!} </div>
                    <a class="more" href="{{route('articleShow',$news[0]->id)}}">Read more</a>
                </div>
            </article>
            <article class="col-md-6" style="">
                <div class="pic"><img src="images/ico_information.png" alt=""></div>
                <div class="info" style="">
                    <h4>{{$news[1]->title}} </h4>
                    <p class="date">{{date('d M Y',strtotime($news[1]->created_at))}}</p>
                    <div class="text-news"> {!!$news[1]->description !!} </div>
                    <a class="more" href="{{route('articleShow',$news[1]->id)}}">Read more</a>
                </div>
            </article>
            <div class="btn-holder" style="text-align: center;padding: 50px 0 0 0;clear: both;">
                <a class="btn"  href="{{route('articlesIndex')}}">Vezi mai multe</a>
            </div>
        </div>
        <!-- / container -->
    </section>
@endif
    @if(count($events)>0)
    <section class="events">
        <div class="container">
            <h2>Evenimente</h2>
           @foreach($events as $event)
                <article>
                    <div class="current-date">
                        <p>{{date('F',strtotime($event->date))}}</p>
                        <p class="date">{{date('d',strtotime($event->date))}}</p>
                    </div>
                    <div class="info">
                        <h4 class="event-name">{{$event->name}}</h4>
                        <div class="text-news-short"> {!!$event->description !!} </div>
                        <a class="more" href="{{route('eventShow',$event->id)}}">Citește mai departe</a>
                    </div>
                </article>
            @endforeach

                <div class="btn-holder" style="padding: 50px 0 0 0;clear: both; text-align: center">
                    <a class="btn-blue" href="{{route('eventsIndex')}}">Vezi mai multe</a>
                </div>
        </div>
        <!-- / container -->
    </section>
    @endif
    @stop

@section('scripts')
    <script>
        jQuery(".text-news").each(function(){
            var review_full = jQuery(this).html();
            var review = review_full;

            if( review.length > 500 )
            {
                review = review.substring(0, 500);
                jQuery(this).html( review +'...');
            }
            jQuery(this).append('<div class="full_text" style="display: none;">' + review_full + '</div>');
        });
        jQuery(".text-news-short").each(function(){
            var review_full = jQuery(this).html();
            var review = review_full;

            if( review.length > 100 )
            {
                review = review.substring(0, 100);
                jQuery(this).html( review +'...');
            }
            jQuery(this).append('<div class="full_text" style="display: none;">' + review_full + '</div>');
        });

    </script>
    @stop