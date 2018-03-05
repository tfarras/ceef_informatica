@extends('admin_lte.layout.app')
@section('Page Name','Ștergere')
@section('Page desc','Pagina principala')
@section('styles')

    <link rel="stylesheet" media="all" href="/css/style.css">
    <link rel="stylesheet" media="all" href="/css/effects.css">
    <link rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">

@stop
@section('content')
    @if (session()->has('error_message') )
        <div class="alert alert-danger alert-dismissable">{{ session()->get('error_message') }}</div>
    @endif

    @if (session()->has('message') )
        <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
    @endif
    <div class="row">
        <div class="col col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Profesori</h3>
            </div>
            <div class="box-body">
                <div class="form">
                    <form method="post" action="{{route('DeleteTeacher')}}">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Alegeți profesorul:</label>
                                <select id="teacher" name="id" class="form-control select2" title="teacher">
                                    <option></option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->first_name}} {{$teacher->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {{@csrf_field()}}
                                <button class="btn btn-success">Șterge</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class="col col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Evenimente</h3>
            </div>
            <div class="box-body">
                <div class="form">
                    <form method="post" action="{{route('DeleteEvent')}}">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Alegeți evenimentul:</label>
                                <select id="event" name="id" class="form-control select2" title="event">
                                    <option></option>
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {{@csrf_field()}}
                                <button class="btn btn-success">Șterge</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class="col col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Absolvenți</h3>
            </div>
            <div class="box-body">
                <div class="form">
                    <form method="post" action="{{route('DeleteAbsolvent')}}">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Alegeți absolventul:</label>
                                <select id="absolvent" name="id" class="form-control select2" title="absolvent">
                                    <option></option>
                                    @foreach($absolvents as $absolvent)
                                        <option value="{{$absolvent->id}}">{{$absolvent->first_name}} {{$absolvent->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {{@csrf_field()}}
                                <button class="btn btn-success">Șterge</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class="col col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Noutăți</h3>
            </div>
            <div class="box-body">
                <div class="form">
                    <form method="post" action="{{route('DeleteArticle')}}">
                        {{@csrf_field()}}
                        <div class="form-body">
                            <div class="form-group">
                                <label>Alegeți articol:</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#teacher').select2({
                placeholder:"Profesorul"
            });
            $('#event').select2({
                placeholder:"Evenimentul"
            });
            $('#absolvent').select2({
                placeholder:"Evenimentul"
            });
        });
    </script>
@stop