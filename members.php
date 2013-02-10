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
            <li><a href="/calendar.html">Calendar</a></li>
            <li><a href="/by-laws.html">By-Laws</a></li>
            <li><a href="/documents.html">Documents</a></li>
          </ul>
        </div>
      </div>


<?php

require_once("connections.php");

$query =  "SELECT fname, lname, company, city, address, state, zip, ophone, email, officer FROM members WHERE isactive AND isboard ORDER BY lname; " .
          "SELECT fname, lname, company, city, address, state, zip, ophone, email FROM members WHERE isactive AND NOT isboard ORDER BY lname;";

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

if ($db->multi_query($query)) {
  do {

    if ($result = $db->store_result()) {
?>
      <div class="content-block">
        <div class="title">Board of Directors</div>

        <table class="members">
<?php
      $column = 0;
      $return = "";

      while ($row = $result->fetch_assoc()) {
        if ($column == 0) {
          $return .= "          <tr>\n";
        }

        $return .= "            <td>" .
        "<b class=\"name\">" . $row["fname"] . " " . $row["lname"] . "</b><br>";

        if (isset($row["officer"]) && !is_null($row["officer"]))
        {
          $return .= "<em><b>" . $row["officer"] . "</b></em><br>";
        }

        if ($row["company"] !== "")
        {
          $return .= $row["company"] . "<br>";
        }

        $return .= $row["city"] . ", " . $row["state"] . " " . substr($row["zip"], 0, 5) . "<br>";

        if (!is_null($row["ophone"])) {
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

      echo $return;

      $result->free();
?>
        </table>
      </div>

<?php
    }
  } while ($db->next_result());

  $db->close();
}
?>
      <div id="footer">Copyright &copy; 1989 - 2013 &mdash; Indiana Real Estate Exchangors, Inc.</div>
      &nbsp;
    </div>

  </body>

</html>