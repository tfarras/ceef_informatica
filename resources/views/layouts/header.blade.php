
<header id="header">

    <a href="/" id="logo_first" title="Catedra Informatica">Informatica</a>
    <div class="container">

        <a href="/" id="logo" title="Catedra Informatica">Informatica</a>
        <div class="menu-trigger"></div>
        <nav id="menu" class="">
            <ul>

                <li><a href="{{route('articlesIndex')}}">Noutăți</a></li>
                <li><a href="{{route('eventsIndex')}}">Evenimente</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Academic <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu multi-level" aria-labelledby="navbarDropdown">
                        <a href="{{route('plansIndex')}}" class="dropdown-item" >Planuri de învățământ</a>
                        <a class="dropdown-item" href="/#specialitati"  onclick="scrollSpec()">Specialități</a>
                        <a class="dropdown-item" href="{{route('coursesIndex')}}">Cursuri</a>
                        <a class="dropdown-item" href="{{route('show.teachers')}}">Profesori</a>
                        <a class="dropdown-item" href="{{route('calendar')}}">Calendar academic</a>
                        <hr style="margin: 0.1em;">
                        <a class="dropdown-item" href="{{route('load.bibliography')}}">Surse bibliografice</a>
                    </div>
                </li>
            </ul>
            <ul >
                <li><a href="{{route('absolventIndex')}}">Absolvenți</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Proiecte<span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('projectsIndex')}}" >Lucrări de diplomă</a>
                        <a class="dropdown-item" href="{{route('projectsGalleryIndex')}}" >Galerie</a>
                    </div>
                </li>
                <li><a href="#" onclick="scrollToFooter()" >Contacte</a></li>
            </ul>
        </nav>
        <!-- / navigation -->
    </div>
    <!-- / container -->

</header>
<header id="header2" style="display: none; position: fixed; z-index: 9999; background-color: white; top: 0; left: 50%;
    transform: translateX(-50%); border-radius: 0.5em">

        <nav id="menu" class="">
            <ul>
                <li><a href="{{route('articlesIndex')}}">Noutăți</a></li>
                <li><a href="{{route('eventsIndex')}}">Evenimente</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Academic <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu multi-level" aria-labelledby="navbarDropdown">
                        <a href="{{route('plansIndex')}}" class="dropdown-item" >Planuri de învățământ</a>
                        <a class="dropdown-item" href="/#specialitati"  onclick="scrollSpec()">Specialități</a>
                        <a class="dropdown-item" href="{{route('coursesIndex')}}">Cursuri</a>
                        <a class="dropdown-item" href="{{route('show.teachers')}}">Profesori</a>
                        <a class="dropdown-item" href="{{route('calendar')}}">Calendar academic</a>

                        <hr style="margin: 0.1em;">
                        <a class="dropdown-item" href="{{route('load.bibliography')}}">Surse bibliografice</a>
                    </div>
                </li>
                <li><a href="{{route('absolventIndex')}}">Absolvenți</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Proiecte<span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('projectsIndex')}}" >Lucrări de diplomă</a>
                        <a class="dropdown-item" href="{{route('projectsGalleryIndex')}}" >Galerie</a>
                    </div>
                </li>
                <li><a href="#" onclick="scrollToFooter()" >Contacte</a></li>
            </ul>
        </nav>
        <!-- / navigation -->
    <!-- / container -->

</header>
<!-- / header -->