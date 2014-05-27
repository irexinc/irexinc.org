<!DOCTYPE html>
<html lang="en">

  <head>
    <meta name="author" content="Matt Emborsky <memborskygmail.com>" />
    <meta charset="utf-8" />

    <title>
      @section('title')
        Indiana Real Estate Exchangors, Inc.
      @show
    </title>

    <!-- B-E-A-UTIFUL -->

    <link href="{{ asset('/assets/stylesheets/normalize-min.css') }}" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet">
    <link href="{{ asset('/assets/fancybox/jquery.fancybox.pack.css') }}" rel="stylesheet">

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

  </head>

  <body>
    <div id="content-wrapper">
      <div id="header">
        <div id="banner">
          <img src="/assets/images/banner.png" alt="Indiana Real Estate Exchangors, Inc." width="1000px" height="317px" />
          <h1>Indiana Real Estate Exchangors, Inc.</h1>
        </div>

        <div id="nav">
          <ul>

            @section('navigation')

              <li><a href="{{ URL::to('') }}/">Home</a></li>
              <li><a href="{{ URL::to('members') }}">Members</a></li>
              <li><a href="{{ URL::to('calendar') }}">Calendar</a></li>
              <li><a href="{{ URL::to('speakers') }}">Past Speakers</a></li>
              <li><a href="{{ URL::to('by-laws') }}">By-Laws</a></li>
              <li><a href="{{ URL::to('documents') }}">Documents</a></li>
              <li><a href="{{ URL::to('contact') }}">Contact</a>
              <li><a href="http://irex.ncexchangors.com/" target="_blank">NCE</a></li>

            @show

          </ul>
        </div>
      </div>

      @yield('content')

      <div id="footer">Copyright &copy; 1989 - {{{ date("Y") }}} &mdash; Indiana Real Estate Exchangors, Inc.</div>
      &nbsp;
    </div>

    <!-- SPARKLES -->

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{ asset('/assets/fancybox/jquery.fancybox.pack.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>

    <script src="{{ asset('assets/javascript/application.js') }}"></script>

    @section('javascript')
    @show

  </body>
</html>
