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
        .logo{
            max-width: 65%;
            margin:0 auto;
        }
    </style>

    <link rel="stylesheet" href="/css/gallery.css">
@stop
@section('content')
    <div class="divider"></div>
    <div class="content">
        <div class="container" >
                <h1>Proiecte studențiilor</h1>
                <section class="posts-con" style="margin: auto; min-height: 16.7em" style="width: 80%">
                    <div class="row" >
                        <!-- Portfolio Gallery Grid -->
                        <div class="row">
                            @foreach($projects as $project)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="hovereffect">
                                    <img class="img-responsive" src="/{{$project->logo}}" alt="">
                                    <div class="overlay">
                                        <a role="button" class="info" data-toggle="modal" data-target="#project_{{$project->id}}">Open</a>
                                    </div>
                                </div>
                                </div>
                                <div class="modal fade bs-example-modal-lg" tabindex="-1" id="project_{{$project->id}}" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content" style="padding: 1em">
                                            <div class="logo">
                                            <img class="img-responsive" src="/{{$project->logo}}" alt="">
                                            </div>
                                            <div class="info">

                                                <h3 align="center">Elaborat de {{$project->student}}</h3>
                                                {!! $project->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                            <!-- END GRID -->
                        </div>
                    </div>
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
