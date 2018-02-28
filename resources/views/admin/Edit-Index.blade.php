@extends('admin.layouts.app')

@section('styles')
@stop
@section('content')
    <div class="divider"></div>
    <section class="posts">
        <div class="container" align="center" style="width: 100%">
            <div class="col-lg-12 col-md-4 col-xs-6 ">
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
        </div>

        <!-- / container -->
    </section>

@stop

@section('scripts')
@stop