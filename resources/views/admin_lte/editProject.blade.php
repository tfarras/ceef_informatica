@extends('admin_lte.layout.app')
@section('Page Name','Editare')
@section('Page desc','Lucrare de diplomă')
@section('styles')
    <link rel="stylesheet" href="/admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="/admin_lte/dist/css/fileinput.min.css"  media="all" rel="stylesheet" type="text/css">

@stop
@section('content')
    @if ( session()->has('error_message') )
        <div class="alert alert-danger alert-dismissable">{{ session()->get('error_message') }}</div>
    @endif

    @if ( session()->has('message') )
        <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
    @endif

    <form id="CreateEventForm" action="{{route('projectSave')}}" enctype="multipart/form-data" method="post" onsubmit="CopyText();">
        <div class="box" style="padding: 1em;">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Denumire</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" placeholder="Title" class="form-control" name="title" value="{{$project->name}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">A elaborat: </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" placeholder="Elev, grupa" class="form-control" name="student" value="{{$project->student}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Descriere lucrării
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
                        <textarea class="textarea" id="text1" name="description" placeholder="Place some text here"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>
            </div>

            <div class="box-header with-border">
                <h3 class="box-title">Logo</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input id="input-b1" name="image" type="file" class="file"  accept="image/*">

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{@csrf_field()}}
                    <input type="hidden" name="id" value="{{$project->id}}">
                    <input type="submit" class="btn btn-success" value="Salvează">
                </div>
            </div>
        </div>
    </form>


    <div id="imageURL" data-url="{{request()->root().'/'.$project->logo}}"></div>
    <div id="htmlValue" style="display: none" >{{$project->description}}</div>
@stop

@section('scripts')
    <script src="/admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/admin_lte/dist/js/jquery.validate.min.js"></script>
    <script src="/admin_lte/dist/js/fileinput.min.js"></script>
    <script>

        $('#text1').html($('#htmlValue').html());
        var editor = $('#text1').wysihtml5();
    </script>
    <script>
        function Validate() {
            checked = $("input[type=checkbox]:checked").length;

            if(!checked) {
                alert("You must check at least one checkbox.");
                return false;
            }

        };

        $("#input-b1").fileinput({
            showUpload:false,
            allowedFileExtensions: ["jpg", "png", "gif", "jpeg"],
            initialPreview: [
                "<img src='"+$('#imageURL').data('url')+"' class=\"file-preview-image kv-preview-data rotate-1\" >"
            ]
        });
        $(document).ready(function(){

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

        }
    </script>
@stop
