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
            <div class="main-content">
                <h1>Planuri de învățământ</h1>
                <section class="posts-con">
                    @foreach($plans as $plan)
                    <article>
                        <div class="current-date">
                            <p>{{date('F',strtotime($plan->created_at))}}</p>
                            <p class="date">{{date('d',strtotime($plan->created_at))}}</p>
                        </div>
                        <div class="info">
                            <h3>{{$plan->name}}, {{$plan->year}}</h3>
                                <a class="btn-blue"  href="{{route('planShow',$plan->id)}}">Deschide</a>
                        </div>
                    </article>
                    @endforeach
                        {{ $plans->links() }}
                </section>
            </div>
            <aside id="sidebar">

            </aside>
        </div>
    </div>
@stop

@section('scripts')
    <script src="./js/layout.js" type="text/javascript"></script>
@stop
