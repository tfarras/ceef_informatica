@extends('admin_lte.layout.app')
@section('Page Name','Dashboard')
@section('Page desc','Control Panel')
@section('styles')

@stop
@section('content')
    @if ( session()->has('error_message') )
        <div class="alert alert-danger alert-dismissable">{{ session()->get('error_message') }}</div>
    @endif

    @if ( session()->has('message') )
        <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
    @endif
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-newspaper-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Articole</span>
                    <span class="info-box-number">{{$articlesCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-calendar-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Evenimente</span>
                    <span class="info-box-number">{{$eventCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-keyboard-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Cursuri</span>
                    <span class="info-box-number">{{$courseCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-file-pdf-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Planuri de învățământ</span>
                    <span class="info-box-number">{{$planCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-user-secret"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Profesori</span>
                    <span class="info-box-number">{{$teachersCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Absolvenți</span>
                    <span class="info-box-number">{{$absolventsCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-list-ul"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Discipline</span>
                    <span class="info-box-number">{{$disciplinesCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-image"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Imagini pentru administrare</span>
                    <span class="info-box-number">{{$imagesAdmin}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-certificate"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Lucrări de diplomă</span>
                    <span class="info-box-number">{{$projectsCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Poze (Lucrări de diplomă)</span>
                    <span class="info-box-number">{{$imagesProjects}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
@stop

@section('scripts')

@stop
