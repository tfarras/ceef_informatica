<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGARE</li>
            <li class="treeview {{ Request::is('admin/create*')  ? 'active menu-open' : ''  }}">
                <a href="#">
                    <i class="fa fa-plus"></i> <span>Crează</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/create/teacher*')  ? 'active' : ''  }}"><a href="{{route('CreateTeacherIndex')}}"><i class="fa fa-circle-o"></i> Profesor</a></li>
                    <li class="{{ Request::is('admin/create/event*')  ? 'active' : ''  }}"><a href="{{route('CreateEventIndex')}}"><i class="fa fa-circle-o"></i> Eveniment</a></li>
                    <li class="{{ Request::is('admin/create/absolvent*')  ? 'active' : ''  }}"><a href="{{route('AbsolventCreateIndex')}}"><i class="fa fa-circle-o"></i> Absolvent</a></li>
                    <li class="{{ Request::is('admin/create/article*')  ? 'active' : ''  }}"><a href="{{route('CreateArticle')}}"><i class="fa fa-circle-o"></i> Articol</a></li>
                    <li class="{{ Request::is('admin/create/course*')  ? 'active' : ''  }}"><a href="{{route('CreateCourse')}}"><i class="fa fa-circle-o"></i> Curs</a></li>

                </ul>
            </li>
            <li class="treeview {{ Request::is('admin/edit*')  ? 'active menu-open' : ''  }}">
                <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Edit</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/edit/teachers*')  ? 'active ' : ''  }}"><a href="{{route('EditIndex')}}"><i class="fa fa-circle-o"></i> Profesor</a></li>
                    <li class="treeview {{ Request::is('admin/edit/event*')  ? 'active menu-open' : ''  }}">
                        <a href="#"><i class="fa fa-circle-o"></i> Eveniment
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu" >
                            <li><form method="get" action="{{route('EditEvent')}}">
                                    <select name="id" class="form-control select2 select-dark" style="width: 75%">
                                       @php
                                               $events=\App\Event::all();
                                               @endphp
                                        @foreach($events as $event)
                                            <option value="{{$event->id}}">{{$event->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="submit" class="btn btn-xs bg-navy" value="Edit"/>
                                </form></li>
                        </ul>
                    </li>
                    <li class="treeview {{ Request::is('admin/edit/absolvent*')  ? 'active menu-open' : ''  }}">
                        <a href="#"><i class="fa fa-circle-o"></i> Absolvent
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu" >
                            <li><form method="get" action="{{route('AbsolventEdit')}}">
                                    <select name="id" class="form-control select2 select-dark" style="width: 75%">
                                       @php
                                               $absolvents=\App\Absolvent::all();
                                               @endphp
                                        @foreach($absolvents as $absolvent)
                                            <option value="{{$absolvent->id}}">{{$absolvent->first_name}} {{$absolvent->last_name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="submit" class="btn btn-xs bg-navy" value="Edit"/>
                                </form></li>
                </ul>
            </li>
                    <li class="treeview {{ Request::is('admin/edit/article*')  ? 'active menu-open' : ''  }}">
                        <a href="#"><i class="fa fa-circle-o"></i> Articol
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu" >
                            <li><form method="get" action="{{route('editArticle')}}">
                                    <select name="id" class="form-control select2 select-dark" style="width: 75%">
                                        @php
                                            $articles=\App\Article::all();
                                        @endphp
                                        @foreach($articles as $article)
                                            <option value="{{$article->id}}">{{$article->title}}</option>
                                        @endforeach
                                    </select>
                                    <input type="submit" class="btn btn-xs bg-navy" value="Edit"/>
                                </form></li>
                        </ul>
                    </li>
                    <li class="treeview {{ Request::is('admin/edit/article*')  ? 'active menu-open' : ''  }}">
                        <a href="#"><i class="fa fa-circle-o"></i> Curs
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu" >
                            <li><form method="get" action="{{route('editCourse')}}">
                                    <select name="id" class="form-control select2 select-dark" style="width: 75%">
                                        @php
                                            $courses=\App\Course::all();
                                        @endphp
                                        @foreach($courses as $course)
                                            <option value="{{$course->id}}">{{$course->title}}</option>
                                        @endforeach
                                    </select>
                                    <input type="submit" class="btn btn-xs bg-navy" value="Edit"/>
                                </form></li>
                        </ul>
                    </li>
                </ul>
            <li class="treeview {{ Request::is('admin/gallery*')  ? 'active menu-open' : ''  }}">
                <a href="#">
                    <i class="fa fa-image"></i>
                    <span>Galerie (administrare)</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/gallery/upload*')  ? 'active ' : ''  }}"><a href="{{route('GalleryUploadIndex')}}"><i class="fa fa-circle-o"></i> Încarcă</a></li>
                    <li class="{{ Request::is('admin/gallery/view*')  ? 'active ' : ''  }}"><a href="{{route('GalleryShow')}}"><i class="fa fa-circle-o"></i> Vizioneză</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/delete*')  ? 'active' : ''  }}">
                <a href="{{route('DeleteAll')}}">
                    <i class="fa fa-remove"></i>
                    <span>Ștergere</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>

        </ul>

    </section>
    <!-- /.sidebar -->
</aside>