@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="/css/profile.min.css">
    <link rel="stylesheet" href="/css/components.css">
@stop
@section('content')
    <div class="divider"></div>
    <a href="/logout" style="float: right; margin-right: 1em;" >
        <button type="button" class="btn btn-info" >
            <span class="glyphicon glyphicon-log-out"></span>Log out
        </button>
        </a>
    <div class="container" style="margin-bottom: 1em; margin-top: 5em; width: 75%;">
        @if(isset($teacher))
        <div class="row">
            <div class="col-md-4">
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
                            <div class="profile-usertitle-job">{{$teacher->didactic_level}}</div>
                            @endif
                            <div class="profile-usertitle-job">{{$teacher->cabinet}}</div>
                            <div class="profile-usertitle-job">{{$teacher->email}}</div>
                        </div>
                    </div>
                </div>

                </div>
            <div class="col-md-6">
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
                                        <div class="list-item-content">
                                            <h3 class="uppercase">
                                                <a href="javascript:;">{{$discipline_name->name}}</a>
                                            </h3>
                                        </div>
                                    </li>
                                        @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
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
