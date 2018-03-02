@extends('admin_lte.layout.app')
@section('Page Name','Editare')
@section('Page desc','Pagina principala')
@section('styles')

    <link rel="stylesheet" media="all" href="/css/style.css">
    <link rel="stylesheet" media="all" href="/css/effects.css">
@stop
@section('content')
            <div class="col-md-12">
                @foreach($teachers as $teacher)
                    <a href="{{route('EditTeacherIndex',['id' => $teacher->id])}}">
                        <div class="ch-item1 ch-img effect" style="background-image: url('/images/teachers/{{$teacher->image}}')">
                            <div class="ch-info1">
                            </div>
                            <div class="caption">
                                <h4>{{$teacher->last_name}} {{$teacher->first_name}}</h4>
                            </div>
                        </div></a>
                @endforeach
            </div>

@stop

@section('scripts')
@stop