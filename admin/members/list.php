<?php
// Prevent direct access to this file.
if (!isset($_SESSION)) { header("Location: /admin/"); }
?>

<script>
  $(function() {
    $('input.checkbox-active').change(function() {
      var id = parseInt(this.id.substring(6));

      var checked = 0;
      if (this.checked) {
        checked = 1;
      }

      $.ajax({
        url: "/admin/?section=members&action=edit&id=" + id,
        type: "post",
        data: {active: checked, id: id}
      });
    });

    $('a.delete').click(function() {
      var id = parseInt(this.id.substring(6));
      first_name = $('tr#row_' + id.toString() + " > td:first").html();
      last_name = $('tr#row_' + id.toString() + " > td:nth-child(2)").html();

      if ( confirm("Are you sure you want to delete " + first_name + " " + last_name + "?") ) {
        console.log("We are removing id=" + id);

        $.ajax({
          url: "/admin/?section=members&action=delete&id=" + id,
          type: "post",
          data: "id=" + id,
          success: function() {
            $('tr#row_' + id).hide()
          },
          error: function() {
            $('#notice').html = "Failed to delete " + first_name + " " + last_name;
            $('#notice').show();
          }
        });
      }
    });
  });
</script>

<table>
  <tr class="header">
    <td>First Name</td>
    <td>Last Name</td>
    <td>Email</td>
    <td>Active</td>
    <td></td>
    <td></td>
  <tr>

<?php

  $result = $db->query("SELECT id,active,first_name,last_name,email FROM members ORDER BY last_name;");

  $return = "";

  while ($row = $result->fetch_assoc()) {
    $return .= "  <tr id=\"row_" . $row["id"] . "\">\n";
    $return .= "    <td>" . $row["first_name"] . "</td>\n";
    $return .= "    <td>" . $row["last_name"] . "</td>\n";
    $return .= "    <td><a href=\"mailto:" . $row["email"] . "\">" . $row["email"] . "</a></td>\n";
    $return .= "    <td><input class=\"checkbox-active\" type=\"checkbox\" id=\"active" . $row["id"] . "\"" . ($row["active"] ? " checked=\"checked\"" : "") . " /></td>\n";
    $return .= "    <td><a href=\"/admin/?section=members&action=edit&id=" . $row["id"] . "\">Edit</a></td>\n";
    $return .= "    <td><a class=\"delete\" id=\"delete" . $row["id"] . "\" href=\"#\">Delete</a></td>\n";
    $return .= "  </tr>\n\n";
  }

  echo $return;

?>

</table>