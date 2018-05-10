<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Informatica | CEEF</title>
    <link rel="stylesheet" media="all" href="/css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

    <link rel="stylesheet" media="all" href="/css/style.css">
    <link rel="stylesheet" media="all" href="/css/effects.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" href="/images/2.png">
    <style>
        .dropdown-item{
            text-align: center;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
@yield('styles')
</head>
<body>

        <a onclick="scrollToTop();" id="return-to-top" style="position: fixed; bottom: 1em; right: 1em;"><i class="icon-chevron-up"></i></a>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.11';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@include('layouts.header')


        @yield('content')

@include('layouts.footer')

{{-- For production, it is recommended to combine following scripts into one. --}}
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    })

</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
<script src="/js/plugins.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script>
    $('.dropdown-toggle').dropdown();
</script>
<script src="/js/main.js"></script>
<script>
    function scrollToFooter(){
        $("html, body").animate({ scrollTop: $('#footer').offset().top }, 1000);
    }
    function scrollToTop(){
         $("html, body").animate({ scrollTop: $('#header').offset().top }, 1000);
    }
</script>

<script type="text/javascript">
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);// Fade in the arrow
        $("#header2").fadeIn(200);
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        $('#header2').fadeOut(200);   // Else fade out the arrow
    }
});
$('#surseList').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

    function scrollSpec(){
        $('html, body').animate({
            scrollTop: $("#specialitati").offset().top
        }, 1000);
    }

</script>
@yield('scripts')
</body>
</html>
