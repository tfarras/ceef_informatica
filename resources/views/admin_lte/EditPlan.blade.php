@extends('admin_lte.layout.app')
@section('Page Name','Adaugare')
@section('Page desc','Plan de învățământ')
@section('styles')

    <link href="/admin_lte/dist/css/fileinput.min.css"  media="all" rel="stylesheet" type="text/css">
@stop

@section('content')
    @if (session()->has('error_message') )
        <div class="alert alert-danger alert-dismissable">{{ session()->get('error_message') }}</div>
    @endif

    @if (session()->has('message') )
        <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
    @endif


    <div class="col-md-4 col-lg-3">
        <div class="box">
            <div class="box-body">
                    <div class="form">
                        <form id="absolvent" method="post" enctype="multipart/form-data" action="{{route('planSave')}}" >
                            <div class="form-body">
                            <div class="form-group">
                                <label>Denumire:</label>
                                <input type="text" name="title" class="form-control" placeholder="Denumire" value="{{$plan->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Anul:</label>
                                <select id="promotion" title="promotion" name="year" class="form-control">
                                    @foreach($dates as $date)
                                        <option @if($date==$plan->year) selected="selected" @endif value="{{$date}}">{{$date}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="form-group">
                                    <label>Document:</label>
                                    <input id="input-b1" name="file" type="file" class="file"  accept="application/pdf">

                                </div>
                                <div class="form-group">
                                    {{@csrf_field()}}
                                    <input type="hidden" value="{{$plan->id}}" name="id">
                                    <button class="btn btn-success">Adaugă</button>
                                </div>
                            </div>

                        </form>
                    </div>
            </div>
        </div>
    </div>
    <div id="fileURL" data-url="{{request()->root().'/'.$plan->path_to_file}}"></div>
@stop

@section('scripts')

    <script src="/admin_lte/dist/js/jquery.validate.min.js"></script>

    <script src="/admin_lte/dist/js/fileinput.min.js"></script>
    <script>

        $("#input-b1").fileinput({
            showUpload:false,
            allowedFileExtensions: ["pdf"],
            initialPreview: [
                $('#fileURL').data('url')
                ],
            initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
            initialPreviewFileType: 'image', // image is the default and can be overridden in config below
            initialPreviewConfig: [
                {type: "pdf", size: 8000, caption: "About.pdf", downloadUrl: false}, // disable downloa
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
            $("#absolvent").validate({
                rules: {
                    firstname:{
                        required: true
                    },
                    lastname: {
                        required:true
                    },
                    promotion: {
                        required: true
                    }
                }
            });
        });
    </script>
@stop