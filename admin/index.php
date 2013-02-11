<!DOCTYPE html>
<html lang="en">

  <head>
    <meta name="author" content="Matt Emborsky <memborsky@gmail.com>" />
    <meta charset="utf-8" />

    <title>Indiana Real Estate Exchangors, Inc.</title>

    <link href='/assets/stylesheets/normalize.css' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet'>
    <link href='/assets/stylesheets/main.css' rel='stylesheet' media='screen, projection'>

    <!-- <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script> -->
    <script src="/assets/javascript/jquery.min.js"></script>

    <!-- Set the active navigation item. -->
    <script>
      $(document).ready(function() {
        var stringToRemove = "";
        if (location.port != "80") {
          stringToRemove = "http://" + location.hostname + ":" + location.port;
        } else {
          stringToRemove = "http://" + location.hostname;
        }

        $('#nav a[href$="' + location.toString().substring(stringToRemove.length).replace(/\&/, "&amp;") + '"]').addClass("active");;
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
            <li><a href="/admin/">Admin</a></li>
            <li><a href="/admin/?section=members&mp;action=list">Members</a></li>
            <li><a href="/admin/?action=logout">Log Out</a></li>
          </ul>
        </div>
      </div>

      <div class="content-block next-meeting" id="notice"></div>

      <div class="content-block">

<?php

session_name("IREX");
session_start();


require_once("../../connections.php");

date_default_timezone_set("America/Indianapolis");

function logout() {
  session_destroy();
  header("Location: /");
}

// We are logged in.
if (isset($_SESSION["id"])) {

  // Log the user out if they have been inactive for over 5 minutes.
  // if (time() - $_SESSION["time"] > 3000) {
  //   logout();
  // }

  if (isset($_GET["section"])) {
    $section = $_GET["section"];
  } else {
    header("Location: /admin/?section=members&action=list");
  }

  // Update the last access time.
  $_SESSION["time"] = time();


  // Store the action to a local var.
  $action = "list";
  if (isset($_GET["action"])) {
    $action = $_GET["action"];
  }

  // Log the user out.
  if ($action == "logout") {
    logout();
  }

  if ($action === "list") {
?>
        <br>
        <a href="/admin/?section=members&amp;action=add">Add a New Member</a>
        <br><br>
<?php
  }

  $filename = $section . "/" . $action . ".php";
  if (file_exists($filename)) {
    include($filename);
  } else {
    header("Location: /admin/?section=members&action=list");
  }

} elseif (isset($_POST["username"])) {

  $query = sprintf("SELECT id,username,members_id FROM users WHERE active AND admin AND username=\"%s\" AND password=\"%s\"", $_POST["username"], md5($_POST["password"]));
  $results = $db->query($query);
  $num_rows = $db->affected_rows;

  if ($num_rows === 1) {
    $row = $results->fetch_assoc();
    $_SESSION["username"] = $row["username"];
    $_SESSION["id"] = $row["id"];
    $_SESSION["members_id"] = $row["members_id"];
    $_SESSION["start_time"] = time();

    $db->query(sprintf("UPDATE users SET last_login = \"%s\", ip = \"%s\", hostname = \"%s\" WHERE id = \"%s\";", date("Y-m-d H:i:s", time()), $_SERVER["REMOTE_ADDR"], $_SERVER["REMOTE_HOST"], $row["id"]));

    if (isset($_GET["action"])) {
      $action = $_GET["action"];
    } else {
      $action = "list";
    }

    if (isset($_GET["section"])) {
      $section = $_GET["section"];
    } else {
      $section = "members";
    }

    header("Location: /admin/?section=" . $section . "&action=" . $action);

  } else {
    header("Location: /admin/?failed=true");
  }

} else {

  if (isset($_GET["failed"]) && $_GET["failed"] === "true") {
?>
      <b id="failed">Username or Password incorrect. Please try again:</b><br>
<?php
  }
?>
      <table id="login">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
          <tr>
            <td class="right">Username:</td>
            <td class="left"><input type="text" name="username" /></td>
          </tr>

          <tr>
            <td class="right">Password:</td>
            <td class="left"><input type="password" name="password" /></td>
          </tr>

          <tr>
            <td></td>
            <td class="left"><input type="submit" value="Log In" name="submit"></td>
          </tr>
        </form>
      </table>
<?php
}

$db->close();
?>
      </div>

      <div id="footer">Copyright &copy; 1989 - 2013 &mdash; Indiana Real Estate Exchangors, Inc.</div>
      &nbsp;
    </div>

  </body>

</html>