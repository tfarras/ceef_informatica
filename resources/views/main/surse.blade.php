@extends('layouts.app')
@section('styles')
    <style>
        .just-padding {
            padding: 15px;
        }

        .list-group.list-group-root {
            padding: 0;
            overflow: hidden;
        }

        .list-group.list-group-root .list-group {
            margin-bottom: 0;
        }

        .list-group.list-group-root .list-group-item {
            border-radius: 0;
            border-width: 1px 0 0 0;
        }

        .list-group.list-group-root > .list-group-item:first-child {
            border-top-width: 0;
        }

        .list-group.list-group-root > .list-group > .list-group-item {
            padding-left: 30px;
        }

        .list-group.list-group-root > .list-group > .list-group > .list-group-item {
            padding-left: 45px;
        }

        .list-group-item .fa {
            margin-right: 5px;
        }
    </style>
@stop
@section('content')
    <div class="divider"></div>
    <div class="content">
            <div class="col-md-4">
                <h2>Surse bibliografice</h2>
                <section>
                    <div class="just-padding">

                        <div class="list-group list-group-root well">
                            @foreach($disciplines as $discipline)
                            <a href="#item-{{$discipline->id}}" class="list-group-item" data-toggle="collapse">
                                <i class="fa fa-chevron-right"></i>{{$discipline->name}}
                            </a>
                            <div class="list-group collapse" id="item-{{$discipline->id}}">
                                @php
                                    $manuals=\App\Bibliography::where('discipline_id',$discipline->id)->get();
                                @endphp
                                @foreach($manuals as $manual)
                                <a class="list-group-item" onclick="loadEmbed(this)" data-link="/{{$manual->path}}" >
                                    {{$manual->manual_name}}
                                </a>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        <div class="col-md-8">
            <section>
              <embed id="embedManual" style="width: 100%; height: 60em;" type='application/pdf'>
            </section>
        </div>
    </div>
@stop

@section('scripts')
    <script src="./js/layout.js" type="text/javascript"></script>
    <script>
        $(function() {

            $('.list-group-item').on('click', function() {
                $('.fa', this)
                    .toggleClass('fa-chevron-right')
                    .toggleClass('fa-chevron-down');
            });

        });
        function loadEmbed(el){
            var source=$(el).data('link');
            var embed=document.getElementById("embedManual");
            var clone=embed.cloneNode(true);
            clone.setAttribute('src',source);
            embed.parentNode.replaceChild(clone,embed)
        }
    </script>
@stop
