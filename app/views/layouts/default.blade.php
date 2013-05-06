<!DOCTYPE html>
<html lang="en">

  <head>
    <meta name="author" content="Matt Emborsky <memborskygmail.com>" />
    <meta charset="utf-8" />

    <title>Indiana Real Estate Exchangors, Inc.</title>

    <!-- B-E-A-UTIFUL -->

    <link href="{{ asset('/assets/stylesheets/normalize.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet">
    <link href="{{ asset('/assets/stylesheets/main.css') }}" rel="stylesheet" media="screen, projection">

    @section('stylesheet')

    <!--[if lt IE 9]>
    <style type="text/css">
    #header #nav ul li {
      border: none;
    }
    </style>
    <![endif]-->

    @show

    <!-- SPARKLES -->

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

    @section('javascript')
      <!-- <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script> -->

      <!-- Set the active navigation item. -->
      <script>
        $(document).ready(function() {
            $('#nav a[href$="' + location.toString().substring(("http://" + location.hostname).length) + '"]').addClass("active");;
        });
      </script>

    @show

  </head>

  <body>
    <div id="content-wrapper">
      <div id="header">
        <div id="banner">
          <img src="/assets/images/banner.png" alt="Indiana Real Estate Exchangors, Inc." />
          <h1>Indiana Real Estate Exchangors, Inc.</h1>
        </div>

        <div id="nav">
          <ul>

            @section('navigation')

              <li><a href="/">Home</a></li>
              <li><a href="{{ URL::to('members') }}">Members</a></li>
              <li><a href="{{ URL::to('calendar') }}">Calendar</a></li>
              <li><a href="{{ URL::to('by-laws') }}">By-Laws</a></li>
              <li><a href="{{ URL::to('documents') }}">Documents</a></li>

            @show

          </ul>
        </div>
      </div>

      @yield('content')

      <div id="footer">Copyright &copy; 1989 - 2013 &mdash; Indiana Real Estate Exchangors, Inc.</div>
      &nbsp;
    </div>

    <script type="text/javascript">
      var _gauges = _gauges || [];
      (function() {
        var t   = document.createElement('script');
        t.type  = 'text/javascript';
        t.async = true;
        t.id    = 'gauges-tracker';
        t.setAttribute('data-site-id', '511e675ef5a1f51137000008');
        t.src = '//secure.gaug.es/track.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(t, s);
      })();
    </script>

  </body>
</html>
