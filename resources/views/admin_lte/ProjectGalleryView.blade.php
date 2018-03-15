@extends('admin_lte.layout.app')
@section('Page Name','Galerie')
@section('Page desc','Pagina principala')
@section('styles')
    <link rel="stylesheet" href="/css/gallery.css">
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