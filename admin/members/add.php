<?php
// Prevent direct access to this file.
if (!isset($_SESSION)) { header("Location: /admin/"); }

if (!isset($_POST["first_name"])) {
?>
<div class="title">Add a New Member</div>

<table id="login">
  <form action="<?php echo $_SERVER["PHP_SELF"] ?>?section=members&amp;action=add" method="post">

    <tr>
      <td class="right">First Name:</td>
      <td class="left"><input type="textbox" name="first_name" /></td>
    </tr>
    <tr>
      <td class="right">Last Name:</td>
      <td class="left"><input type="textbox" name="last_name" /></td>
    </tr>
    <tr>
      <td class="right">Company:</td>
      <td class="left"><input type="textbox" name="company" /></td>
    </tr>
    <tr>
      <td class="right">Address:</td>
      <td class="left"><input type="textbox" name="address" /></td>
    </tr>
    <tr>
      <td class="right">City:</td>
      <td class="left"><input type="textbox" name="city" /></td>
    </tr>
    <tr>
      <td class="right">State:</td>
      <td class="left"><input type="textbox" name="state" /></td>
    </tr>
    <tr>
      <td class="right">Zip Code:</td>
      <td class="left"><input type="textbox" name="zip" /></td>
    </tr>
    <tr>
      <td class="right">Office Phone:</td>
      <td class="left"><input type="textbox" name="office_phone" /></td>
    </tr>
    <tr>
      <td class="right">Cell Phone:</td>
      <td class="left"><input type="textbox" name="cell_phone" /></td>
    </tr>
    <tr>
      <td class="right">Email:</td>
      <td class="left"><input type="textbox" name="email" /></td>
    </tr>
    <tr>
      <td class="right">Active:</td>
      <td class="left"><input type="checkbox" name="active" /></td>
    </tr>
    <tr>
      <td class="right">Board:</td>
      <td class="left"><input type="checkbox" name="board" /></td>
    </tr>
    <tr>
      <td class="right">Officer:</td>
      <td class="left"><input type="textbox" name="officer" /></td>
    </tr>
    <tr>
      <td></td>
      <td class="left"><input type="submit" value="Save" /></td>
    </tr>
  </form>
</table>

<?php
} else {
  $query = "INSERT INTO members SET ";
  foreach ($_POST as $key => $value) {
    if ($value != "") {
      if ($key == "active" || $key == "board") {
        if ($value == "on") {
          $value = "1";
        } else {
          $value = "0";
        }
      }

      $query .= "`" . $key . "`='" . $value . "',";
    }
  }

  $query = substr($query, 0, -1) . ";";

  if ($db->query($query)) {
    header("Location: /admin/?section=members&action=list");
  } else {
    echo "Failed.";
  }

}
?>