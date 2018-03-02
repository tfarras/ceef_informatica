@extends('admin_lte.layout.app')
@section('styles')

    <link rel="stylesheet" href="/css/profile.min.css">
    <link rel="stylesheet" href="/css/components.css">
@stop
@section('content')
    @php
        $disciplines=\App\Discipline::all();
    @endphp
    <a href="/logout" style="float: right; margin-right: 1em;" >
        <button type="button" class="btn btn-info" >
            <span class="glyphicon glyphicon-log-out"></span>Log out
        </button>
    </a>
    <div class="container" style="margin-bottom: 1em; margin-top: 5em; text-align: center;">
        @if ( session()->has('error_message') )
            <div class="alert alert-danger alert-dismissable">{{ session()->get('error_message') }}</div>
        @endif

        @if ( session()->has('message') )
            <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
        @endif
        <div class="row">
            <form action="{{route('CreateTeacher')}}" method="post" onsubmit="return Validate()"  enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Nume" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Prenume" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Funcție" name="function" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="didactic_level">
                            <option value="" >None</option>
                            <option value="I" >I</option>
                            <option value="II" >II</option>
                            <option value="Superior" >Superior</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" min="1" max="550" placeholder="Cabinet" name="cabinet">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Contact Email" name="email">
                    </div>
                    <div class="form-group">
                        <input  type="file" name="image" accept="image/*" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="height: 25em; overflow-y: scroll; overflow-x: hidden">
                        <div class="funkyradio" style="width: 100%">
                            @foreach($disciplines as $discipline)
                            <div class="funkyradio-success">
                                <input type="checkbox" name="checkbox[]" id="checkbox{{$discipline->id}}" value="{{$discipline->id}}" />
                                <label for="checkbox{{$discipline->id}}">{{$discipline->name}}</label>
                            </div>
                                @endforeach
                        </div>
                    </div>
                </div>
                <div class="row"    >
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
                                        <td class="sorting_1"><textarea class="form-control" rows="1" name="monday_1" id="comment"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="tuesday_1"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="wednesday_1"></textarea></td>
                                        <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_1"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="friday_1"></textarea></td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td style="width: 1%;">2</td>
                                        <td class="sorting_1"><textarea class="form-control" rows="1" name="monday_2" id="comment"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="tuesday_2"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="wednesday_2"></textarea></td>
                                        <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_2"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="friday_2"></textarea></td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td style="width: 1%;">3</td>
                                        <td class="sorting_1"><textarea class="form-control" rows="1" id="comment" name="monday_3"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="tuesday_3"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="wednesday_3"></textarea></td>
                                        <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_3"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="friday_3"></textarea></td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td style="width: 1%;">4</td>
                                        <td class="sorting_1"><textarea class="form-control" rows="1" id="comment" name="monday_4"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="tuesday_4"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="wednesday_4"></textarea></td>
                                        <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_4"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="friday_4"></textarea></td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td style="width: 1%;">5</td>
                                        <td class="sorting_1"><textarea class="form-control" rows="1" id="comment" name="monday_5"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="tuesday_5"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="wednesday_5"></textarea></td>
                                        <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_5"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="friday_5"></textarea></td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td style="width: 1%;">6</td>
                                        <td class="sorting_1"><textarea class="form-control" rows="1" id="comment" name="monday_6"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="tuesday_6"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="wednesday_6"></textarea></td>
                                        <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_6"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="friday_6"></textarea></td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td style="width: 1%;">7</td>
                                        <td class="sorting_1"><textarea class="form-control" rows="1" id="comment" name="monday_7"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="tuesday_7"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="wednesday_7"></textarea></td>
                                        <td class="center"><textarea class="form-control" rows="1" id="comment" name="thursday_7"></textarea></td>
                                        <td><textarea class="form-control" rows="1" id="comment" name="friday_7"></textarea></td>
                                    </tr>
                                    </tbody>
                                        </table></div></div></div></div>
                    </div>

                    <div class="form-group">
                        {{@csrf_field()}}
                        <input type="submit" class="btn btn-success btn-lg" value="Create">
                    </div>
                </div>

            </form>
        </div>
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
