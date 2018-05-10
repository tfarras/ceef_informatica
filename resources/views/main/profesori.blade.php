@extends('layouts.app')
@section('styles')
<style>
 .prof-name{
     font-size: 1.2em;
     font-weight: bold;
 }
    .margin{
        margin-bottom: 1.5em;
    }
</style>
@stop
@section('content')
    <div class="divider"></div>
    <div class="content">
        <div class="container">
            <h2>Lista Profesorilor</h2>
            <section>
                @foreach($teachers as $teacher)
                    <div class="col-md-3 margin" style="text-align: center">
                        <a target="_blank" href="{{route('teacher.show',$teacher->id)}}"><p class="prof-name">{{$teacher->first_name}} {{$teacher->last_name}}</p></a>
                        <p>{{$teacher->function}}</p>
                        @if($teacher->didactic_level)
                            <p>Gradul Didactic: {{$teacher->didactic_level}}</p>
                        @else
                            <p>Gradul Didactic: none</p>
                        @endif
                        <p>Cabinet: {{$teacher->cabinet}}</p>
                        <p>Email: {{$teacher->email}}</p>
                    </div>
                @endforeach
            </section>
        </div>
    </div>
@stop

@section('scripts')
@stop
