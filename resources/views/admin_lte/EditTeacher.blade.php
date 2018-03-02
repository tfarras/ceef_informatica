@extends('admin_lte.layout.app')
@section('Page Name','Editare')
@if(isset($teacher))
    @section('Page desc','Profesor '.$teacher->first_name.' '.$teacher->last_name)
    @else
        @section('Page desc','Profesor')
        @endif
@section('styles')

    <link rel="stylesheet" href="/css/profile.min.css">
    <link rel="stylesheet" href="/css/components.css">
@stop
@section('content')
    @php
        $disciplines=\App\Discipline::all();
    @endphp
        @if ( session()->has('error_message') )
            <div class="alert alert-danger alert-dismissable">{{ session()->get('error_message') }}</div>
        @endif

        @if ( session()->has('message') )
            <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
        @endif
            @if(isset($teacher))
            <form action="{{route('EditTeacher')}}" method="post" onsubmit="return Validate()"  enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="box box-primary">

                        <div class="box-header with-border">
                            <h3 class="box-title">Date generale</h3>
                        </div>

                        <div class="box-body">
                            <div class="form-group" style="height: 30em;">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Nume" name="first_name" value="{{$teacher->first_name}}" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Prenume" name="last_name" value="{{$teacher->last_name}}" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Funcție" name="function" value="{{$teacher->function}}" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="didactic_level">
                            <option @if($teacher->didactic_level==null) selected @endif value="" >None</option>
                            <option @if($teacher->didactic_level=='I') selected @endif value="I" >I</option>
                            <option value="II" @if($teacher->didactic_level=='II') selected @endif>II</option>
                            <option value="Superior" @if($teacher->didactic_level=='Superior') selected @endif>Superior</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" min="1" max="550" placeholder="Cabinet" name="cabinet" value="{{$teacher->cabinet}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Contact Email" name="email" value="{{$teacher->email}}">
                    </div>
                    <div class="col-md-4">
                        <div class="profile-userpic">
                            <img src="/images/teachers/{{$teacher->image}}" class="img-responsive" alt="">
                        </div>

                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <input  type="file" name="image" accept="image/*">
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Discipline predate</h3></div>
                        <div class="box-body">
                    <div class="form-group" style="height: 30em; overflow-y: scroll; overflow-x: hidden">
                        <div class="funkyradio" style="width: 100%">
                            @foreach($disciplines as $discipline)
                                <div class="funkyradio-success">
                                    <input type="checkbox" name="checkbox[]" id="checkbox{{$discipline->id}}" @if(in_array($discipline->id,$disciplines_teacher)) checked @endif value="{{$discipline->id}}" />
                                    <label for="checkbox{{$discipline->id}}">{{$discipline->name}}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                        </div>
                    </div>                </div>


                <div class="col-md-12"    >

                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                Orarul lecțiilor</div>
                        </div>
                    <div class="portlet-body">
                        <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer"><div class="row"><div ><div class="dataTables_length" id="sample_editable_1_length"><table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info" >
                                            <thead>
                                            <tr role="row">
                                                <th>Nr./Ora</th>
                                                <th>Luni</th>
                                                <th>Marți</th>
                                                <th>Miercuri</th>
                                                <th>Joi</th>
                                                <th>Vineri</th>
                                            </tr></thead>
                                            <tbody>
                                            <tr role="row" class="odd">
                                                <td style="width: 1%;">1</td>
                                                <td class="sorting_1"><textarea class="form-control" rows="1" name="monday_1" id="comment" >{{$shedule_1->lesson_1}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="tuesday_1"></textarea>{{$shedule_2->lesson_1}}</td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="wednesday_1"></textarea>{{$shedule_3->lesson_1}}</td>
                                                <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_1">{{$shedule_4->lesson_1}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="friday_1">{{$shedule_5->lesson_1}}</textarea></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td style="width: 1%;">2</td>
                                                <td class="sorting_1"><textarea class="form-control" rows="1" name="monday_2" id="comment">{{$shedule_1->lesson_2}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="tuesday_2">{{$shedule_2->lesson_2}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="wednesday_2">{{$shedule_3->lesson_2}}</textarea></td>
                                                <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_2">{{$shedule_4->lesson_2}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="friday_2">{{$shedule_5->lesson_2}}</textarea></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td style="width: 1%;">3</td>
                                                <td class="sorting_1"><textarea class="form-control" rows="1" id="comment" name="monday_3">{{$shedule_1->lesson_3}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="tuesday_3">{{$shedule_2->lesson_3}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="wednesday_3">{{$shedule_3->lesson_3}}</textarea></td>
                                                <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_3">{{$shedule_4->lesson_3}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="friday_3">{{$shedule_5->lesson_3}}</textarea></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td style="width: 1%;">4</td>
                                                <td class="sorting_1"><textarea class="form-control" rows="1" id="comment" name="monday_4">{{$shedule_1->lesson_4}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="tuesday_4">{{$shedule_2->lesson_4}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="wednesday_4">{{$shedule_3->lesson_4}}</textarea></td>
                                                <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_4">{{$shedule_4->lesson_4}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="friday_4">{{$shedule_5->lesson_4}}</textarea></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td style="width: 1%;">5</td>
                                                <td class="sorting_1"><textarea class="form-control" rows="1" id="comment" name="monday_5">{{$shedule_1->lesson_5}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="tuesday_5">{{$shedule_2->lesson_5}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="wednesday_5">{{$shedule_3->lesson_5}}</textarea></td>
                                                <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_5">{{$shedule_4->lesson_5}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="friday_5">{{$shedule_5->lesson_5}}</textarea></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td style="width: 1%;">6</td>
                                                <td class="sorting_1"><textarea class="form-control" rows="1" id="comment" name="monday_6">{{$shedule_1->lesson_6}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="tuesday_6">{{$shedule_2->lesson_6}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="wednesday_6">{{$shedule_3->lesson_6}}</textarea></td>
                                                <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_6">{{$shedule_4->lesson_6}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="friday_6">{{$shedule_5->lesson_6}}</textarea></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td style="width: 1%;">7</td>
                                                <td class="sorting_1"><textarea class="form-control" rows="1" id="comment" name="monday_7">{{$shedule_1->lesson_7}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="tuesday_7">{{$shedule_2->lesson_7}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="wednesday_7">{{$shedule_3->lesson_7}}</textarea></td>
                                                <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_7">{{$shedule_4->lesson_7}}</textarea></td>
                                                <td><textarea class="form-control" rows="1" id="comment" name="friday_7">{{$shedule_5->lesson_7}}</textarea></td>
                                            </tr>
                                            </tbody>
                                        </table></div></div></div></div>
                    </div>

                    </div></div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$teacher->id}}">
                        {{@csrf_field()}}
                        <input type="submit" class="btn btn-success btn-lg" value="Update">
                    </div>

            </form>
                @else
                    <div class="col-lg12">
                        <div class="alert alert-warning alert-dismissable" style="text-align: center;">No teacher selected.</div>
                    </div>
        @endif
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
