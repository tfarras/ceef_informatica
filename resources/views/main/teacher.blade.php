@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="/css/profile.min.css">
    <link rel="stylesheet" href="/css/components.css">
    <style>
        pre {border: 0; background-color: transparent;}
    </style>
@stop
@section('content')
    <div class="divider"></div>
    <div class="container" style="margin-bottom: 1em; margin-top: 5em; width: 70%;">
        @if(isset($teacher))
            <div class="row">
                <div class="col-lg-4" >
                    <div class="profile-sidebar" style="background-color: white !important;">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="/images/teachers/{{$teacher->image}}" class="img-responsive" alt=""> </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle" style="margin-bottom: 5em;">
                                <div class="profile-usertitle-name">{{$teacher->first_name}} {{$teacher->last_name}}</div>
                                <div class="profile-usertitle-job">{{$teacher->function}}</div>
                                @if($teacher->didactic_level)
                                    <div class="profile-usertitle-job">Gradul Didactic: {{$teacher->didactic_level}}</div>
                                @endif
                                <div class="profile-usertitle-job">Cabinet: {{$teacher->cabinet}}</div>
                                <div class="profile-usertitle-job">Email: {{$teacher->email}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" >
                    <div class="portlet light portlet-fit" >
                        <div class="portlet-body">
                            <div class="mt-element-list">
                                <div class="mt-list-head list-simple ext-1 font-white bg-blue-sharp">
                                    <div class="list-head-title-container">
                                        <h3 class="list-title">Disciplinile predate</h3>
                                    </div>
                                </div>
                                <div class="mt-list-container list-simple ext-1">
                                    <ul>
                                        @foreach($disciplines as $discipline)
                                            @php
                                                $discipline_name=\App\Discipline::where('id',$discipline->discipline_id)->first();
                                            @endphp
                                            <li class="mt-list-item">
                                                    <h4 class="uppercase" style="font-size: 1em">
                                                        <a href="javascript:;">{{$discipline_name->name}}</a>
                                                    </h4>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="background-color:#ffffff ">
                            <thead>
                            <tr>
                                <th class="info" style="width: 1em;">№</th>
                                <th class="info">Luni</th>
                                <th class="info">Marți</th>
                                <th class="info">Miercuri</th>
                                <th class="info">Joi</th>
                                <th class="info">Vineri</th>
                            </tr>
                            </thead>
                            <tbody>

                                @for($i=0;$i<7;$i++)
                                    @php
                                    $nr=$i+1;
                                    $lesson='lesson_'.$nr;
                                    @endphp
                                <tr>
                                    <td class="info">{{$i+1}}</td>
                                    @foreach($shedule as $item)
                                        @if($item)
                                            <td><pre>{{$item->$lesson}}</pre></td>
                                        @else
                                            <td></td>
                                            @endif
                                    @endforeach
                                </tr>
                                @endfor

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg12">
                    <div class="alert alert-warning alert-dismissable" style="text-align: center;">No teacher selected.</div>
                </div>
            </div>
        @endif
    </div>
@stop

@section('scripts')
    <script src="./js/layout.js" type="text/javascript"></script>
@stop
