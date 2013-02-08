<?php

$query = array(
  "0" => "SELECT fname, lname, company, city, address, state, zip, ophone, email, officer FROM members WHERE isactive AND isboard ORDER BY lname;",
  "1" => "SELECT fname, lname, company, city, address, state, zip, ophone, email FROM members WHERE isactive AND NOT isboard ORDER BY lname;"
);

require_once("../connections.php");

function check_phone($number)
{
  if (preg_match('^[0-9]{3}+-[0-9]{3}+-[0-9]{4}^', $number)) {
    return $number;
  }
  else {
    $items = array('/\ /', '/\+/', '/\-/', '/\./', '/\,/', '/\(/', '/\)/', '/[a-zA-Z]/');
    $clean = preg_replace($items, '', $number);
    return substr($clean, 0, 3) . "-" . substr($clean, 3, 3) . "-" . substr($clean, 6, 4);
  }
}

function get_members($members)
{
  $column = 0;
  $return = "";

  while ($row = mysql_fetch_assoc($members)) {
    if ($column == 0) {
      $return .= "          <tr>\n";
    }

    $return .= "            <td>" .
    "<b class=\"name\">" . $row["fname"] . " " . $row["lname"] . "</b><br>";

    if (isset($row["officer"]) && !empty($row["officer"]))
    {
      $return .= "<em><b>" . $row["officer"] . "</b></em><br>";
    }

    if ($row["company"] !== "")
    {
      $return .= $row["company"] . "<br>";
    }

    $return .= $row["city"] . ", " . $row["state"] . " " . substr($row["zip"], 0, 5) . "<br>";

    if ($row["ophone"] !== "") {
      $return .= check_phone($row["ophone"]) . "<br>";
    }

    if ($row["email"] !== "") {
      $return .= "<a href=\"mailto:" . strtolower($row["email"]) . "\">" . strtolower($row["email"]) . "</a>";
    }

    $return .= "</td>\n";

    if ($column == 2) {
      $column = 0;
      $return .= "          </tr>\n\n";
    }
    else {
      $column++;
    }
  }

  if (substr($return, -7) !== "</tr>\n\n") {
    while ($column <= 2) {
      $return .= "            <td></td>\n";
      $column++;
    }

    $return .= "          </tr>\n\n";
  }

  return $return;
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta name="author" content="Matt Emborsky <memborsky@gmail.com>" />
    <meta charset="utf-8" />

    <title>Indiana Real Estate Exchangors, Inc.</title>

    <link href="/assests/stylesheets/normalize.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet">
    <link href="/assests/stylesheets/main.css" rel="stylesheet" media="screen, projection">

    <!-- <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script> -->
    <script src="/assests/javascript/jquery.min.js"></script>

    <!-- Set the active navigation item. -->
    <script>
      $(function() {
        $('#nav a[href$="' + location.pathname + '"]').attr('class', 'active');
      });
    </script>

  </head>

  <body>
    <div id="content-wrapper">
      <div id="header">
        <div id="banner">
          <img src="/assests/images/logo_banner.bmp" alt="Indiana Real Estate Exchangors, Inc." />
          <h1>Indiana Real Estate Exchangors, Inc.</h1>
        </div>

        <div id="nav">
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/members.php">Members</a></li>
            <li><a href="/calendar.html">Calendar</a></li>
            <li><a href="/by-laws.html">By-Laws</a></li>
            <li><a href="/documents.html">Documents</a></li>
          </ul>
        </div>
      </div>


      <div class="content-block">
        <div class="title">Board of Directors</div>

        <table class="members">
<?php
  echo get_members($result["0"]);
?>
        </table>
      </div>


      <div class="content-block">
        <div class="title">Members</div>

        <table class="members">
<?php
  echo get_members($result["1"])
?>
        </table>
      </div>

      <div id="footer">Copyright &copy; 1989 - 2013 &mdash; Indiana Real Estate Exchangors, Inc.</div>
      &nbsp;
    </div>

  </body>

</html>