@extends('admin_lte.layout.app')
@section('Page Name','Editare')
@section('Page desc','Curs')
@section('styles')
    <link rel="stylesheet" href="/admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

@stop
@section('content')
    @if ( session()->has('error_message') )
        <div class="alert alert-danger alert-dismissable">{{ session()->get('error_message') }}</div>
    @endif

    @if ( session()->has('message') )
        <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
    @endif

    <form id="CreateArticletForm" action="{{route('CourseSave')}}" method="post" onsubmit="CopyText();">
        <div class="box" style="padding: 1em;">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Denumire</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" placeholder="Title" class="form-control" name="title" value="{{$course->title}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Conținut
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
                        <textarea class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>
            </div>

            <div class="box-header with-border">
                <h3 class="box-title">Submit</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    {{@csrf_field()}}
                    <input type="hidden" value="{{$course->id}}" name="id">
                    <input type="submit" class="btn btn-success" value="Save course">
                </div>
            </div>
        </div>
    </form>

    <div id="htmlValue" style="display: none" >{{$course->description}}</div>

@stop

@section('scripts')
    <script src="/admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/admin_lte/dist/js/jquery.validate.min.js"></script>

    <script>
        $('.textarea').html($('#htmlValue').html());
        $(function () {
            //bootstrap WYSIHTML5 - text editor
            var editor = $('.textarea').wysihtml5();
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
            $("#CreateArticletForm").validate({
                ignore: ":hidden:not(textarea)",
                rules: {
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
