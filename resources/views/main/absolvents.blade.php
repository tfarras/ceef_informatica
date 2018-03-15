@extends('layouts.app')
@section('styles')
    <style>
    .btn{
    color: #7d8797;
    border-radius: 4px;
    background: #fff;
    font-size: 16px;
    height: 46px;
    line-height: 46px;
    display: inline-block;
    padding: 0 21px;
    border: none;
    }
    .btn-blue{
    color: #fff !important;
    border-radius: 4px;
    background: #008bc4;
    font-size: 16px;
    height: 46px;
    line-height: 46px;
    display: inline-block;
    padding: 0 21px;
    border: none;
    }
    .short-desc img{
        display: none;
    }

    .row,
    .row > .column {
        padding: 8px;
    }

    /* Create three equal columns that floats next to each other */
    .column {
        float: left;
        width: 25%;
        display: none; /* Hide columns by default */
    }

    /* Clear floats after rows */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Content */
    .content2 {
        background-color: #e9e9e9;
        padding: 10px;
    }

    /* The "show" class is added to the filtered elements */
    .show {
        display: block;
    }

    /* Add a grey background color on mouse-over */
    </style>
@stop
@section('content')
    <div class="divider"></div>
    <div class="content">
        <div class="container" >
                <h1>Absolvenți</h1>
                <section class="posts-con" style="margin: auto" style="width: 80%">
                    <div class="row" >
                        <div id="myBtnContainer">
                            <button class="btn btn-default active" onclick="filterSelection('all')">Show all</button>
                            @foreach($years as $year)
                                <button class="btn btn-default" onclick="filterSelection({{$year['year']}})"> {{$year['year']}}</button>
                            @endforeach
                        </div>

                        <!-- Portfolio Gallery Grid -->
                        <div class="row">
                            @foreach($absolvents as $absolvent)
                                <div class="column {{$absolvent->year}}">
                                    <div class="content2" style="text-align: center">
                                        <img src="/{{$absolvent->photo_path}}" alt="Poza" style="width:100%">
                                        <h4>{{$absolvent->first_name}} {{$absolvent->last_name}}</h4>
                                        <p>{{$absolvent->company}}</p>
                                    </div>
                                </div>

                            @endforeach

                            <!-- END GRID -->
                        </div>
                    </div>
                </section>
            </div>
    </div>
@stop

@section('scripts')
    <script src="./js/layout.js" type="text/javascript"></script>
    <script>
        jQuery(".short-desc").each(function(){
            var review_full = jQuery(this).html();
            var review = review_full;

            if( review.length > 250 )
            {
                review = review.substring(0, 250);
                jQuery(this).html( review +'...');
            }
            jQuery(this).append('<div class="full_text" style="display: none;">' + review_full + '</div>');
        });

        filterSelection("all") // Execute the function and show all columns
        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("column");
            if (c == "all") c = "";
            // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        // Show filtered elements
        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        // Hide elements that are not selected
        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function(){
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
@stop
