<?php
require_once("../db/connections.php");
$next_meeting = $db->query("select unix_timestamp(start_date) as date from events where concat(curdate(), ' ', curtime()) < end_date and title = 'IREX Meeting' limit 1;")->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta name="author" content="Matt Emborsky <memborsky@gmail.com>" />
    <meta charset="utf-8" />

    <title>Indiana Real Estate Exchangors, Inc.</title>

    <link href="/assets/stylesheets/normalize.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet">
    <link href="/assets/stylesheets/main.css" rel="stylesheet" media="screen, projection">

    <!-- <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script> -->
    <script src="/assets/javascript/jquery.min.js"></script>

    <!-- Set the active navigation item. -->
    <script>
      $(document).ready(function() {
          $('#nav a[href$="' + location.toString().substring(("http://" + location.hostname).length) + '"]').addClass("active");;
      });
    </script>

  </head>

  <body>
    <div id="content-wrapper">
      <div id="header">
        <div id="banner">
          <img src="/assets/images/logo_banner.bmp" alt="Indiana Real Estate Exchangors, Inc." />
          <h1>Indiana Real Estate Exchangors, Inc.</h1>
        </div>

        <div id="nav">
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/members.php">Members</a></li>
            <li><a href="/calendar.php">Calendar</a></li>
            <li><a href="/by-laws.html">By-Laws</a></li>
            <li><a href="/documents.html">Documents</a></li>
          </ul>
        </div>
      </div>

<!--
      <div class="content-block" id="news">
        <div class="title">Latest News</div>

        <div class="first">
          <div class="news-title">2012 Marketing Session</div>
          <div class="date">Tuesday, Janurary 15, 2013, 5:02 PM</div>
          <div class="content">
            <strong>When:</strong> September 27th - 28th, 2012<br>
            <strong>Where:</strong> Radisson at the Old airport<br>
            <strong>What:</strong> More details to come!
          </div>
        </div>

        <div class="second">
          <div class="news-title">Wecome Members and Guests</div>
          <div class="date">Tuesday, Janurary 15, 2013, 5:02 PM</div>
          <div class="content">
            <strong>When:</strong> Thursday ......<br>
            <strong>Where:</strong> Knights of Columbus, 1305 N. Delaware Avenue, Indianapolis<br>
            <strong>What:</strong> Networking starts at 8:45am<br>
            Meeting starts at 9:00am<br>
            Coffee and doughnuts served
          </div>
        </div>

        <div class="third">
          <p>&nbsp;</p>
        </div>
      </div>
-->

      <div class="content-block next-meeting">
        <div class="title">Next Meeting is <?php echo strftime("%B %d at %l %p", $next_meeting['date']); ?>.</div>
      </div>

      <div class="content-block">
        <div class="title">Welcome</div>

        <p>We meet the <u>Second (2nd) and Fourth (4th) Thursday</u> of the month. Meetings
        will be located at the <a href="/calendar.php#knights-of-columbus">Knights of Columbus</a>.</p>

        <p>Networking starts around 8:45am and the meeting starts promptly at 9:00am.</p>

        <p>Coffee and doughnuts will be served.</p>

        <p>Actively licensed realtors/brokers are welcome as guests and encouraged to become a regular member.</p>
      </div>

      <div class="content-block">
        <div class="title">Did you know?</div>

        <p>Indiana Real Estate Exchangors is on <a href="https://www.facebook.com/pages/Indiana-Real-Estate-Exchangors/220020221382445" target="_blank">Facebook</a>.</p>
      </div>


      <div id="footer">Copyright &copy; 1989 - 2013 &mdash; Indiana Real Estate Exchangors, Inc.</div>
      &nbsp;
    </div>

    <script type="text/javascript">
      var GoSquared = {};
      GoSquared.acct = "GSN-745713-X";
      (function(w){
        function gs(){
          w._gstc_lt = +new Date;
          var d = document, g = d.createElement("script");
          g.type = "text/javascript";
          g.src = "//d1l6p2sc9645hc.cloudfront.net/tracker.js";
          var s = d.getElementsByTagName("script")[0];
          s.parentNode.insertBefore(g, s);
        }
        w.addEventListener ?
          w.addEventListener("load", gs, false) :
          w.attachEvent("onload", gs);
      })(window);
    </script>

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