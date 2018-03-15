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
    }</style>
@stop
@section('content')
    <div class="divider"></div>
    <div class="content">
        <div class="container">
                <h2>{{$plan->name}}, {{$plan->year}}</h2>
                <section>
                    <embed src="/{{$plan->path_to_file}}" style="width: 100%; height: 60em" type='application/pdf'>
                </section>
        </div>
    </div>
@stop

@section('scripts')
    <script src="./js/layout.js" type="text/javascript"></script>
@stop
