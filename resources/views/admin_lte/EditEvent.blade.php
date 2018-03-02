@extends('admin_lte.layout.app')
@section('Page Name','Adaugare')
@section('Page desc','Eveniment')
@section('styles')
    <link rel="stylesheet" href="/admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="/admin_lte/dist/css/fileinput.min.css"  media="all" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/admin_lte/bower_components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

@stop
@section('content')
    @if ( session()->has('error_message') )
        <div class="alert alert-danger alert-dismissable">{{ session()->get('error_message') }}</div>
    @endif

    @if ( session()->has('message') )
        <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
    @endif

    <form id="CreateEventForm" action="{{route('CreateEvent')}}" enctype="multipart/form-data" method="post" onsubmit="CopyText();">
        <div class="box" style="padding: 1em;">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Denumire</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" placeholder="Title" class="form-control" name="title" value="{{$event->name}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data și timpul</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input id="datetime" type='text' class="form-control" readonly="readonly" name="datetime" value="{{$event->date}}" />
                                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Descriere evenimentului
                <small></small>
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
            <div class="form-group">
            <textarea class="textarea" id="text1" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
        </div>
    </div>

            <div class="box-header with-border">
                <h3 class="box-title">Imagine</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input id="input-b1" name="image" type="file" class="file"  accept="image/*">

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{@csrf_field()}}
                    <input type="submit" class="btn btn-success" value="Add Event">
                </div>
            </div>
        </div>
    </form>

    <!-- Passing data to JS -->
    <div id="dateEvent" data-date="{{$event->date}}"></div>
    <div id="htmlValue" style="display: none" >{{$event->description}}</div>
    @php
    $image=\App\EventImage::where('event_id',$event->id)->first();
    @endphp
    <div id="imageURL" data-url="{{request()->root().'/'.$image->path}}"></div>
@stop

@section('scripts')
    <script src="/admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/admin_lte/dist/js/jquery.validate.min.js"></script>
    <script src="/admin_lte/dist/js/fileinput.min.js"></script>
    <script src="/admin_lte/bower_components/moment/min/moment.min.js"></script>
    <script src="/admin_lte/bower_components/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <script>
        $('#text1').html($('#htmlValue').html());
        var editor = $('#text1').wysihtml5();

        $("#input-b1").fileinput({
            showUpload:false,
            allowedFileExtensions: ["jpg", "png", "gif", "jpeg"],
            initialPreview: [
                "<img src='"+$('#imageURL').data('url')+"' class=\"file-preview-image kv-preview-data rotate-1\" >"
            ]
        });
        $(document).ready(function(){
            $('#datetimepicker1').datetimepicker({
                ignoreReadonly: true,
                format:"DD/MM/YYYY H:mm"
            });
            //bootstrap WYSIHTML5 - text editor
            $('#datetimepicker1').data("DateTimePicker").date(new Date($('#dateEvent').data("date")));
            $.validator.setDefaults({
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                    if(element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            $("#CreateEventForm").validate({
                ignore: ":hidden:not(textarea)",
                rules: {
                    datetime:{
                        required: true
                    },
                    title: {
                        required:true
                    },
                    description: {
                        required: true
                    },
                    WysiHtmlField: "required"
                }
            });
        });

        function CopyText(){
           var content = editor.getValue();
           $(".textarea").html(content);
            $("#datetime").val($("#datetimepicker1").data("datetimepicker").getDate());

        }
    </script>
    <script>
        $(document).ready(function(){

        });
    </script>
@stop
