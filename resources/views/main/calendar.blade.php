@extends('layouts.app')
@section('styles')
@stop
@section('content')
    <div class="divider"></div>
    <div class="content">
        <div class="container" >
            <h2>Calendar academic</h2>
            <iframe src="https://calendar.google.com/calendar/embed?src=farrastaimoor%40gmail.com&ctz=Europe%2FChisinau" style="border: 0; width: 100%; height: 40em;" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>
@stop

@section('scripts')
    <script src="./js/layout.js" type="text/javascript"></script>
@stop
