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
                    <li class="{{ Request::is('admin/create/teacher*')  ? 'active' : ''  }}"><a href="{{route('CreateTeacherIndex')}}"><i class="fa fa-circle-o"></i>Profesor</a></li>
                    <li class="{{ Request::is('admin/create/event*')  ? 'active' : ''  }}"><a href="{{route('CreateEventIndex')}}"><i class="fa fa-circle-o"></i>Eveniment</a></li>

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
                    <li class="{{ Request::is('admin/edit/teacher*')  ? 'active ' : ''  }}"><a href="{{route('EditIndex')}}"><i class="fa fa-circle-o"></i> Profesor</a></li>
                    <li class="treeview menu-open">
                        <a href="#"><i class="fa fa-circle-o"></i> Eveniment
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu" style="display: block;">
                            <li><form method="get" action="{{route('EditEvent')}}">
                                    <select name="id" class="form-control select2" style="width: 75%">
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
                </ul>
            </li>

            <li class="treeview {{ Request::is('admin/gallery*')  ? 'active menu-open' : ''  }}">
                <a href="#">
                    <i class="fa fa-edit"></i>
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

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>