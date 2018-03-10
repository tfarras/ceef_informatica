@extends('admin_lte.layout.app')
@section('Page Name','Galerie')
@section('Page desc','Pagina principala')
@section('styles')
    <style>
        .hovereffect {
            width:100%;
            height:100%;
            float:left;
            overflow:hidden;
            position:relative;
            text-align:center;
            cursor:default;
        }

        .hovereffect .overlay {
            width:100%;
            height:100%;
            position:absolute;
            overflow:hidden;
            top:0;
            left:0;
            opacity:0;
            background-color: rgba(0,0,0,0.5) !important;
            -webkit-transition:all .4s ease-in-out;
            transition:all .4s ease-in-out
        }

        .hovereffect img {
            display:block;
            position:relative;
            -webkit-transition:all .4s linear;
            transition:all .4s linear;
        }

        .hovereffect h2 {
            text-transform:uppercase;
            color:#fff;
            text-align:center;
            position:relative;
            font-size:17px;
            background:rgba(0,0,0,0.6);
            -webkit-transform:translatey(-100px);
            -ms-transform:translatey(-100px);
            transform:translatey(-100px);
            -webkit-transition:all .2s ease-in-out;
            transition:all .2s ease-in-out;
            padding:10px;
        }

        .hovereffect a.info {
            text-decoration:none;
            display:inline-block;
            text-transform:uppercase;
            color:#fff;
            border:1px solid #fff;
            background-color:transparent;
            opacity:0;
            filter:alpha(opacity=0);
            -webkit-transition:all .2s ease-in-out;
            transition:all .2s ease-in-out;
            margin:50px 0 0;
            padding:7px 14px;
        }

        .hovereffect a.info:hover {
            box-shadow:0 0 5px #fff;
        }

        .hovereffect:hover img {
            -ms-transform:scale(1.2);
            -webkit-transform:scale(1.2);
            transform:scale(1.2);
        }

        .hovereffect:hover .overlay {
            opacity:1;
            filter:alpha(opacity=100);
        }

        .hovereffect:hover h2,.hovereffect:hover a.info {
            opacity:1;
            filter:alpha(opacity=100);
            -ms-transform:translatey(0);
            -webkit-transform:translatey(0);
            transform:translatey(0);
        }

        .hovereffect:hover a.info {
            -webkit-transition-delay:.2s;
            transition-delay:.2s;
        }

        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
@stop

@section('content')

    @if (session()->has('error_message') )
        <div class="alert alert-danger alert-dismissable">{{ session()->get('error_message') }}</div>
    @endif

    @if (session()->has('message') )
        <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
    @endif
    <div class="container">
    <div class="box">
        <div class="box-body">

            <div class="col-md-12 text-center">
                @foreach($images as $image)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="/{{$image->path}}" alt="">
                            <div class="overlay">
                                <a role="button" class="info" data-toggle="modal" data-target="#open_{{$image->id}}">Open</a>
                                <a role="button" class="info copy" data-clipboard-text="{{request()->root().'/'.$image->path}}">Copy link</a>
                                <form id="image_{{$image->id}}" method="post" action="{{route('deletePhoto')}}">
                                    <input type="hidden" value="{{$image->path}}" name="path">
                                    {{@csrf_field()}}
                                </form>
                                <a role="button" class="info copy" onclick="$('#image_{{$image->id}}').submit()">Delete</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@foreach($images as $image)
    <div class="modal fade bs-example-modal-lg" tabindex="-1" id="open_{{$image->id}}" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <img class="img-responsive" src="/{{$image->path}}" alt="">
            </div>
        </div>
    </div>
    @endforeach
@stop

@section('scripts')<script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
    <script>
        (function(){
            new Clipboard('.copy');
        })();
    </script>
@stop