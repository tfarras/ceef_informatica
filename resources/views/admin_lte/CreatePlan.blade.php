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
                        <form id="absolvent" method="post" enctype="multipart/form-data" action="{{route('CreatePlanSave')}}" >
                            <div class="form-body">
                            <div class="form-group">
                                <label>Denumire:</label>
                                <input type="text" name="title" class="form-control" placeholder="Denumire" />
                            </div>
                            <div class="form-group">
                                <label>Anul:</label>
                                <select id="promotion" title="promotion" name="year" class="form-control">
                                    @foreach($dates as $date)
                                        <option value="{{$date}}">{{$date}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="form-group">
                                    <label>Document:</label>
                                    <input id="input-b1" name="file" type="file" class="file"  accept="application/pdf">

                                </div>
                                <div class="form-group">
                                    {{@csrf_field()}}
                                    <button class="btn btn-success">Adaugă</button>
                                </div>
                            </div>

                        </form>
                    </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')

    <script src="/admin_lte/dist/js/jquery.validate.min.js"></script>

    <script src="/admin_lte/dist/js/fileinput.min.js"></script>
    <script>

        $("#input-b1").fileinput({
            showUpload:false,
            required: true,
            allowedFileExtensions: ["pdf","xlsx", "xls", "docx", "doc"]
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