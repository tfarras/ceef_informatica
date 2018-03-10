@extends('admin_lte.layout.app')
@section('Page Name','Galerie')
@section('Page desc','încarcă imaginile')
@section('styles')

    <link href="/admin_lte/dist/css/fileinput.css" rel="stylesheet" type="text/css" />
    <link href="/admin_lte/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin_lte/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />
    <link href="/admin_lte/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <div class="box">
        <div class="box-body">
    <div class="col-md-8">
        <form id="fileupload" action="{{route('ImageUpload')}}" method="POST" enctype="multipart/form-data">
        {{@csrf_field()}}
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
            <div class="row fileupload-buttonbar">
                <div class="col-lg-12">

                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="btn btn-success fileinput-button">
                                                <i class="fa fa-plus"></i>
                            <span> Select files... </span>
                                                <input type="file" name="files[]" multiple="multiple" accept="image/*"> </span>

                    <button type="submit" class="btn btn-info start">
                        <i class="fa fa-upload"></i>
                        <span> Start upload </span>
                    </button>
                    <button type="reset" class="btn btn-warning cancel">
                        <i class="fa fa-ban-circle"></i>
                        <span> Cancel upload </span>
                    </button>
                    <!-- The global file processing state -->
                    <span class="fileupload-process"> </span>
                </div>
                <!-- The global progress information -->
                <div class="col-lg-5 fileupload-progress fade">
                    <!-- The global progress bar -->
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-success" style="width:0%;"> </div>
                    </div>
                    <!-- The extended global progress information -->
                    <div class="progress-extended"> &nbsp; </div>
                </div>
            </div>
            <!-- The table listing the files available for upload/download -->
            <table role="presentation" class="table table-striped clearfix">
                <tbody class="files"> </tbody>
            </table>
        </form>
    </div>

    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
        <div class="slides"> </div>
        <h3 class="title"></h3>
        <a class="prev"> ‹ </a>
        <a class="next"> › </a>
        <a class="close white"> </a>
        <a class="play-pause"> </a>
        <ol class="indicator"> </ol>
    </div>
    </div>
    </div>

@stop

@section('scripts')
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <script id="template-upload" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-upload fade">
                                <td>
                                    <span class="preview"></span>
                                </td>
                                <td>
                                    <p class="name">{%=file.name%}</p>
                                    <strong class="error label label-danger"></strong>
                                </td>
                                <td>
                                    <p class="size">Processing...</p>
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                </td>
                                <td> {% if (!i && !o.options.autoUpload) { %}
                                    <button class="btn blue start" disabled>
                                        <i class="fa fa-upload"></i>
                                        <span>Start</span>
                                    </button> {% } %} {% if (!i) { %}
                                    <button class="btn red cancel">
                                        <i class="fa fa-ban"></i>
                                        <span>Cancel</span>
                                    </button> {% } %} </td>
                            </tr> {% } %} </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-download fade">
                                <td>
                                    <span class="preview"> {% if (file.thumbnailUrl) { %}
                                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery>
                                            <img src="{%=file.thumbnailUrl%}">
                                        </a> {% } %} </span>
                                </td>
                                <td>
                                    <p class="name"> {% if (file.url) { %}
                                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
                                        <span>{%=file.name%}</span> {% } %} </p> {% if (file.error) { %}
                                    <div>
                                        <span class="label label-danger">Error</span> {%=file.error%}</div> {% } %}
                                        {% if (file.success) { %}
                                    <div>
                                        <span class="label label-success">Done! </span></div>

                                        {% } %}</td>
                                <td>
                                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                                </td>
                                <td> {% if (file.deleteUrl) { %}
                                    <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                                        <i class="fa fa-trash-o"></i>
                                        <span>Delete</span>
                                    </button>
                                    <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
                                    <button class="btn yellow cancel btn-sm">
                                        <i class="fa fa-ban"></i>
                                        <span>Close</span>
                                    </button> {% } %} </td>
                            </tr> {% } %} </script>

    <script src="/admin_lte/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/js/jquery.fileupload-audio.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/js/jquery.fileupload-video.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/js/jquery.fileupload-validate.js" type="text/javascript"></script>
    <script src="/admin_lte/plugins/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>
    <script src="/admin_lte/dist/js/form-fileupload.js" type="text/javascript"></script>
@stop