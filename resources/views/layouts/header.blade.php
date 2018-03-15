
<header id="header">

    <a href="/" id="logo_first" title="Catedra Informatica">Informatica</a>
    <div class="container">

        <a href="/" id="logo" title="Catedra Informatica">Informatica</a>
        <div class="menu-trigger"></div>
        <nav id="menu" class="">
            <ul>
                <li><a href="{{route('coursesIndex')}}">Cursuri</a></li>
                <li><a href="{{route('eventsIndex')}}">Evenimente</a></li>
                <li><a href="{{route('articlesIndex')}}">Noutăți</a></li>
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
                <li><a href="#" onclick="scrollToFooter()" >Contact</a></li>
            </ul>
        </nav>
        <!-- / navigation -->
    </div>
    <!-- / container -->

</header>
<!-- / header -->