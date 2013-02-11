<?php
// Prevent direct access to this file.
if (!isset($_SESSION)) { header("Location: /admin/"); }

if (isset($_POST["id"])) {
  $query = "DELETE FROM members WHERE `id`='" . $_POST["id"] . "';";

  if (!$db->query($query)) {
    echo false;
  }

  echo true;
} else {
  echo false;
}
?>