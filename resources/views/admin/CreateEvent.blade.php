@extends('admin.layouts.app')
@section('styles')

    <link rel="stylesheet" href="/css/profile.min.css">
    <link rel="stylesheet" href="/css/components.css">
@stop
@section('content')
    @php
        $disciplines=\App\Discipline::all();
    @endphp
    <div class="divider"></div>
    <a href="/logout" style="float: right; margin-right: 1em;" >
        <button type="button" class="btn btn-info" >
            <span class="glyphicon glyphicon-log-out"></span>Log out
        </button>
    </a>
    <div class="container" style="margin-bottom: 1em; margin-top: 5em; text-align: center;">
        <form action="{{route('CreateEvent')}}" enctype="multipart/form-data" method="post" onsubmit="ValidateFiles();">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" placeholder="Title" required class="form-control" name="title">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Description of event" name="description"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="file" name="images[]" multiple accept="image">
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{@csrf_field()}}
                <input type="submit" class="btn btn-success" value="Add Event">
            </div>
        </form>
    </div>
@stop

@section('scripts')
    <script>

        function Validate() {
            checked = $("input[type=checkbox]:checked").length;

            if(!checked) {
                alert("You must check at least one checkbox.");
                return false;
            }

        };
    </script>
@stop
