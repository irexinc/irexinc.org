<?php
// Prevent direct access to this file.
if (!isset($_SESSION)) { header("Location: /admin/"); }

$id = $_GET["id"] or header("Location: /admin/");

$result = $db->query("SELECT * FROM members WHERE id='" . $id . "'");

$row = $result->fetch_assoc();

if (!isset($_POST["active"])) {
?>

<table id="login">
  <form action="<?php echo $_SERVER["PHP_SELF"] ?>?section=members&amp;action=edit&amp;id=<?php echo $id; ?>" method="post">

    <input type="hidden" name="id" value="<?php echo $id; ?>" />

    <tr>
      <td class="right">First Name:</td>
      <td class="left"><input type="textbox" name="first_name" value="<?php echo $row["first_name"]; ?>" /></td>
    </tr>
    <tr>
      <td class="right">Last Name:</td>
      <td class="left"><input type="textbox" name="last_name" value="<?php echo $row["last_name"]; ?>" /></td>
    </tr>
    <tr>
      <td class="right">Company:</td>
      <td class="left"><input type="textbox" name="company" value="<?php echo $row["company"]; ?>" /></td>
    </tr>
    <tr>
      <td class="right">Address:</td>
      <td class="left"><input type="textbox" name="address" value="<?php echo $row["address"]; ?>" /></td>
    </tr>
    <tr>
      <td class="right">City:</td>
      <td class="left"><input type="textbox" name="city" value="<?php echo $row["city"]; ?>" /></td>
    </tr>
    <tr>
      <td class="right">State:</td>
      <td class="left"><input type="textbox" name="state" value="<?php echo $row["state"]; ?>" /></td>
    </tr>
    <tr>
      <td class="right">Zip Code:</td>
      <td class="left"><input type="textbox" name="zip" value="<?php echo $row["zip"]; ?>" /></td>
    </tr>
    <tr>
      <td class="right">Office Phone:</td>
      <td class="left"><input type="textbox" name="office_phone" value="<?php echo $row["office_phone"]; ?>" /></td>
    </tr>
    <tr>
      <td class="right">Cell Phone:</td>
      <td class="left"><input type="textbox" name="cell_phone" value="<?php echo $row["cell_phone"]; ?>" /></td>
    </tr>
    <tr>
      <td class="right">Email:</td>
      <td class="left"><input type="textbox" name="email" value="<?php echo $row["email"]; ?>" /></td>
    </tr>
    <tr>
      <td class="right">Active:</td>
      <td class="left"><input type="checkbox" name="active" <?php echo ($row["active"] ? " checked=\"checked\"" : ""); ?> /></td>
    </tr>
    <tr>
      <td class="right">Board:</td>
      <td class="left"><input type="checkbox" name="board" <?php echo ($row["board"] ? " checked=\"checked\"" : ""); ?> /></td>
    </tr>
    <tr>
      <td class="right">Officer:</td>
      <td class="left"><input type="textbox" name="officer" value="<?php echo $row["officer"]; ?>" /></td>
    </tr>
    <tr>
      <td></td>
      <td class="left"><input type="submit" value="Save" /></td>
    </tr>
  </form>
</table>

<?php
} else {
  $query = "UPDATE members SET ";
  foreach ($_POST as $key => $value) {
    if ($key !== "id") {
      $query .= "`" . $key . "`=" . ($value == "" ? "null" : "'" . $value . "'") . ",";
    }
  }

  $query = substr($query, 0, -1) . " WHERE id=" . $_POST["id"] . ";";

  $db->query($query);

  if (isset($_POST["first_name"])) {
    header("Location: /admin/?section=members&action=list");
  } else {
    return true;
  }
}
?>