@extends('layouts.app')

@section('styles')
    @stop
@section('content')


    <div class="slider">
        <ul class="bxslider">
            <li>
                <div class="container">
                    <div class="info">
                    </div>
                </div>
                <!-- / content -->
            </li>
        </ul>
        <div class="bg-bottom"></div>
    </div>

    <section class="posts">
        <div class="container" align="center" style="width: 100%">
            <div class="col-lg-12 col-md-4 col-xs-6 ">
                @foreach($teachers as $teacher)
                    <a href="{{route('teacher.show',['id' => $teacher->id])}}">
                <div class="ch-item1 ch-img effect" style="background-image: url('/images/teachers/{{$teacher->image}}')">
                    <div class="ch-info1">
                    </div>
                    <div class="caption">
                        <h4>{{$teacher->last_name}} {{$teacher->first_name}}</h4>
                    </div>
                </div></a>
                @endforeach
            </div>
        </div>

        <!-- / container -->
    </section>
    <section class="news">
        <div class="container">
            <h2>Latest news</h2>
            <article>
                <div class="pic"><img src="images/1.png" alt=""></div>
                <div class="info">
                    <h4>Omnis iste natus error sit voluptatem accusantium </h4>
                    <p class="date">14 APR 2014, Jason Bang</p>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores (...)</p>
                    <a class="more" href="#">Read more</a>
                </div>
            </article>
            <article>
                <div class="pic"><img src="images/1_1.png" alt=""></div>
                <div class="info">
                    <h4>Omnis iste natus error sit voluptatem accusantium </h4>
                    <p class="date">14 APR 2014, Jason Bang</p>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores (...)</p>
                    <a class="more" href="#">Read more</a>
                </div>
            </article>
            <div class="btn-holder">
                <a class="btn" href="#">See archival news</a>
            </div>
        </div>
        <!-- / container -->
    </section>

    <section class="events">
        <div class="container">
            <h2>Upcoming events</h2>
            <article>
                <div class="current-date">
                    <p>April</p>
                    <p class="date">15</p>
                </div>
                <div class="info">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <a class="more" href="#">Read more</a>
                </div>
            </article>
            <article>
                <div class="current-date">
                    <p>April</p>
                    <p class="date">17</p>
                </div>
                <div class="info">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <a class="more" href="#">Read more</a>
                </div>
            </article>
            <article>
                <div class="current-date">
                    <p>April</p>
                    <p class="date">25</p>
                </div>
                <div class="info">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <a class="more" href="#">Read more</a>
                </div>
            </article>
            <article>
                <div class="current-date">
                    <p>April</p>
                    <p class="date">29</p>
                </div>
                <div class="info">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad.</p>
                    <a class="more" href="#">Read more</a>
                </div>
            </article>
            <div class="btn-holder">
                <a class="btn blue" href="#">See all upcoming events</a>
            </div>
        </div>
        <!-- / container -->
    </section>
    @stop

@section('scripts')
    @stop