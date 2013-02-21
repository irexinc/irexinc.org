<?php
require_once("../db/connections.php");

$events = $db->query("select * from events where substring_index(start_date, '-', 1) = year(curdate()) order by start_date, end_date;");

function isOutOfState($title, $address = null) {
  $result = true;

  if (strstr(strtolower($title), "irex") != false) {
    $result = false;
  }

  if (!is_null($address)) {
    $address = strtolower($address);

    if (strstr($address, ", in") != false or strstr($address, ",in") != false) {
      $result = false;
    }
  }

  if ($result) {
    return " class=\"out-of-state\"";
  }
}

function get_date($start, $end = null) {
  $start_unix = strtotime($start);
  $start_date = strftime("%B %-e", $start_unix);

  if (!is_null($end)) {
    $end_unix = strtotime($end);

    if (substr($start, 0, 10) == substr($end, 0, 10)) {

      // The event is a single day event.
      $date = $start_date;

    } else {

      if (strftime("%m", $start_unix) == strftime("%m", $end_unix)) {

        // The even is a multiday event in the same month.
        $date = $start_date . " &dash; " . strftime("%-e", $end_unix);

      } else {

        // The event is a multiday event elapsing over the end of the month.
        $date = $start_date . " &dash; " . strftime("%B %-e", $end_unix);

      }
    }

  } else {

    // The event only has a start date.
    $date = $start_date;

  }

  return $date;
}

function get_location($location) {
  if ($location == "Knights of Columbus") {
    return "<a href=\"#knights-of-columbus\">Knights of Columbus</a>";
  } else {
    return (string)$location;
  }
}
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

      <div class="content-block">
        <div class="title">2013 Meeting Schedule - Indiana Real Estate Exchangors, Inc.</div>
        <div class="sub-title">Normal Meeting Time - 9:00 AM to Noon</div>

        <p class="note">Meetings listed in orange are for informational purposes only.</p>

        <table>

          <tr class="header">
            <td>Date</td>
            <td>Description</td>
            <td>Location</td>
          </tr>

<?php
          while ($event = $events->fetch_assoc()) {
            $result = "          <tr". isOutOfState($event['title'], $event['address']) . ">\n";
            $result .= "            <td>" . get_date($event['start_date'], $event['end_date']) . "</td>\n";
            $result .= "            <td>" . $event['title'] . "</td>\n";
            $result .= "            <td>" . get_location($event['location'], $event['address']) . "</td>\n";
            $result .= "          </tr>\n";
            echo $result . "\n";
          }
?>
        </table>

      </div>

      <!-- Google Maps -->
      <span id="knights-of-columbus"></span>
      <div class="content-block">
        <div class="title">Knights of Columbus</div>
        <iframe src="https://maps.google.com/maps?hl=en&amp;q=1305+North+Delaware+Street,+Indianapolis,+IN&amp;z=11&amp;output=embed"></iframe>
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